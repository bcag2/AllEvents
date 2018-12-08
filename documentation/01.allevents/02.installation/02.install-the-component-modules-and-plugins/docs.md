---
title: 'Install the component, modules and plugins'
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

The component, all the modules and plugins are included in a single package com_allevents.zip

1. Login to back-end of your site using a super administrator account.
2. Access to `Extensions => Manage => Install` menu item.
3. **Browse** for the file `com_allevents.zip`.
4. Click on **Upload & Install** button

If everything worked properly you will get a success message notification.

If you are facing this error during installation: `Fatal error: Maximum execution time of 30 seconds exceeded in [file/path.php] on line [line number]` you may try to install the component from a directory as described :
* Download com_allevents.zip and unpack all AllEvents files to a directory on your computer
* Using FTP, upload this directory to the /tmp directory of your Joomla installation on your webserver
* Access to `Extensions => Manage => Install` menu item.
* Choose `install from folder`
* Click on the Install button and Joomla will install it from the given directory.

