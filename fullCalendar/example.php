<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.css' rel='stylesheet' />
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/
bootstrap.min.css'>
    <link href='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/moment.min.js'></script>
    <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/lib/jquery.min.js'></script>
    <script src='https://fullcalendar.io/releases/fullcalendar/3.9.0/fullcalendar.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min
.js'></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                defaultDate: '2018-03-12',
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: [
                    {
                        title: 'All Day Event',
                        start: '2018-03-01',
                        backgroundColor:'red'
                    },
                    {
                        title: 'Long Event',
                        start: '2018-03-07',
                        end: '2018-03-10',
                        backgroundColor:'green'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2018-03-09T16:00:00'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2018-03-16T16:00:00'
                    },
                    {
                        title: 'Conference',
                        start: '2018-03-11',
                        end: '2018-03-13'
                    },
                    {
                        title: 'Meeting',
                        start: '2018-03-12T10:30:00',
                        end: '2018-03-12T12:30:00'
                    },
                    {
                        title: 'Lunch',
                        start: '2018-03-12T12:00:00'
                    },
                    {
                        title: 'Meeting',
                        start: '2018-03-12T14:30:00'
                    },
                    {
                        title: 'Happy Hour',
                        start: '2018-03-12T17:30:00'
                    },
                    {
                        title: 'Dinner',
                        start: '2018-03-12T20:00:00'
                    },
                    {
                        title: 'Birthday Party',
                        start: '2018-03-13T07:00:00'
                    },
                    {
                        title: 'Click for Google',
                        url: 'http://google.com/',
                        start: '2018-03-28'
                    }
                ],
                eventClick: function(calEvent, jsEvent, view, resourceObj) {
                    swal({
                        title: calEvent.title,
                        text: "Start From : "+moment(calEvent.start).format("MMMM Do YYYY, h:mm a"),
                        icon: "success",
                    });
                }
            });
            $(".fc-right .fc-button-group").append(
                '<div class="input-group datetimepicker"><input type="text" class="form-control fc-datepicker" placeholder="YYYY-MM-DD" style="padding: 0;width: 0;border: none;margin: 0;"></div>');
            $(".fc-datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                showOn: "button",
                buttonText: '<span class="input-group-addon"><i class="fas fa-calendar-alt"></i></span>'
            });
        });
    </script>
    <title>Calendar Example</title>
</head>
<body>
    <div id="calendar"></div>
</body>
</html>