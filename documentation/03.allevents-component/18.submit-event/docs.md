---
title: 'Submit event'
date: '00:08 27-11-2017'
---

Display a form to submit an event in the frontend

[Live Demo](https://www.allevents3.com/en/demo)

## Configure the view

There are many options for you to customize your extension :
### instructions
| Name | Label | Description | Type | Required | Default |
| ---- | ------| ----------- | ---- | -------- | ------- |
| evt_creation_instructions | Instructions | Informations shown to user for event creation | editor |  |  |
### details
| Name | Label | Description | Type | Required | Default |
| ---- | ------| ----------- | ---- | -------- | ------- |
| use_template |  |  | AEEval |  |  |
| force_template | Specific layout? | Specific layout or use the global layout for this menu entry ? | radio |  | 0 |
| templateeventform | Template Form event | Template to be used for creation or modification of an event: standard or wizard | AELayoutEventForm |  | default |
| use_agendas |  |  | AEEval |  |  |
| use_activities |  |  | AEEval |  |  |
| use_publics |  |  | AEEval |  |  |
| use_places |  |  | AEEval |  |  |
| use_ressources |  |  | AEEval |  |  |
| use_sections |  |  | AEEval |  |  |
| use_categories |  |  | AEEval |  |  |
| menuiteminit |  |  | AEMenuItemEventformInit |  |  |
| agenda_id | Calendar | Agenda of event | AEAgenda |  |  |
| activity_id | Activity | Activity of event | AEActivity |  |  |
| public_id | Public | Public of event | AEPublic |  |  |
| place_id | Venue | Venue of event | AEPlace |  |  |
| ressource_id | Resource | Event resource | AERessource |  |  |
| section_id | Section | Event section | AESection |  |  |
| category_id | Category | Category of event | AECategory |  |  |
### contacts
| Name | Label | Description | Type | Required | Default |
| ---- | ------| ----------- | ---- | -------- | ------- |
| contact_libre_lbl | Alternate Contact |  | AETitleImg |  |  |
| contact_libre_access | Acces |  | accesslevel |  |  |
| contact_1_lbl | Contact 1 |  | AETitleImg |  |  |
| contact_1_type | Type |  | AEContactType |  |  |
| contact_1_label | Label |  | text |  |  |
| contact_1_access | Acces |  | accesslevel |  |  |
| contact_1_details_category | Contacts Category * | Category of Contacts that can be associated with the event | category |  |  |
| contact_1_comprofiler_list | CB Users list * | List of Community Builder Users that can be associated with the event | AECBlist |  | 0 |
| contact_2_lbl | Contact 2 |  | AETitleImg |  |  |
| contact_2_type | Type |  | AEContactType |  |  |
| contact_2_label | Label |  | text |  |  |
| contact_2_access | Acces |  | accesslevel |  |  |
| contact_2_details_category | Contacts Category * | Category of Contacts that can be associated with the event | category |  |  |
| contact_2_comprofiler_list | CB Users list * | List of Community Builder Users that can be associated with the event | AECBlist |  | 0 |
| contact_3_lbl | Contact 3 |  | AETitleImg |  |  |
| contact_3_type | Type |  | AEContactType |  |  |
| contact_3_label | Label |  | text |  |  |
| contact_3_access | Acces |  | accesslevel |  |  |
| contact_3_details_category | Contacts Category * | Category of Contacts that can be associated with the event | category |  |  |
| contact_3_comprofiler_list | CB Users list * | List of Community Builder Users that can be associated with the event | AECBlist |  | 0 |


## Frequently Asked Questions
No questions for the moment