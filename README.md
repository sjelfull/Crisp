# Crisp plugin for Craft CMS

![Screenshot](resources/icon.png)

Integrate Crisp.im with Craft

# About Crisp.im

Crisp is a free and beautiful livechat to interact with your customers. From sales to customer support, Crisp is made to keep your workflow simple. You can add your team-mates to your Crisp and dealing all your chat, e-mails, (and more in the future) from a single interface.

## Installation

To install Crisp, follow these steps:

1. Download & unzip the file and place the `crisp` directory into your `craft/plugins` directory
2. Install plugin in the Craft Control Panel under Settings > Plugins
3. The plugin folder should be named `crisp` for Craft to see it.

Crisp works on Craft 2.4.x and Craft 2.5.x.

## Configuring Crisp

Add your tracking code to the plugin settings. You can get it when entering the inbox for the first time, or from [Settings -> Website Settings -> (select your site) -> Setup instructions](https://app.crisp.im/settings/websites/)

## Using Crisp

Simply insert the template hook into your main layout file, right before the `</body>` end tag:

```twig
{% hook 'crisp' %}
```

## Crisp Roadmap

- Add Commerce stats (order #, LTV, etc.) to users

* Release it

Brought to you by [Superbig](https://superbig.co)
