---
title: 'Develop AllEvents plugin'
date: '13:35 26-11-2017'
visible: true
---

AllEvents allows you to develop plugins to extend it's features. Infact, it has many plugins come with it by default which you can see in the folder plugins/allevents on your site.

AllEvents supports the following events trigger which you can write plugin to handle to add more features to the extension.
## Standard events
### onAllEventsPrepareForm
This event is triggered on frontend event detail page. You can write a plugin to handle this event to display **more information of the event** on event details page if needed. Look at jcomments plugin in the package to see how this event can be used.
```
public function onAllEventsPrepareForm ($form, $data)
{
}
```
### onAlleventsBeforeDisplayEvent
This event is triggered on frontend event detail page. You can write a plugin to handle this event to display some informations **before** the event's block on event details page if needed. 
```
public function onAlleventsBeforeDisplayEvent (&$event, &$params)
{
}
```

### onAlleventsEventPrepare
This event is triggered on frontend event detail page. You can write a plugin to handle this event to display some informations in the description of the event if needed. For example this event is fired with the PhocaDownload plugin for AllEvents (since Septemebre 2017).
```
public function onAlleventsEventPrepare (&$event, &$params)
{
}
```

### onAlleventsAfterDisplayEvent
This event is triggered on frontend event detail page. You can write a plugin to handle this event to display some informations **after** the event's block on event details page if needed. 
```
public function onAlleventsAfterDisplayEvent (&$event, &$params)
{
}
```

### onAlleventsEnrolmentsBlock
This event is triggered on frontend event detail page. You can write a plugin to handle this event to display some informations **in place of** the enrolments event's block on event details page if needed. For example, it's used by the CBUsers plugin.
```
public function onAlleventsEnrolmentsBlock (&$item, &$enrolments, &$params)
{
}
```
### onAfterAlleventsSave
This event is triggered after the event is saved to database. It is usually used to save the settings data which you displayed on event add/edit screen so that you can used that settings data later.
```
public function onAfterAlleventsSave (&$item, $isNew)
{
}
```
### onAlleventsCommentsCounter
This event is triggered on frontend event detail page. You can write a plugin to handle this event to display some informations in the bloc display Comments Counter.
```
public function onAlleventsCommentsCounter (&$item)
{
}
```
### onAlleventsCommentsBlock
This event is triggered on frontend event detail page. You can write a plugin to handle this event to display some informations in the bloc display Comments.
```
public function onAlleventsCommentsBlock (&$item)
{
}
```
## Specifics events for social integrations
### onAlleventsRichSnippetsEvent
This event is triggered on frontend event detail page. You can write a plugin to handle this event to display some informations **in place of** the *Rich Snippet* event's block on event details page if needed.
```
public function onAlleventsRichSnippetsEvent (&$item, &$params)
{
}
```
### onAlleventsOpenGraphEvent
This event is triggered on frontend event detail page. You can write a plugin to handle this event to display some informations **in place of** the *Open Graph* event's block on event details page if needed.
```
public function onAlleventsOpenGraphEvent (&$item, &$params)
{
}
```
### onAlleventsTwitterCardEvent
This event is triggered on frontend event detail page. You can write a plugin to handle this event to display some informations **in place of** the *Twitter Card* event's block on event details page if needed.
```
public function onAlleventsTwitterCardEvent (&$item, &$params)
{
}
```

## Specifics events to design your layouts
You want to display List of Event, Event, Event form with your template but you don't want to override AllEvents ? These events were for you : 
### onAlleventsgetLayoutsEvent
This event is triggered on backend AllEvents. You can write a plugin to handle this event to display your layouts in the list of layout for the display of an event.
```
public function onAlleventsgetLayoutsEvent ()
{
    $options = [];
    $options[] = ["value" => "my_layout:event", "text" => JText::_('my_layout_event')];
    return json_encode($options);
}
```

### onAlleventsgetLayoutsEventForm
This event is triggered on backend AllEvents. You can write a plugin to handle this event to display your layouts in the list of layout for the display of an event form.
```
public function onAlleventsgetLayoutsEventForm ()
{ 
    $options = [];
    $options[] = ["value" => "my_layout:eventform", "text" => JText::_('my_layout_eventform')];
    return json_encode($options);
}
```
### onAlleventsgetLayoutsEvents
This event is triggered on backend AllEvents. You can write a plugin to handle this event to display your layouts in the list of layout for the display of an events list.
```
public function onAlleventsgetLayoutsEvents ()
{ 
    $options = [];
    $options[] = ["value" => "my_layout:events", "text" => JText::_('my_layout_events')];
    return json_encode($options);
}
```