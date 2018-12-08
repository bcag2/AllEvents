---
title: 'How to Embed AllEvents Events in Joomla Articles'
date: '05:46 04-01-2018'
author: 'emmanuel lecoester'
---

The [Content- AllEvents plugin](https://documentation.allevents3.com/allevents-plugins/content-allevents) allow you to embed events from your AllEvents events into your Joomla articles. The main benefits of using the plugins are:

* Ability to embed events in content items with one click
* Freeing AllEvents events from the confines of a calendar-based display
* Automatic updating of event details in all Joomla articles once you edited the event details in AllEvents

## How to Embed Event Using Tags

To display upcoming or recent events in a Joomla article, simply place the following tag in your article where you want the events to appear:

Basic syntax (uses all plugin defaults): **&#123;&#123;#aeevents&#125;&#125;MyTitle&#123;&#123;/aeevents&#125;&#125;**.

|  Key  |  Description  |  Value  |  
|  :----- |  :----- |  :----- |
| eid |  Choose an Event. |   |
| pid |  Choose an Activity. |   |
| aid |  Choose a Calendar. |   |  
| cid |  Choose a Category. |   |  
| lid |  Choose a Place. |   |  
| pid |  Choose a Public. |   |  
| sid |  Choose a Section. |   |  
| rid |  Choose a Resource. |   |  
| limit | Enter number of events you want to display in the module | default value is 5 and 5 events will be displayed |  
| sort_by | The order strategy for the events. If ‘Date Descending’ selected, reverse chronological order, from latest to earliest (the oldest date will be at end). If ‘Date Ascending’ selected, chronological order, from earliest to latest (the oldest date will be first).  |  0:`DATE ASC`,<br/> 1:`DATE DESC`,<br/> 2:`ENDDATE ASC`,<br/> 3:`ENDDATE DESC`,<br/> 4:`ID ASC`,<br/> 5:`ID DESC` | 
| period | Period of events to display | 1:`Current`,<br/> 2:`Next`,<br/> 3:`Next and current`,<br/> 4:`Past`,<br/> 5:`Past and current` |
| pivot | base element in the period to display. For example pivot=1 and period = 1 will display the events of today, pivot=3 and period = 1 will display the events of the current month  | 1:`Day`,<br/> 2:`Week`,<br/> 3:`Month`,<br/> 4:`Year`|  

Additional parameters (alone or in combination) may also be used to override the default settings:

Specific event ID:
**&#123;&#123;#aeevents eid=110&#125;&#125;MyTitle&#123;&#123;/aeevents&#125;&#125;**

List of upcoming events in specific calendars:
**&#123;&#123;#aeevents period=2 aid=1&#125;&#125;MyTitle&#123;&#123;/aeevents&#125;&#125;**

List of the next 5 upcoming events: 
**&#123;&#123;#aeevents period=2 limit=5&#125;&#125;MyTitle&#123;&#123;/aeevents&#125;&#125;**

List of the last 2 recent events: 
**&#123;&#123;#aeevents limit=2&#125;&#125;MyTitle&#123;&#123;/aeevents&#125;&#125;**

List of upcoming events in category 2, sorted ascendingly by date: 
**&#123;&#123;#aeevents limit=5 cid=2 sort_by=0 &#125;&#125;MyTitle&#123;&#123;/aeevents&#125;&#125;**
