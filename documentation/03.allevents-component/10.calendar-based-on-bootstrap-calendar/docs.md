---
title: 'Calendar based on Bootstrap calendar'
date: '00:04 27-11-2017'
recaptchacontact:
    enabled: false
---

Display of a calendar Day, Week, Month, Year

[Live Demo](https://www.allevents3.com/en/layout/calendars-fullpage/calendar-bootstrap)

## Configure the view
There are many options for you to customize your extension :
### AllEvents

**Display of event's data**

| Name | Label | Description | Type | Required | Default |
| ---- | ------| ----------- | ---- | -------- | ------- |
| display_defaultview | Default view | Default view | list |  | month |
| display_template | Template Form event | Template to be used for creation or modification of an event: standard or wizard | list |  | default |
| display_allowviewmonth | Allow display 'Month' | Allow display 'Month' | radio |  | `No`, `Yes` (default: `Yes`)|
| display_allowviewmonth | Allow display 'Month' | Allow display 'Month' | radio |  | `No`, `Yes` (default: `Yes`) |
| display_allowviewweek | Allow display 'Week' | Allow display 'Week' | radio |  | `No`, `Yes` (default: `Yes`) |
| display_allowviewday | Allow display 'Day' | Allow display 'Day' | radio |  | `No`, `Yes` (default: `Yes`) |
| display_allowviewyear | Allow display 'Year' | Allow display 'Year' | radio |  | `No`, `Yes` (default: `Yes`) |
| navigation_previousmonth | Button 'Previous Month' | Button which allows to go back to the month preceding the one that is currently displayed | radio |  | `No`, `Yes` (default: `Yes`) |
| navigation_nextmonth | Button 'Next Month' | Button which allows to go back to the month following the one that is currently displayed | radio |  | `No`, `Yes` (default: `Yes`) |

**Filters**

| Name | Label | Description | Type | Required | Default |
| ---- | ------| ----------- | ---- | -------- | ------- |
| pt | Activity | Choose an Activity. Without selection, `all` will be used. | aetoggleactivity | false | (default: `all`)|
| at | Calendar | Choose this option if you want to display all events in a Calendar. Users can then see the events in the calendar. Without selection, `all` will be used. | aetoggleagenda | false | (default: `all`)|
| ct | Category | Choose a Category. Without selection, `all` will be used. | aetogglecategory | false | (default: `all`)|
| lt | Venue | Choose a Place. Without selection, `all` will be used. | aetoggleplace | false | (default: `all`)|
| dt | Public | Choose a Public. Without selection, `all` will be used. | aetogglepublic | false | (default: `all`)|
| et | Ressource | Choose a Resource. Without selection, `all` will be used. | aetoggleressource | false | (default: `all`)|
| st | Section | Choose a Section. Without selection, `all` will be used. | aetogglesection | false | (default: `all`)|
| h | Featured Events | Show only events designated as featured or `All`. | radio |  | `No`, `Yes` (default: `No`) |

**Others**

| Name | Label | Description | Type | Required | Default |
| ---- | ------| ----------- | ---- | -------- | ------- |
| task |  |  | hidden |  | display |
| layout |  |  | hidden |  | default |

## Frequently Asked Questions
No questions for the moment
