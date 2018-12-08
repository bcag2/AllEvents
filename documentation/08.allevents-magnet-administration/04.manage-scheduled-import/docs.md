---
title: 'Manage Scheduled Import'
visible: true
---

You don't want to login every day to import your events, so a crontab can do this job for you. What does the cron do? Execute an import like you could do yourself. 

We have to create 5 crontabs:

* **Once Hourly**:  https://my_web_site?option=com_aemagnet&task=cron.hourlyCron
* **Once Month**: https://my_web_site?option=com_aemagnet&task=cron.monthlyCron
* **Once Weekly**: https://my_web_site?option=com_aemagnet&task=cron.weeklyCron
* **Once Daily**: https://my_web_site?option=com_aemagnet&task=cron.dailyCron
* **Twice Daily**: https://my_web_site?option=com_aemagnet&task=cron.twicedailyCron

Even if you run the script too often, a check is made in order to respect the periodicity interval.

We assume you know how to set up a crontab on your server, otherwise you have to ask your host how to do this or read their documentation how to set up crontabs.

**CRONTAB SECURITY**: As the crontab system is being called by an URL we have to proctect the crontab by a password. In the configuration you are able to set a password for your crontabs so they cannot be accessed by a user, bot or anything else without knowing the key/password.

Once you have set the password, you have to change the URI's to the crontab:
* **Once Hourly**:  https://my_web_site?option=com_aemagnet&task=cron.hourlyCron&key=[mykey]
* **Once Month**: https://my_web_site?option=com_aemagnet&task=cron.monthlyCron&key=[mykey]
* **Once Weekly**: https://my_web_site?option=com_aemagnet&task=cron.weeklyCron&key=[mykey]
* **Once Daily**: https://my_web_site?option=com_aemagnet&task=cron.dailyCron&key=[mykey]
* **Twice Daily**: https://my_web_site?option=com_aemagnet&task=cron.twicedailyCron&key=[mykey]
