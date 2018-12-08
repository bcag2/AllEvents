---
title: 'Customizing e-mail'
date: '06:47 03-01-2018'
author: 'emmanuel lecoester'
---

In this view, you can define who will receive a mail...

![](email1.PNG)

## Management of the sending mail triggers

| Option | Description | Type | Value |
| ------ | ----------- | -----|-------|
|  Emails | Management of e-mails | radio | `No`, `Yes` (default: `Yes`)|
|  Email by ... | Send mails by User Group or by user. | radio | `User Group`, `User` (default: `User`)|

### User Groups

| Option | Description | Type | Value |
| ------ | ----------- | -----|-------|
|  Creation Group : | Choose a group to send the mail at the creation | usergrouplist | `No users group selected` (default: `No users group selected`)|
|  Update Group : | Select a group to send the mail at the update | usergrouplist | `No users group selected` (default: `No users group selected`)|
|  Mail to Children User Groups | If set to Yes, the mail will be sent to all Children User Groups for the group | radio | `No`, `Yes` (default: `Yes`)|
|  Send as blind carbon copy (BCC) | Hides recipient list and adds copy to website email. | radio | `No`, `Yes` (default: `Yes`)|

### User Mails

| Option | Description | Type | Value |
| ------ | ----------- | -----|-------|
|  Admin: creation | Dispatch of a mail to the Admin at an event creation | radio | `No`, `Yes` (default: `Yes`)|
|  Admin: modification | Dispatch of a mail to the Admin at an event modification | radio | `No`, `Yes` (default: `Yes`)|
|  Resp Calendar: creation | Dispatch of a mail to the Calendar representativer at an event creation | radio | `No`, `Yes` (default: `Yes`)|
|  Resp Calendar: modification | Dispatch of a mail to the Calendar representativer at an event update | radio | `No`, `Yes` (default: `Yes`)|

### Mails to creator

| Option | Description | Type | Value |
| ------ | ----------- | -----|-------|
|  Author: creation | Dispatch of a mail to the author at an event creation | radio | `No`, `Yes` (default: `Yes`)|
|  Author: modification | Dispatch of a mail to the author at an event update | radio | `No`, `Yes` (default: `Yes`)|
|  Author: waiting | Dispatch of a mail to the author about an event awaiting for validation | radio | `No`, `Yes` (default: `Yes`)|
|  Author: validation | Dispatch of a mail to the author at the event validation by the Calendar admin or representative | radio | `No`, `Yes` (default: `Yes`)|
