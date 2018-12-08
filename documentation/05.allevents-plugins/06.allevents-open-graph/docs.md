---
title: 'AllEvents - Open Graph'
date: '03:32 27-11-2017'
taxonomy:
    category:
        - Plugin
    tag:
        - Facebook
---

Adding Open Graph meta information to your events.

!!!! Open Graph protocol can complete any webpage of the website in an object enriched in social networks. Open Graph is especially used in Facebook.

By installing and enabling any of the Open Graph plugins that are included with AllEvents, most tags will automatically be set for your page. For example, if you enable the **AllEvents - Open Graph** plugin, AllEvents will automatically set the title and description for your Joomla page using the title and description text to your event. The image used on Facebook will be set to the cover image found in the event.

## Table of Contents
1. [Install the plugin](#install-the-plugin)
2. [Configure the plugin](#configure-the-plugin)
3. [Frequently Asked Questions](#frequently-asked-questions)
	
## Install the plugin
1. Download the extension to your local machine as a zip file package.
2. From the backend of your Joomla site (administration) select **Extensions >> Manager**, then Click the <b>Browse</b> button and select the extension package on your local machine. Then click the **Upload & Install** button to install module.
3. Go to **Extensions >> Plugin**, find and click on **AllEvents - Open Graph**. Then enable it.

! If you have problems installing or updating the extension, please try the manual installation process as described here: docs.joomla.org/Installing_an_extension

## Configure the plugin
There are many options for you to customize your extension :
### Event Options[event]
             
| Option | Description | Type | Value |
| ------ | ----------- | ---- | ----- |
|  Title | If empty, event title will be set. It is recommended to leave this parameter empty. | text | |
|  Type | Set type | list | `Activity`, `sport`, `bar`, `company`, `cafe`, `hotel`, `restaurant`, `cause`, `sports_league`, `sports_team`, `band`, `government`, `non_profit`, `school`, `university`, `actor`, `athlete`, `author`, `director`, `musician`, `politician`, `public_figure`, `City`, `Country`, `landmark`, `state_province`, `album`, `book`, `drink`, `food`, `game`, `product`, `song`, `movie`, `tv_show`, `blog`, `website`, `article`(default:`Activity`)|
|  Image | Set image. If image will be not set here, plugin will try to find the image in event content. If event does not contain any image, plugin will try to search /images/aeopengraph/ folder for image which has the same name as event ID has (e.g. event ID=1 ==> 1.jpg). See documentation to understand this behaviour. | media | |
|  Url | If empty, event url will be set. It is recommended to leave this parameter empty | text | |
|  Site Name | Set site name - human-readable name of your site. If empty, site name from global configuration will be set. It is recommended to leave this parameter empty. | text | |
|  Site Description | Set site description. If empty, site description from events options will be set, if the description of event will be empty, global configuration will be set. Site Meta Description parameter will be used. | textarea | |
|  Display (Event) | Run the plugin for Events | list | `Yes`, `No`(default:`1`)|
### Common Options[common]
             
| Option | Description | Type | Value |
| ------ | ----------- | ---- | ----- |
|  Application ID | Set Facebook Application ID | text | |
|  Other Properties | Set other properties. Separate each property value with semicolon (;). E.g. og:audio:title=Some Audio;og:audio:artist=SomeArtist | textarea | |
|  Render Type | Set if meta tag will be displayed with Name attribute or Property attribute | list | `Name`, `Property`(default:`1`)|

## Frequently Asked Questions
### Wich data ?
* **og:title** - Event title
* **og:type** - Tyoe of event
* **og:image** - Related picture of the event (poster, thumbnail, picture in the description,...)
* **og:url** - Canonic URL of the event. So, ID of the event becomes the main element in the graph of the event
* **og:site_name** - Website name
* **og:description** - Event description

### Wich image ?
If you don't set a specific image, the plugin try to set in order : cover image,  poster, thumbnail, picture in the description 