---
title: 'AllEvents Magnet – DPCalendar'
media_order: plg_aemagnet_dpcalendar.png
taxonomy:
    category:
        - Plugin
dateformat: 'd-m-Y H:i'
visible: true
recaptchacontact:
    enabled: false
---

![](https://www.allevents3.com/plugins/aemagnet/dpcalendar/assets/dpcalendar.png) 
The "AllEvents Magnet – DPCalendar" plugin integrates events into DPCalendar solution by AllEvents Magnet through a specific plugin. 

!! <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> AllEvents Magnet is not affiliated with or endorsed by the DP Calendar Project ([https://joomla.digital-peak.com](https://joomla.digital-peak.com)).

## Table of Contents
1. [Install the plugin](#install-the-plugin)
2. [Configure the plugin](#configure-the-plugin)
3. [Frequently Asked Questions](#frequently-asked-questions)

For update the plugin you can follow [this topic](https://documentation.allevents3.com/allevents/installation/update).
For uninstall the plugin you can follow [this topic](https://documentation.allevents3.com/allevents/installation/uninstall).
	
## Install the plugin
1. Download the extension to your local machine as a zip file package.
2. From the backend of your Joomla site (administration) select **Extensions >> Manager**, then Click the <b>Browse</b> button and select the extension package on your local machine. Then click the **Upload & Install** button to install module.
3. Go to **Extensions >> Plugin**, find and click on **AllEvents Magnet – DPCalendar **. Then enable it.

! If you have problems installing or updating the extension, please try the manual installation process as described here: docs.joomla.org/Installing_an_extension

## Configure the plugin
![plg_aemagnet_dpcalendar](plg_aemagnet_dpcalendar.png)
### [basic]
             
| Option | Description | Type | Value |
| ------ | ----------- | ---- | ----- |
|  Download ID | Enter your Download ID to enable Updates | text | (default:``)|

## Frequently Asked Questions
### Which data in insert mode ?
These data were created when the event (identified by external UID) not exists:
* title     
* alias     
* start_date
* end_date  
* all_day   
* category (_catid_)
* description
* url       
* params
* images

### Which data in update mode ?
These data were updated when the event (identified by external UID) already exists:
* title      
* start_date 
* end_date   
* all_day    
* category (_catid_)
* description
* images     
