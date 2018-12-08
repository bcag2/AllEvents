---
title: 'Customizing language'
date: '06:22 03-01-2018'
author: 'emmanuel lecoester'
---

In order to be able to customize the AlLEvents language into your own, first you have to make sure you have installed the Language Pack for your language for Joomla! CMS. For new languages installed for the CMS, AllEvents will automatically create the language files for your new language based on the English default language files.

If you want to create your own language file, for example Spanish you must create these files and placed them in:

**Frontend** - your_site_root/language/es-ES/es-ES.com_allevents.ini

**Backend** - your_site_root/administrator/language/es-ES/es-ES.com_allevents.ini

## Creating a new language pack

As you might know, all our language packs are donated by the community. If you want to give something back to your community or just enjoy the privileges of being a translator for AllEvents, you can consider using one of the below given methods to create a language pack.

In order to manually create a language pack, you will have to translate the existing English language files (all our components are merchandised in English) found in your component's installation folders. In order to do this, follow the steps below:

1. Gather the English Language Files from your component installation, you can find them in the following folders:
* Front-end files can be found in: /language/en-GB
* Back-end files can be found in: /administrator/language/en-GB

2. Edit and translate the following Back-End .ini files:
* en-GB.com_allevents.ini
* en-GB.com_allevents.sys.ini

!!! In AllEvents component, we have only backend .ini files (so, no frontend .ini files).

3. After finished translating, don't forget to rename the files accordingly and copy them in the corresponding language folder, Spanish language example:
* Back-End files (es-ES.com_allevents.ini, es-ES.com_allevents.sys.ini) will have to be copied here: /administrator/languages/es-ES/

!!!! We recommend that you use the corresponding HTML code for UTF-8 characters. If you choose not to use HTML codes for your UTF-8 characters, please make sure that you save the file with UTF-8 no BOM encoding.



