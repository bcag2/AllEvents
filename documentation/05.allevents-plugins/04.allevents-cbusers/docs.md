---
title: 'AllEvents - CBUsers'
date: '03:31 27-11-2017'
taxonomy:
    category:
        - Plugin
    tag:
        - 'Community Builder'
---

This plugin gives you the possibility of additional user displays with data of Community Builder

## Table of Contents
2. [Install the plugin](#install-the-plugin)
3. [Update the plugin](#update-the-plugin)
4. [Configure the plugin](#configure-the-plugin)
5. [Frequently Asked Questions](#frequently-asked-questions)
6. [Uninstall the plugin](#uninstall-the-plugin)
	
## Install the plugin
1. Download the extension to your local machine as a zip file package.
2. From the backend of your Joomla site (administration) select **Extensions >> Manager**, then Click the <b>Browse</b> button and select the extension package on your local machine. Then click the **Upload & Install** button to install module.
3. Go to **Extensions >> Plugin**, find and click on **AllEvents - CBUsers**. Then enable it.

! If you have problems installing or updating the extension, please try the manual installation process as described here: docs.joomla.org/Installing_an_extension

## Update the plugin
Update using the same steps you used when you install it. You do not need to uninstall it first. The extension will update all its files automatically.

## Configure the plugin
There are many options for you to customize your extension :
### [basic]
             
| Option | Description | Type | Value |
| ------ | ----------- | ---- | ----- |
|  Ordering | Display the ordering of enrolment | radio | `Hide`, `Show`(default:`Show`)|
|  Avatar | Display the avatar of participant | radio | `Hide`, `Show`(default:`Show`)|
|  Alias | Display the aliad of participant | radio | `Hide`, `Show`(default:`Show`)|
|  Name | Display the name of participant of enrolment | radio | `Hide`, `Show`(default:`Show`)|
|  Enroldate | Display the enrolment date of enrolment | radio | `Hide`, `Show`(default:`Show`)|
|  State | Display the state of enrolment | radio | `Hide`, `Show`(default:`Show`)|
|  Comment | Display the comment of enrolment | radio | `Hide`, `Show`(default:`Show`)|
|  Participants | Display the number of participants | radio | `Hide`, `Show`(default:`Show`)|
|  Profile with .html ? | Add .html on the Community Builder profile's URL | radio | `No`, `Yes`(default:`Yes`)|
|  Field's name to display | If you want that the list of the participants take back fields of the third component, please introduce the names of fields separated by one; <br/> Example:  <br/> <strong> name; firstname; email; registerDate </strong> These names are those that you will find in the management of the fields of the third component | text | |

## Frequently Asked Questions
### CB Users Plugin: Participants pictures are well displayed in the registrations, but they are too big and seem to me out of proportion (I would like to display a single size)
In order to answer this question, you just needs to add this code in the css customized of AllEvents : 
 
````
// the thumbnail will be 75 pixels high and 50 pixels wide.
.cbImgPict.cbThumbPict.img-thumbnail {
    max-height: 75px;
    max-width: 50px;
}
````

## Uninstall the plugin
1. Login to Joomla backend.
2. Click **Extensions >> Manager** in the top menu.
3. Click **Manage** on the left, navigate on the extension and click the Uninstall button on top.