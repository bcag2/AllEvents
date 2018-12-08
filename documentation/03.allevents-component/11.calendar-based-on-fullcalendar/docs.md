---
title: 'Calendar based on FullCalendar'
date: '00:04 27-11-2017'
taxonomy:
    tag:
        - Fullcalendar
recaptchacontact:
    enabled: false
---

Display of a calendar Day, Week, Month, Year

[Live Demo](https://www.allevents3.com/en/layout/calendars-fullpage/calendar-fullcalendar)

## Configure the view
! Some elements presented in this page are only available in premium version.

There are many options for you to customize your extension :
### AllEvents

**Display of event's data**

| Name | Label | Description | Type | Required | Default |
| ---- | ------| ----------- | ---- | -------- | ------- |
| display_defaultview | Default view | Choose the default view between all displays available | list |  | (default: `default`) |
| display_colors | Entity anchor | Selection of entity Calendar, Activity, Category to be used for the display of events (Color, avatar) | list |  |  |
| display_colors_fore | Forecolor | Color to be used for the text (text or bottom of entity anchor) | list |  |  |
| display_colors_back | Backcolor | Color to be used for the bottom (text or bottom of entity anchor) | list |  |  |
| display_openlinkself | Parent | Target browser window when the item is selected. | radio |  | _blank |

**Display of event's data**

| Name | Label | Description | Type | Required | Default |
| ---- | ------| ----------- | ---- | -------- | ------- |
| display_allowviewmonth | Allow display 'Month' | Allow display 'Agenda' | radio |  | `No`, `Yes` (default: `Yes`) |
| display_allowviewweek | Allow display 'Week' | Allow display 'Week' | radio |  | `No`, `Yes` (default: `Yes`)  |
| display_allowviewday | Allow display 'Day' | Allow display 'Day' | radio |  | `No`, `Yes` (default: `Yes`)  |
| display_starthour | Starting Hour of the grid | The displays Week and Day provide a display with the different timeslots on the left. These start by default at 8 (o'clock); you can adjust this parametre here. | integer |  | 8 |
| display_endhour | Default view | Week and Day displays  provide a display where different time slots are visible on the left. These end by default at 22 (o'clock); you can adapt this parametre here. | integer |  | 22 |
| display_showtooltip | bullet | This parameter defines if you display the bullet at the mouse rollver of an event of the calendar. | radio |  | `No`, `Yes` (default: `Yes`)  |
| display_notification | Display of a notification during an action | when the user adds, changes or Deletees an event, a small 'Popup'can be displayed to confirm him action. Click on Yes if you want this notification. | radio |  | `No`, `Yes` (default: `Yes`)  |
| display_template | Template | Selection of the template to be uused for the calendar | list |  | cupertino |

**Display of Toolbar**

| Name | Label | Description | Type | Required | Default |
| ---- | ------| ----------- | ---- | -------- | ------- |
| display_showfilters | Display the filters zone | filters allow for example to only display events of a specific Calendar, of a type of activity or a place. | radio |  | `No`, `Yes` (default: `Yes`)  |
| display_new | Button 'Add New Event' | for the users able to create an event, do you wish that they could click on a button 'Add New Event'to create one? | radio |  | `No`, `Yes` (default: `Yes`)  |
| display_place | Button add a venue | when the button is shown, the user will have access to a button which allows to create a venue. | radio |  | `No`, `Yes` (default: `Yes`)  |
| navigation_previousyear | Button 'Previous Year' | Shows the button allowing to display the calendar of the previous year | radio |  | `No`, `Yes` (default: `No`)  |
| navigation_previousmonth | Button 'Previous Period' | Button which allows to go back to the month preceding the one that is currently displayed | radio |  | `No`, `Yes` (default: `Yes`)  |
| navigation_nextmonth | Button 'Next Month' | Button which allows to go back to the month following the one that is currently displayed | radio |  | `No`, `Yes` (default: `Yes`)  |
| navigation_nextyear | Button 'Next Year' | Shows the button allowing to display the calendar of next year | radio |  | `No`, `Yes` (default: `No`)  |

**Others**

| Name | Label | Description | Type | Required | Default |
| ---- | ------| ----------- | ---- | -------- | ------- |
| task |  |  | hidden |  | (default: `display`) |
| layout |  |  | hidden |  | (default: `default`) |


### advanced
| Name | Label | Description | Type | Required | Default |
| ---- | ------| ----------- | ---- | -------- | ------- |
| text_intro | Introduction text | If you want to display a text before the display of AllEvents, please fulfill the text here. This text can include HTML tags. | editor |  |  |
| text_conclusion | Text of conclusion | if you want to display a text after the display of AllEvents, please fulfill the text here. This text can include HTML tags. | editor |  |  |


## Frequently Asked Questions
No questions for the moment