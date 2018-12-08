---
title: 'Payment - Paypal Adaptive Payment'
date: '03:42 27-11-2017'
---

## Table of Contents
1. [Description](#description)
2. [Install the plugin](#install-the-plugin)
3. [Update the plugin](#update-the-plugin)
4. [Configure the plugin](#configure-the-plugin)
5. [Frequently Asked Questions](#frequently-asked-questions)
6. [Uninstall the plugin](#uninstall-the-plugin)
	
## Description
Paypal Adaptive payment plugin

## Install the plugin
1. Download the extension to your local machine as a zip file package.  (direct link : [payment_adaptive_paypal](https://www.allevents3.com/en/joomla-extensions/addons/payment_adaptive_paypal))
2. From the backend of your Joomla site (administration) select **Extensions >> Manager**, then Click the <b>Browse</b> button and select the extension package on your local machine. Then click the **Upload & Install** button to install module.
3. Go to **Extensions >> Plugin**, find and click on **Payment - Paypal Adaptive Payment**. Then enable it.

> ###### If you have problems installing or updating the extension, please try the manual installation process as described here: docs.joomla.org/Installing_an_extension

## Update the plugin
Update using the same steps you used when you install it. You do not need to uninstall it first. The extension will update all its files automatically.

## Configure the plugin
There are many options for you to customize your extension :
### [basic]
             
| Option | Description | Type | Value |
| ------ | ----------- | ---- | ----- |
|  Enter Paypal email Address | Enter Paypal email Address | text | |
|  Enable sandbox mode | Enable sandbox mode | radio | `NO`, `YES`|
|  Plugin Name |  | text | (default:`Paypal Adaptive Payment`)|
|  plugin_hidname |  | hidden | (default:`Paypal Adaptive Payment`)|
|  Getting error while doing the payments through AllEvents? check this log file | If you are gettting error while using this adaptive payment plugin with AllEventsthen you can check error message sent by paypal in this log file.  check message field | logfile | |
|  Getting error while doing the payments through AllEvents? check this log file | If you are gettting error while using this adaptive payment plugin with AllEvents then you can check error message sent by paypal in this log file. check message field | logfile | |
|  Getting error while doing the payments through Quick2cart ? check this log file | | logfile | |
|  Log payment gateway responses | Turn this on only if payment not working correctly & you want do debug it. | radio | `No`, `Yes`|
### API Credential[apifields]
             
| Option | Description | Type | Value |
| ------ | ----------- | ---- | ----- |
|  Api Username: | Api Username | text | |
|  Api Password: | Api Password | text | |
|  Api Signature: | Api Signature | text | |
|  Api Id: | Api Id for sandbox(testing) | text | |


## Frequently Asked Questions
No questions for the moment

## Uninstall the plugin
1. Login to Joomla backend.
2. Click **Extensions >> Manager** in the top menu.
3. Click **Manage** on the left, navigate on the extension and click the Uninstall button on top.