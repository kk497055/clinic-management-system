$(document).ready(function() {

    // pass _token in all ajax
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // initialize calendar in all events
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "/",
        displayEventTime: true,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                    event.allDay = true;
            } else {
                    event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var event_name = prompt('Event Name:');
            if (event_name) {
                var start = $.fullCalendar.formatDate(start, "YYYY-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "YYYY-MM-DD HH:mm:ss");
                $.ajax({
                    url: "/operations/appointments/create-event",
                    data: {
                        title: event_name,
                        start: start,
                        end: end
                    },
                    type: 'post',
                    success: function (data) {
                       iziToast.success({
                            position: 'topRight',
                            message: 'Event created successfully.',
                        });

                        calendar.fullCalendar('renderEvent', {
                            id: data.id,
                            title: event_name,
                            start: start,
                            end: end,
                            allDay: allDay
                        }, true);
                        calendar.fullCalendar('unselect');
                    }
                });
            }
        },
        eventDrop: function (event, delta) {
            var start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "YYYY-MM-DD HH:mm:ss");

            $.ajax({
                url: "{{ route('appointments.edit') }}",
                data: {
                    title: event.event_name,
                    start: start,
                    end: end,
                    id: event.id,
                },
                type: "POST",
                success: function (response) {
                    iziToast.success({
                        position: 'topRight',
                        message: 'Event updated successfully.',
                    });
                }
            });
        },
        eventClick: function (event) {
            var eventDelete = confirm('Are you sure to remove event?');
            if (eventDelete) {
                $.ajax({
                    type: "post",
                    url: "{{ route('appointments.destroy') }}",
                    data: {
                        id: event.id,
                        _method: 'delete',
                    },
                    success: function (response) {
                        calendar.fullCalendar('removeEvents', event.id);
                        iziToast.success({
                            position: 'topRight',
                            message: 'Event removed successfully.',
                        });
                    }
                });
            }
        }   
    });
});