---
title: 'Cache Settings in AllEvents'
date: '06:28 07-12-2017'
visible: true
---

## What is a Cache?

A cache is a method of storing previously retrieved information for a certain amount of time temporarily. For AllEvents, when the first user requests a Joomla page with a AllEvents (or plugin) on it, the data is retrieved from the database or calendar source. This takes time. Time to retrieve and process the information. When a second user requests the same page and the cache is enabled, the information is pulled from the cache (memory) instead of the original source. This is faster and uses less server resources. However, the information will be minutes old. For most users the delay is not noticed. If you are responsible to update the calendar, you might not see the update for several minutes after you made the change. This may upset some users that want to see their changes immediately. Turning off the cache will show changes more quickly but can slow your site down considerably.

Joomla has a caching system as does AllEvents and other extensions, they will be explained more deeply in the next chapters.

## Global Joomla Cache

The best cache option for your site is the cache plugin, which caches the whole page. Means that no PHP code is executed at all, will relax your server and deliver the pages faster.

You may find Joomla's cache settings in the **Global Configuration** > **System tab**.

| | | |
|  :-----          |  :-----          |  :-----          |
|  Cache |  Off - Caching Disabled <br/> On - Conservative Caching <br/> On - Progressive Caching |  No caching <br/> Some caching <br/> Most caching |
|  Cache Handler|  File <br/> Alternative PHP Caching |  Data saved as a file on your server <br/> Data saved as per your PHP settings |
|  Cache Time |  15 (minutes or 900 seconds) |  Longer times = faster site and less up to date |

For more information see this article from Joomla - [https://docs.joomla.org/Cache](https://docs.joomla.org/Cache) 

## AllEvents Cache

Every AllEvents modules use the standard recommandations and allow to specify the Cache parameters.