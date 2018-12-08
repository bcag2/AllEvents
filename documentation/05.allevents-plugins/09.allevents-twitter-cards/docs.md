---
title: 'AllEvents - Twitter Cards'
date: '03:33 27-11-2017'
taxonomy:
    category:
        - Plugin
    tag:
        - twitter
---

Adding Twitter Card meta information to your events.

## Table of Contents
2. [Install the plugin](#install-the-plugin)
3. [Update the plugin](#update-the-plugin)
4. [Configure the plugin](#configure-the-plugin)
5. [Frequently Asked Questions](#frequently-asked-questions)
6. [Uninstall the plugin](#uninstall-the-plugin)
	
## Install the plugin
1. Download the extension to your local machine as a zip file package.
2. From the backend of your Joomla site (administration) select **Extensions >> Manager**, then Click the <b>Browse</b> button and select the extension package on your local machine. Then click the **Upload & Install** button to install module.
3. Go to **Extensions >> Plugin**, find and click on **AllEvents - Twitter Cards**. Then enable it.

! If you have problems installing or updating the extension, please try the manual installation process as described here: docs.joomla.org/Installing_an_extension

## Update the plugin
Update using the same steps you used when you install it. You do not need to uninstall it first. The extension will update all its files automatically.

## Configure the plugin
There are many options for you to customize your extension :
### Event Options[event]
             
| Option | Description | Type | Value |
| ------ | ----------- | ---- | ----- |
|  Title | If empty, event title will be set. It is recommended to leave this parameter empty. | text | |
|  Image | Set image. If image will be not set here, plugin will try to find the image in event content. If event does not contain any image, plugin will try to search /images/aeopengraph/ folder for image which has the same name as event ID has (e.g. event ID=1 ==> 1.jpg). See documentation to understand this behaviour. | media | |
|  Site Description | Set site description. If empty, site description from events options will be set, if the description of event will be empty, global configuration will be set. Site Meta Description parameter will be used. | textarea | |
|  Display (Event) | Run the plugin for Events | list | `Yes`, `No`(default:`1`)|
### Common Options[common]
             
| Option | Description | Type | Value |
| ------ | ----------- | ---- | ----- |
|  Application ID | Set Twitter Application ID | text | (default:`@yourtwitterID`)|
|  Render Type | Set if meta tag will be displayed with Name attribute or Property attribute | list | `Name`, `Property`(default:`1`)|


## Frequently Asked Questions
No questions for the moment

## Uninstall the plugin
1. Login to Joomla backend.
2. Click **Extensions >> Manager** in the top menu.
3. Click **Manage** on the left, navigate on the extension and click the Uninstall button on top.