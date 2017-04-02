<?php
/**
 * Crisp plugin for Craft CMS
 *
 * Crisp Service
 *
 * @author    Superbig
 * @copyright Copyright (c) 2017 Superbig
 * @link      https://superbig.co
 * @package   Crisp
 * @since     1.0.0
 */

namespace Craft;

class CrispService extends BaseApplicationComponent
{
    protected $settings;

    public function init ()
    {
        parent::init();
        $plugin         = craft()->plugins->getPlugin('crisp');
        $this->settings = $plugin->getSettings();
    }

    /**
     */
    public function getTrackingCode ()
    {
        $oldPath      = craft()->templates->getTemplatesPath();
        $trackingCode = $this->settings['trackingCode'];

        if ( empty($trackingCode) ) {
            return null;
        }

        $widget      = null;

        craft()->templates->setTemplatesPath(CRAFT_PLUGINS_PATH . 'crisp/templates/');

        try {
            $widget = craft()->templates->render('Crisp_Widget', array(
                'trackingCode'    => $trackingCode,
            ));
        }
        catch (\Exception $e) {
            CrispPlugin::log('Couldn\'t render Crisp widget: ' . $e->getMessage(), LogLevel::Error);
        }

        craft()->templates->setTemplatesPath($oldPath);

        return $widget;
    }

}