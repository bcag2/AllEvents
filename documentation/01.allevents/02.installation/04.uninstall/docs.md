---
title: Uninstall
published: true
taxonomy:
    tag:
        - config
        - install
routable: true
cache_enable: true
visible: true
recaptchacontact:
    enabled: false
---

If you have to uninstall AllEvents for some reasons (for example, you want starts from scratch - or maybe after installing and using it, you realize that it doesn't meet your requirement), you can follow the instructions below to get the extension completely uninstalled:

1. Login to backend of your site using a super admin account
2. Access to `Extensions => Manage => Manage` menu item.
3. Enter events keyword into the search box to search for AllEvents component and all it's modules, plugins (see the screenshot)
4. Check on the items you want to un-install
5. Click on Uninstall button in the toolbar

When you uninstall AllEvents, the database tables related to the extension won't be uninstalled. By doing that, when you re-install the extension in the future, all the old data will be kept and still be available. If you want to completely removing it, please access to your site database via phpmyadmin, look at all the tables with prefix `allevents` and drop these tables