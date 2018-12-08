---
title: 'AllEvents - Phoca Download'
date: '03:29 27-11-2017'
taxonomy:
    category:
        - Plugin
    tag:
        - rating
visible: true
---

Displaying 

* link to Phoca Download Sections
* link to Phoca Download Section
* link to Phoca Download Category
* link to Phoca Download File

in AllEvents events.

## Table of Contents
1. [Install the plugin](#install-the-plugin)
2. [Configure the plugin](#configure-the-plugin)
3. [Frequently Asked Questions](#frequently-asked-questions)
	
## Install the plugin
1. Download the extension to your local machine as a zip file package.
2. From the backend of your Joomla site (administration) select **Extensions >> Manager**, then Click the <b>Browse</b> button and select the extension package on your local machine. Then click the **Upload & Install** button to install module.
3. Go to **Extensions >> Plugin**, find and click on **AllEvents - Phoca Download Plugin**. Then enable it.

! If you have problems installing or updating the extension, please try the manual installation process as described here: docs.joomla.org/Installing_an_extension

For update the plugin you can follow [this topic](https://documentation.allevents3.com/allevents/installation/update).

For uninstall the plugin you can follow [this topic](https://documentation.allevents3.com/allevents/installation/uninstall).

## Configure the plugin

| Option | Description | Type | Value |
| ------ | ----------- | ---- | ----- |
|  icon_size |  Set Icon Size |  Select 64, 48, 32, 16 |  default=`32`|
| File Icon (Extension Mime Type) | Enable or disable displaying of file icon by extension mime type (for example: PDF icon will be displayed next to PDF documents). Be aware not all extension mime type icons are available. | Yes, No | default `No`|

### Examples 
Link to Phoca Download Sections (Phoca Download Component) 
! Deprecated in Phoca Download 2
	{phocadownload view=sections|target=b}

Link to Phoca Download Section (Phoca Download Section)
! Deprecated in Phoca Download 2
	{phocadownload view=section|id=3|target=b}

Link to Phoca Download Plugin Category (Phoca Download Plugin Category)

	{phocadownload view=category|id=35|target=b}

Link to Phoca Download File (Phoca Download Plugin File)

	{phocadownload view=file|id=280}

### Attributes available
You can use following attributes:

* **view**: (Phoca Download 1) sections|section|category|file|fileplay|fileplaylink|filepreviewlink|youtube
* **view**: (since Phoca Download 2)categories|category|filelist|file|fileplay|fileplaylink|filepreviewlink|youtube
* **text**: text (title) which will be displayed in the content article as a link
* **id**: id of section|category|file
* **target**: target of the link (b ... _blank, t ... _top, s ... _self, p ... _parent)
* **playerwidth**: width of the player - for playing e.g. flv files
* **playerheight**: height of the player
* **playerheightmp3**: height of the player in case MP3 file will be played
* **previewwidth**: widht of the popup window for previewing the file (PDF)
* **previewheight**: height of the popup window for previewing the file
* **youtubewidth**: width of the youtube player
* **youtubeheight**: height of the youtube player
* **url**: link to Youtube video ( example: phocadownload view=youtube|url=https://www.youtube.com/watch?v=gC2T3F3G8zM)
* **limit**: (since Phoca Download 2) uses in filelist view - the list of files can be limited

## Frequently Asked Questions
No questions for the moment
