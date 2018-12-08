---
title: 'Payment - 2Checkout'
date: '03:35 27-11-2017'
taxonomy:
    category:
        - Plugin
    tag:
        - payment
---

## Table of Contents
1. [Description](#description)
2. [Install the plugin](#install-the-plugin)
3. [Update the plugin](#update-the-plugin)
4. [Configure the plugin](#configure-the-plugin)
5. [Frequently Asked Questions](#frequently-asked-questions)
6. [Uninstall the plugin](#uninstall-the-plugin)
	
## Description
2Checkout payment plugin

## Install the plugin
1. Download the extension to your local machine as a zip file package. 
2. From the backend of your Joomla site (administration) select **Extensions >> Manager**, then Click the <b>Browse</b> button and select the extension package on your local machine. Then click the **Upload & Install** button to install module.
3. Go to **Extensions >> Plugin**, find and click on **Payment - 2Checkout**. Then enable it.

> ###### If you have problems installing or updating the extension, please try the manual installation process as described here: docs.joomla.org/Installing_an_extension

## Update the plugin
Update using the same steps you used when you install it. You do not need to uninstall it first. The extension will update all its files automatically.

## Configure the plugin
There are many options for you to customize your extension :
### [basic]
             
| Option | Description | Type | Value |
| ------ | ----------- | ---- | ----- |
|  Seller ID | This is your 2Checkout account number | text | |
|  Secret word | Enter the secret word you have configured in 2Checkout's interface. It is required to authenticate incoming payment notifications in order to protect you from fraud. | text | |
|  Test Mode (sandbox) | When enabled, all transactions will be performed against the 2Checkout sandbox (testing) wihout any money changing hands. DO NOT USE ON PRODUCTION SITES! IT IS MEANT ONLY FOR TESTING PURPOSES ONLY! | radio | `No`, `Yes`|
|  Log payment gateway responses | Turn this on only if payment not working correctly & you want do debug it. | radio | `No`, `Yes`|
|   |  | spacer | |
|  Language | The language your visitors will see the 2Checkout interface | radio | `English`, `Chinese`, `Danish`, `Dutch`, `French`, `German`, `Greek`, `Italian`, `Japanese`, `Norwegian`, `Portuguese`, `Slovenian`, `Spanish (Iberia)`, `Spanish (Latin America)`, `Swedish`(default:`en`)|
|  Default payment method | Which payment method your clients are going to see by default when they land in 2Checkout's site | radio | `Credit Card`, `Acculynk PIN-debit`, `2Checkout`(default:`cc`)|
|  Plugin Name |  | text | (default:`2Checkout`)|
|  plugin_hidname |  | hidden | (default:`2checkout`)|


## Frequently Asked Questions
No questions for the moment

## Uninstall the plugin
1. Login to Joomla backend.
2. Click **Extensions >> Manager** in the top menu.
3. Click **Manage** on the left, navigate on the extension and click the Uninstall button on top.