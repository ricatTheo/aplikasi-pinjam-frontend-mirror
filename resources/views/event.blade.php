<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>Time Table</title>
</head>
<body>

    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Reserve</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <label for="title" class="form-label">Description</label>
            <input type="text" class="form-control" id="title">

            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="text" id="selectedDate" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Start Time</label>
                <input type="text" id="startHour" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">End Time</label>
                <input type="text" id="endHour" class="form-control">
            </div>

            <div>
                <span id="titleError" class="text-danger fs-4"></span>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="saveBtn" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Update</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <label for="updateTitle" class="form-label">Description</label>
            <input type="text" class="form-control" id="updateTitle">

            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="text" id="updateSelectedDate" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Start Time</label>
                <input type="text" id="updateStartHour" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">End Time</label>
                <input type="text" id="updateEndHour" class="form-control">
            </div>

            <div>
                <span id="updateTitleError" class="text-danger fs-4"></span>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" id="delBtn" class="btn btn-danger">Delete</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="updateSaveBtn" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 mt-3">
                <div id='calendar'></div>
            </div>
        </div>
    </div>

    <script>
        const destroyBaseUrl = "{{ url('calDestroy') }}";
    </script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.17/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var event = @json($event);
        const currentYear = new Date().getFullYear();

        startHourPicker = flatpickr("#startHour", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            minTime: "06:00",
            maxTime: "21:00",
            minuteIncrement: 30,
        });

        endHourPicker = flatpickr("#endHour", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            minTime: "06:00",
            maxTime: "21:00",
            minuteIncrement: 30,
        });

        updateSelectedDatePicker = flatpickr("#updateSelectedDate", {
            dateFormat: "d-m-Y",
            minDate: "today",
            maxDate: new Date(currentYear, 11, 31),
            enable: [
                function(date) {
                    return (date.getDay() !== 0 && date.getDay() !== 6);
                }
            ],
        });

        updateStartHourPicker = flatpickr("#updateStartHour", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            minTime: "06:00",
            maxTime: "21:00",
            minuteIncrement: 30,
        });

        updateEndHourPicker = flatpickr("#updateEndHour", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            minTime: "06:00",
            maxTime: "21:00",
            minuteIncrement: 30,
        });

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            allDaySlot: false,
            themeSystem: 'bootstrap5',
            slotMinTime: "06:00:00",
            slotMaxTime: "21:01:00",
            events: event,
            selectable: true,
            selectLongPressDelay: 100,
            height: 'auto',
            hiddenDays: [0, 6],

            select: function(info){
                document.getElementById('title').value = '';
                var modal = new bootstrap.Modal(document.getElementById('bookingModal'));
                modal.show();

                const start_date = moment(info.start).format('YYYY-MM-DD');
                const end_date = moment(info.end).format('YYYY-MM-DD');
                const selectedDate = moment(info.start).format('DD-MM-YYYY');
                const saveBtn = document.getElementById('saveBtn');
                const startTime = moment(info.start).format('HH:mm');
                const endTime = moment(info.end).format('HH:mm');

                document.getElementById('selectedDate').value = selectedDate;
                startHourPicker.setDate(startTime, true);
                endHourPicker.setDate(endTime, true);

                saveBtn.onclick = function() {
                    const title = document.getElementById('title').value;
                    const selectedDate = document.getElementById('selectedDate').value;
                    const [day, month, year] = selectedDate.split('-');
                    const formattedDate = `${year}-${month}-${day}`;
                    const startHour = document.getElementById('startHour').value;
                    const endHour = document.getElementById('endHour').value;

                    const errorElement = document.getElementById('titleError');
                    errorElement.innerText = '';

                    if (!title.trim()) {
                        errorElement.innerText = "Description cannot be empty.";
                        return;
                    }

                    if (endHour <= startHour) {
                        errorElement.innerText = "End time must be after start time.";
                        return;
                    }

                    const start_date = `${formattedDate} ${startHour}:00`;
                    const end_date = `${formattedDate} ${endHour}:00`;

                    fetch("{{ route('calendar.store') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ title, start_date, end_date })
                    })
                    .then(response => {
                        if (!response.ok) throw response;
                        return response.json();
                    })
                    .then(data => {
                        console.log(data);
                        calendar.addEvent({
                            title: data.title,
                            start: data.start_date,
                            end: data.end_date
                        });
                        location.reload();
                        modal.hide();
                    })
                    .catch(async error => {
                        if (error.json) {
                            const err = await error.json();
                            if (err.errors && err.errors.title) {
                                document.getElementById('titleError').innerText = err.errors.title[0];
                            }
                        } else {
                            document.getElementById('titleError').innerText = "Unexpected Error.";
                            console.error("Full error:", error);
                        }
                    });
                };
            },

            eventClick: function(info) {
                const id = info.event.id;
                document.getElementById('updateTitle').value = info.event.title;
                var updateModal = new bootstrap.Modal(document.getElementById('updateModal'));
                updateModal.show();

                const start_date = moment(info.start).format('YYYY-MM-DD');
                const end_date = moment(info.end).format('YYYY-MM-DD');
                const selectedDate = moment(info.start).format('DD-MM-YYYY');

                const eventDate = new Date(info.event.start);
                eventDate.setHours(0, 0, 0, 0);
                const today = new Date();
                today.setHours(0, 0, 0, 0);

                if (eventDate < today) {
                    alert("You cannot update past events.");
                    return;
                }

                document.getElementById('updateSelectedDate').value = moment(info.event.start).format('DD-MM-YYYY');
                updateSelectedDatePicker.setDate(info.event.start, true);
                updateStartHourPicker.setDate(moment(info.event.start).format('HH:mm'), true);
                updateEndHourPicker.setDate(moment(info.event.end).format('HH:mm'), true);

                const updateSaveBtn = document.getElementById('updateSaveBtn');
                const delBtn = document.getElementById('delBtn');

                updateSaveBtn.onclick = function() {
                    const title = document.getElementById('updateTitle').value;
                    const [day, month, year] = document.getElementById('updateSelectedDate').value.split('-');
                    const formattedDate = `${year}-${month}-${day}`;
                    const updateStartHour = document.getElementById('updateStartHour').value;
                    const updateEndHour = document.getElementById('updateEndHour').value;
                    // const start_date = `${formattedDate} ${document.getElementById('updateStartHour').value}:00`;
                    // const end_date = `${formattedDate} ${document.getElementById('updateEndHour').value}:00`;

                    const errorElement = document.getElementById('updateTitleError');
                    errorElement.innerText = '';

                    if (!title.trim()) {
                        errorElement.innerText = "Description cannot be empty.";
                        return;
                    }

                    if (updateEndHour <= updateStartHour) {
                        errorElement.innerText = "End time must be after start time.";
                        return;
                    }

                    const start_date = `${formattedDate} ${updateStartHour}:00`;
                    const end_date = `${formattedDate} ${updateEndHour}:00`;

                    fetch(`/calUpdate/${id}`, {
                        method: "PUT",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ title, start_date, end_date })
                    })
                    .then(response => {
                        if (!response.ok) throw response;
                        return response.json();
                    })
                    .then(data => {
                        info.event.setProp('title', data.title);
                        info.event.setStart(data.start_date);
                        info.event.setEnd(data.end_date);
                        location.reload();
                        updateModal.hide();
                    })
                    .catch(async error => {
                        if (error.json) {
                            const err = await error.json();
                            if (err.errors && err.errors.title) {
                                document.getElementById('updateTitleError').innerText = err.errors.title[0];
                            }
                        } else {
                            document.getElementById('updateTitleError').innerText = "Unexpected Error.";
                            console.error("Full error:", error);
                        }
                    });
                };

                delBtn.onclick = function(){
                    fetch(`${destroyBaseUrl}/${id}`, {
                        method: "DELETE",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(async response => {
                        if (!response.ok) {
                            const errorText = await response.text();
                            throw new Error(errorText || 'Failed to delete event.');
                        }

                        return response.json();
                    })
                    .then(data => {
                        info.event.remove();
                        location.reload();
                        console.log("Event deleted:", data);
                    })
                    .catch(error => {
                        console.error("Error deleting event:", error);
                        console.error("Full error:", error);
                    });
                };
            },

            selectAllow: function(selectInfo) {
                const today = new Date();
                today.setHours(0, 0, 0, 0);
                const start = selectInfo.start;
                const end = new Date(selectInfo.end.getTime() - 1000);

                if (start < today) return false;

                const startHour = start.getHours();
                const endHour = end.getHours();
                const endMinute = end.getMinutes();

                if (startHour >= 21) return false;

                if (endHour > 21 || (endHour === 21 && endMinute > 0)) return false;

                return start.toDateString() === end.toDateString();
            },

            headerToolbar: {
                start: 'today',
                center: 'title',
                end: 'prev,next',
            },
        });

        calendar.render();

        document.getElementById('bookingModal').addEventListener('hide.bs.modal', function () {
            if (document.activeElement && document.getElementById('bookingModal').contains(document.activeElement)) {
                document.activeElement.blur();
            }
        });

        document.getElementById('bookingModal').addEventListener('hidden.bs.modal', function () {
            document.getElementById('titleError').innerText = '';
        });

        document.getElementById('updateModal').addEventListener('hidden.bs.modal', function () {
            document.getElementById('updateTitleError').innerText = '';

        });

        document.getElementById('updateModal').addEventListener('hide.bs.modal', function () {
            if (document.activeElement && document.getElementById('updateModal').contains(document.activeElement)) {
                document.activeElement.blur();
            }
        });

      });

    </script>

</body>
</html>
