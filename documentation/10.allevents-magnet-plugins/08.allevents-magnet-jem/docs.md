---
title: 'AllEvents Magnet – JEM'
media_order: plg_aemagnet_jem.png
date: '13:17 26-11-2017'
taxonomy:
    category:
        - Plugin
visible: true
recaptchacontact:
    enabled: false
---

![](https://www.allevents3.com/plugins/aemagnet/jem/assets/jem.png) 
The "AllEvents Magnet – JEM" plugin integrates events into JEM solution by AllEvents Magnet through a specific plugin. 

!! <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>  AllEvents Magnet is not affiliated with or endorsed by the JEM - Joomla Event Manager Project ([https://www.joomlaeventmanager.net/](https://www.joomlaeventmanager.net/)).

## Table of Contents
1. [Install the plugin](#install-the-plugin)
2. [Configure the plugin](#configure-the-plugin)
3. [Frequently Asked Questions](#frequently-asked-questions)
  
## Install the plugin
1. Download the extension to your local machine as a zip file package.
2. From the backend of your Joomla site (administration) select **Extensions >> Manager**, then Click the <b>Browse</b> button and select the extension package on your local machine. Then click the **Upload & Install** button to install module.
3. Go to **Extensions >> Plugin**, find and click on **AllEvents Magnet – JEM **. Then enable it.

! If you have problems installing or updating the extension, please try the manual installation process as described here: docs.joomla.org/Installing_an_extension

For update the plugin you can follow [this topic](https://documentation.allevents3.com/allevents/installation/update).
For uninstall the plugin you can follow [this topic](https://documentation.allevents3.com/allevents/installation/uninstall).

## Update the plugin
Update using the same steps you used when you install it. You do not need to uninstall it first. The extension will update all its files automatically.

## Configure the plugin

![plg_aemagnet_jem](plg_aemagnet_jem.png)
### [basic]
             
| Option | Description | Type | Value |
| ------ | ----------- | ---- | ----- |
|  Download ID | Enter your Download ID to enable Updates | text | (default:``)|

## Frequently Asked Questions
### Which data in insert mode ?
These data were created when the event (identified by external UID) not exists:
* title       
* dates       
* enddates    
* starthours  
* startminutes
* endhours    
* endminutes  
* category (_cats_)
* description (_articletext_)
* invited (forced empty)
* image (_datimage_)
* status (_published_)
* registra (forced 0)
* unregistra (forced 0)
* waitinglist (forced 0)

### Which data in update mode ?
These data were updated when the event (identified by external UID) already exists:
* title       
* dates       
* enddates    
* starthours  
* startminutes
* endhours    
* endminutes  
* category (_cats_)
* description (_articletext_)
* image (_datimage_)
