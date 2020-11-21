// Depends on https://raw.github.com/mozilla-comm/ical.js/master/build/ical.js

function ical_events(ical, event_callback, recur_event_callback) {

    jcal_events(ICAL.parse(ical), event_callback, recur_event_callback)
}

function jcal_events(jcal, event_callback, recur_event_callback) {
    console.log('jcal');console.log(jcal);
    for (event of new ICAL.Component(jcal).getAllSubcomponents('vevent')) {
        
        if (event.hasProperty('rrule')) {
            recur_event_callback(event);
        } else {
            event['cal_type']="Event";
            event_callback(event);
        }
    }
    for (event of new ICAL.Component(jcal).getAllSubcomponents('vtodo')) {

        if (event.hasProperty('rrule')) {
            recur_event_callback(event);
        } else {
            event['cal_type']="Todo";
            event_callback(event);
        }
    }
   
}

function event_duration(event) {
    return new Date(event.getFirstPropertyValue('dtend').toJSDate() - event.getFirstPropertyValue('dtstart').toJSDate()).getTime()
}

function event_dtend(dtstart, duration) {
    return new ICAL.Time().fromJSDate(new Date(dtstart.toJSDate().getTime() + duration))
}

function expand_recur_event(event, dtstart, dtend, event_callback) {
    exp = new ICAL.RecurExpansion({
        component:event,
        dtstart:event.getFirstPropertyValue('dtstart')
    })
    duration = event_duration(event)
    while (! exp.complete && exp.next() < dtend) {
        if (exp.last >= dtstart) {
            event = new ICAL.Component(event.toJSON())
            event.updatePropertyWithValue('dtstart', exp.last)
            event.updatePropertyWithValue('dtend', event_dtend(exp.last, duration))
            event_callback(event)
        }
    }
}

// Depends on ./ical_events.js

recur_events = []

function an_filter(string) {
    // remove non alphanumeric chars
    return string.replace(/[^\w\s]/gi, '')
}

function moment_icaltime(moment, timezone) {
    // TODO timezone
    return new ICAL.Time().fromJSDate(moment.toDate())
}

function expand_recur_events(start, end, timezone, events_callback) {
    events = []
    for (event of recur_events) {
       event_properties = event.event_properties
       expand_recur_event(event, moment_icaltime(start, timezone), moment_icaltime(end, timezone), function(event){
        fc_event(event, function(event){
            events.push(merge_events(event_properties, merge_events({className:['recur-event']}, event)))
        })
    })
   }
   events_callback(events)
}

function fc_events(ics, event_properties) {
    events = []
    ical_events(
        ics,
        function(event){

            fc_event(event, function(event){

                events.push(merge_events(event_properties, event));
                
            });
        },
        function(event){
            event.event_properties = event_properties
            recur_events.push(event)
        }
        )
    return events
}

function merge_events(e, f) {
    // f has priority
    for (k in e) {
        if (k == 'className') {
            f[k] = [].concat(f[k]).concat(e[k])
        } else if (! f[k]) {
            f[k] = e[k]
        }
    }
    return f
}

function fc_event(event, event_callback) {
    console.log('event getAllProperties');
    console.log(event.getAllProperties());

    var attendee_req = new Array();var attendee_opt = new Array();

    if (event.hasProperty('attendee')) {

       var attendees = event.getAllProperties('attendee');

       for (att of attendees) {
        if(att.getParameter('role') == undefined){
            attendee_req.push(att.getParameter('cn'));
        }else{
            attendee_opt.push(att.getParameter('cn'));
            }

        }
    }
    if (event.hasProperty('valarm')) {

       alert('alarm');
    }
e = {
    title:event.getFirstPropertyValue('summary'),
    url:event.getFirstPropertyValue('url'),
    id:event.getFirstPropertyValue('uid'),
    description:event.getFirstPropertyValue('description'),
    location:event.getFirstPropertyValue('location'),
    className:['event-'+an_filter(event.getFirstPropertyValue('uid'))],
    allDay:false,
    cal_type:event.cal_type,
    attendee_req:attendee_req,
    attendee_opt:attendee_opt
}
try {
    e['start'] = event.getFirstPropertyValue('dtstart').toJSDate()
} catch (TypeError) {
    console.debug('Undefined "dtstart", vevent skipped.')
    return
}
try {
    e['end'] = event.getFirstPropertyValue('dtend').toJSDate()
} catch (TypeError) {
    e['allDay'] = true
}
event_callback(e)
}

