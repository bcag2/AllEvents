---
title: 'Customizing e-mail templates'
media_order: email1.PNG
date: '06:27 03-01-2018'
author: 'emmanuel lecoester'
---

## The e-mail templates config

A powerful feature with AllEvents is the e-mailing system.

### Registration management 

| Option | Description | Type | Value |
| ------ | ----------- | -----|-------|
|  Title | E-mail title | text |  (default: ``)|
|  Registration NO | Registration refused by the admin or user | editor | |
|  Registration YES | Registration accepted by the admin | editor | |
|  Registration is pending | Registration sumitted, need to be approved by an admin | editor | |
|  Registration perhaps | User say maybe! | editor | |
|  Registration in waiting list | Registration in waiting list | editor | |
|  Registration accepted | User say yes! | editor | |

### Event management 

| Option | Description | Type | Value |
| ------ | ----------- | -----|-------|
|  Event updated | Event updated in front or in back | editor | |

### Proposal management 

| Option | Description | Type | Value |
| ------ | ----------- | -----|-------|
|  Proposal submitted | Proposal submitted, has to be approved by an admin | editor | |
|  Proposal accepted | Proposal accepted | editor | |
|  Proposal approved | Proposal approved by an admin | editor | |

## The e-mail variables 

For each email, if you want to add more variables to the e-mail content, click any of them to be added in the e-mail content; currently these variables are available:
* [**ACTIVITY**] ACTIVITY keyword of language file
* [**AGENDA**] AGENDA keyword of language file
* [**CATEGORY**] CATEGORY keyword of language file
* [**CONTACT_PERSON**] CONTACT_PERSON keyword of language file
* [**DATE**] DATE keyword of language file
* [**DESCRIPTION**] DESCRIPTION keyword of language file
* [**ENDDATE**] ENDDATE keyword of language file
* [**ENROL_USERALIAS**] User alias
* [**ENROL_USERNAME**] User Name
* [**EVENT_ACTIVITY**] Activity
* [**EVENT_AGENDA**] Calendar
* [**EVENT_CATEGORY**] Category
* [**EVENT_CONTACT**] Contact name
* [**EVENT_DATE**] Start Date
* [**EVENT_DESC**] Description 
* [**EVENT_ENDDATE**] End Date
* [**EVENT_ID**] Event ID 
* [**EVENT_INFO**] keyword EVENT_INFO in language file
* [**EVENT_LINK**] Event Link
* [**EVENT_PLACE**] Venue 
* [**EVENT_PUBLIC**] Public
* [**EVENT_RESSOURCE**] Resource
* [**EVENT_SECTION**] Section
* [**EVENT_TITLE**] Title
* [**LINK_URL**] LINK_URL keyword of language file
* [**PARTICIPANT**] PARTICIPANT keyword of language file
* [**PLACE**] PLACE keyword of language file
* [**POWERED_BY**] Power by AllEvents
* [**PUBLIC**] PUBLIC keyword of language file
* [**SECTION**] SECTION keyword of language file
* [**SITE_NAME**] Site Name
* [**SITE_URL**] Site URL
* [**SITE_WEBMASTER**] webmaster e-mail
* [**TITLE**] TITLE keyword of language file

!! `XXX keyword of language file` is the sentence that you define for `XXX` in your language file or in the backend with override functionaly.

!!!! You can also use [**EVENT_URL**]. It's the same value like [EVENT_LINK]
