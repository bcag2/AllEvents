---
title: 'Move data from one site to a new site'
published: true
taxonomy:
    tag:
        - Development
routable: true
cache_enable: true
visible: true
recaptchacontact:
    enabled: false
---

Sometime, you have to move AllEvents data from one site to a new site. To do that, you will need to:

1.      Export all AllEvents related database tables from old site via phpmyadmin (table with `allevents` prefix)
1.      Open that sql file, use find and replace function of the text editor to replace table prefix so that it meets the table prefix of the new site (in case your old site and new site use different database table prefix)
1.      Import these database tables into new site database (via phpmyadmin)
1.      Install latest version of AllEvents to the new site so that the database schema will be updated to latest version (or access to Tools -> Fix Database Schema if your site is running on latest version of AllEvents already)