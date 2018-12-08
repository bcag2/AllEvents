---
title: 'Payment - Linkpoint'
date: '03:40 27-11-2017'
---

## Table of Contents
1. [Description](#description)
2. [Install the plugin](#install-the-plugin)
3. [Update the plugin](#update-the-plugin)
4. [Configure the plugin](#configure-the-plugin)
5. [Frequently Asked Questions](#frequently-asked-questions)
6. [Uninstall the plugin](#uninstall-the-plugin)
	
## Description
Linkpoint payment plugin

## Install the plugin
1. Download the extension to your local machine as a zip file package. 
2. From the backend of your Joomla site (administration) select **Extensions >> Manager**, then Click the <b>Browse</b> button and select the extension package on your local machine. Then click the **Upload & Install** button to install module.
3. Go to **Extensions >> Plugin**, find and click on **Payment - Linkpoint**. Then enable it.

> ###### If you have problems installing or updating the extension, please try the manual installation process as described here: docs.joomla.org/Installing_an_extension

## Update the plugin
Update using the same steps you used when you install it. You do not need to uninstall it first. The extension will update all its files automatically.

## Configure the plugin
There are many options for you to customize your extension :
### [basic]
             
| Option | Description | Type | Value |
| ------ | ----------- | ---- | ----- |
|  Enter	Linkpoint Store ID | Enter	Linkpoint Store ID | text | |
|  Port | linkpoint port number | hidden | (default:`1129`)|
|  Enable sandbox mode? | LINKPOINT_SANDBOX_MODE_DESC | radio | `NO`, `YES`(default:`1`)|
|  secure post(use    https)? | Use https for secure post | radio | `NO`, `YES`(default:`1`)|
|  Plugin Name | Plugin Name | text | (default:`Linkpoint`)|
|  plugin_hidname |  | hidden | (default:`linkpoint`)|
|  Log payment gateway responses | Turn this on only if payment not working correctly & you want do debug it. | radio | `No`, `Yes`|


## Frequently Asked Questions
No questions for the moment

## Uninstall the plugin
1. Login to Joomla backend.
2. Click **Extensions >> Manager** in the top menu.
3. Click **Manage** on the left, navigate on the extension and click the Uninstall button on top.