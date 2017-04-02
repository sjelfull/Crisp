<?php
/**
 * Crisp plugin for Craft CMS
 *
 * Integrate Crisp.im with Craft
 *
 * @author    Superbig
 * @copyright Copyright (c) 2017 Superbig
 * @link      https://superbig.co
 * @package   Crisp
 * @since     1.0.0
 */

namespace Craft;

class CrispPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    public function init()
    {
        parent::init();

        craft()->templates->hook('crisp', function (&$context) {
            if ( craft()->request->isSiteRequest() ) {
                $settings = isset($context['crispSettings']) ? $context['crispSettings'] : array();

                // Render tracking code
                $trackingCode = craft()->crisp->getTrackingCode($settings);

                return $trackingCode;
            }
        });
    }

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('Crisp');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Integrate Crisp.im with Craft');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/sjelfull/Crisp/blob/master/README.md';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/sjelfull/Crisp/master/releases.json';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'Superbig';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'https://superbig.co';
    }

    /**
     * @return array
     */
    protected function defineSettings()
    {
        return array(
            'trackingCode' => array(AttributeType::String, 'label' => 'Tracking code', 'default' => ''),
        );
    }

    /**
     * @return mixed
     */
    public function getSettingsHtml()
    {
       return craft()->templates->render('crisp/Crisp_Settings', array(
           'settings' => $this->getSettings()
       ));
    }

}