<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div><h5 class="mb-0 text-uppercase text-info text-gradient">CITAS PROGRAMADAS</h5></div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2 px-4 py-4">
                    <div class="">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            initialDate: '2025-09-07',
            headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [
            {
                title: 'All Day Event',
                start: '2025-09-01'
            },
            {
                title: 'Long Event',
                start: '2025-09-07',
                end: '2025-09-10'
            },
            {
                groupId: '999',
                title: 'Repeating Event',
                start: '2025-09-09T16:00:00'
            },
            {
                groupId: '999',
                title: 'Repeating Event',
                start: '2025-09-16T16:00:00'
            },
            {
                title: 'Conference',
                start: '2025-09-11',
                end: '2025-09-13'
            },
            {
                title: 'Meeting',
                start: '2025-09-12T10:30:00',
                end: '2025-09-12T12:30:00'
            },
            {
                title: 'Lunch',
                start: '2025-09-12T12:00:00'
            },
            {
                title: 'Meeting',
                start: '2025-09-12T14:30:00'
            },
            {
                title: 'Birthday Party',
                start: '2025-09-13T07:00:00'
            },
            {
                title: 'Click for Google',
                url: 'https://google.com/',
                start: '2025-09-28'
            }
            ]
        });

        calendar.render();
        });
    </script>

