---
title: 'Payment - Authorize.net'
date: '03:38 27-11-2017'
taxonomy:
    category:
        - Plugin
---

## Table of Contents
1. [Description](#description)
2. [Install the plugin](#install-the-plugin)
3. [Update the plugin](#update-the-plugin)
4. [Configure the plugin](#configure-the-plugin)
5. [Frequently Asked Questions](#frequently-asked-questions)
6. [Uninstall the plugin](#uninstall-the-plugin)
	
## Description
<div class="alert alert-info left" style="text-align: left;"><p>Authorize.net integration for AllEvents.</p><p>&nbsp;-&nbsp;Accept credit card payments directly on your website</p><p>&nbsp;-&nbsp;SSL Certificate is required</p><p>&nbsp;-&nbsp;Secure seamless transactions</p><p>Enable and publish this plugin in <a style="text-decoration: underline" href="index.php?option=com_plugins">Plugin Manager</a></p><p>More information: <a style="text-decoration: underline" href="http://www.allevents3.com/" target="_blank" >AllEvents3</a></p></div>

## Install the plugin
1. Download the extension to your local machine as a zip file package.  (direct link : [payment_authorizenet](https://www.allevents3.com/en/joomla-extensions/addons/payment_authorizenet))
2. From the backend of your Joomla site (administration) select **Extensions >> Manager**, then Click the <b>Browse</b> button and select the extension package on your local machine. Then click the **Upload & Install** button to install module.
3. Go to **Extensions >> Plugin**, find and click on **Payment - authorizenet**. Then enable it.

> ###### If you have problems installing or updating the extension, please try the manual installation process as described here: docs.joomla.org/Installing_an_extension

## Update the plugin
Update using the same steps you used when you install it. You do not need to uninstall it first. The extension will update all its files automatically.

## Configure the plugin
There are many options for you to customize your extension :
### [basic]
             
| Option | Description | Type | Value |
| ------ | ----------- | ---- | ----- |
|  AuthorizeDotNet Login ID | Merchant’s unique API Login ID. The merchant API Login ID is provided in the Merchant Interface and must be stored securely. | text | |
|  AuthorizeDotNet Transaction Key | AuthorizeDotNet Transaction Key  | text | |
|  Enable Testmode?(SandBox) | Set to Yes if you are testing the system and set it to No when you go live. | radio | `NO`, `YES`|
|  secure post(use    https)? | Use https for secure post | radio | `NO`, `YES`(default:`1`)|
|  Show Automated Recurring Billing option? | If you select this user will be seen Automated Recurring Billing option | radio | `No`, `Yes`|
|  Enforce Automated Recurring Billing option? | If this option is enabled only Automated Recurring Billing option will default | radio | `No`, `Yes`|
|  Log payment gateway responses | Turn this on only if payment not working correctly & you want do debug it. | radio | `No`, `Yes`|
|  Allowed Cart Type | Allowed Cart Type | list | `Visa`, `Mastercard`, `American Express`, `Discover`, `Diners Club`, `JCB`(default:`Visa`)|
|  Plugin Name | This is Name of the Gateway that you would like to show in the payment select box | text | (default:`Authorize.Net`)|
|  plugin_hidname |  | hidden | (default:`authorizenet`)|


## Frequently Asked Questions
No questions for the moment

## Uninstall the plugin
1. Login to Joomla backend.
2. Click **Extensions >> Manager** in the top menu.
3. Click **Manage** on the left, navigate on the extension and click the Uninstall button on top.
