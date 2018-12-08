---
title: 'List of Events'
date: '00:06 27-11-2017'
---

Show list of Events

[Live Demo](https://www.allevents3.com/en/demo)

## Configure the view
! Some elements presented in this page are only available in premium version.

There are many options for you to customize your extension :
### AllEvents

**Filters**:
You can select some filters on dates

| Name | Label | Description | Type | Required | Default |
| ---- | ------| ----------- | ---- | -------- | ------- |
| banniere | Banner | Event Banner for share event on social networks. Recommanded : 1200x627, Square Photo : minimun 154x154, Rectangular Photo : minimum 484x252 | media |  |  |
| nb_top | Events number | Number of events to display | text |  | 0 |
| pivot | Period | Period granularity used as comparison (Year, Month, Week, Day) | list |  | 1 |
| period | Period to display | In the past, in future... | list |  | 0 |
| sort_by | Events sorted by | Events sort by | list |  | 0 |
| fromdate | From |  | calendar |  |  |
| todate | To |  | calendar |  |  |

You can select some filters on calendars...

| Name | Label | Description | Type | Required | Default |
| ---- | ------| ----------- | ---- | -------- | ------- |
| pt | Activity | Choose an Activity. Without selection, `all` will be used. | aetoggleactivity | false |  |
| at | Calendar | Choose this option if you want to display all events in a Calendar. Users can then see the events in the calendar. Without selection, `all` will be used. | aetoggleagenda | false |  |
| ct | Category | Choose a Category. Without selection, `all` will be used. | aetogglecategory | false |  |
| lt | Venue | Choose a Place. Without selection, `all` will be used. | aetoggleplace | false |  |
| dt | Public | Choose a Public. Without selection, `all` will be used. | aetogglepublic | false |  |
| et | Ressource | Choose a Resource. Without selection, `all` will be used. | aetoggleressource | false |  |
| st | Section | Choose a Section. Without selection, `all` will be used. | aetogglesection | false |  |
| h | Featured Events | Show only events designated as featured or `All`. | radio |  | 0 |

**Display of event's data**

| Name | Label | Description | Type | Required | Default |
| ---- | ------| ----------- | ---- | -------- | ------- |
| evts_table_height | Display height | Defines the height in pixel of the the table which isplays events | text |  | 500 |
| show_rss | Display RSS |  | radio |  | 1 |
| show_activity | Display activity |  | radio |  | 1 |
| show_agenda | Display Calendar |  | radio |  |  |
| show_category | Display category |  | radio |  | 1 |
| show_place | Display Venue |  | radio |  | 1 |
| show_public | Display public |  | radio |  | 1 |
| show_ressource | Display resource |  | radio |  | 1 |
| show_section | Display section |  | radio |  | 1 |
| show_date | Display the Start date |  | radio |  | 1 |
| show_enddate | Display end date |  | radio |  | 1 |
| banner | Infinite Scroll |  | radio |  | 0 |
| grid_sort_agenda | Calendars sorted by |  | radio |  | 0 |
| infinite_scroll | Infinite Scroll |  | radio |  | 0 |
| display_openlinkself | Parent | Target browser window when the item is selected. | radio |  |  |

**Others**

| Name | Label | Description | Type | Required | Default |
| ---- | ------| ----------- | ---- | -------- | ------- |
| layout | Layout | Selection of the list display design | AELayoutEvents |  | default |
| task |  |  | hidden |  | display |


## Frequently Asked Questions
No questions for the moment
