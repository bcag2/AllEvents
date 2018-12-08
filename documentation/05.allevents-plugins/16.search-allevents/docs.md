---
title: 'Search - AllEvents'
date: '03:44 27-11-2017'
taxonomy:
    category:
        - Plugin
    tag:
        - search
---

Allows Searching of events in AllEvents with search in **Event** title, description and in **Calendar**, **Category**, **Place**, **Public**, **Resource**, **Section**  titles

## Table of Contents
1. [Install the plugin](#install-the-plugin)
2. [Configure the plugin](#configure-the-plugin)
3. [Frequently Asked Questions](#frequently-asked-questions)
	
## Install the plugin
1. Download the extension to your local machine as a zip file package. 
2. From the backend of your Joomla site (administration) select **Extensions >> Manager**, then Click the <b>Browse</b> button and select the extension package on your local machine. Then click the **Upload & Install** button to install module.
3. Go to **Extensions >> Plugin**, find and click on **Search - AllEvents**. Then enable it.

! If you have problems installing or updating the extension, please try the manual installation process as described here: docs.joomla.org/Installing_an_extension

## Configure the plugin

There are many options for you to customize your extension :

### [basic]
             
| Option | Description | Type | Value |
| ------ | ----------- | ---- | ----- |
|  Section | By default, the search on the site will use 'AllEvents Events' as the name of the section in the search form. If you want to use another term, you can change it by filling in this field. | text | |
|  Search Limit | Sets the maximum number of results to return. | text | (default:`50`)|
|  Link target | Target browser window when the event's link is clicked. | list | `Open in parent window`, `Open in new window`|
|  Search Published | Include published items in the search. | radio | `Yes`, `No`(default:`1`)|
|  Search Archived | Include archived items in the search. | radio | `Yes`, `No`|
|  Include Past Events | If past event should be included into the search result. | radio | `Yes`, `No`(default:`1`)|

## Frequently Asked Questions

**My events are not appearing in your search results**
Ensure the Search - AllEvents plugin is enabled in the backend Joomla plugin manager.