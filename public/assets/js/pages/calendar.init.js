var start_date = document.getElementById("event-start-date"),
  timepicker1 = document.getElementById("timepicker1"),
  timepicker2 = document.getElementById("timepicker2"),
  date_range = null,
  T_check = null;

function flatPickrInit() {
  var options = { enableTime: true, noCalendar: true };

  flatpickr(start_date, {
    enableTime: false,
    mode: "range",
    minDate: "today",
    onChange: function (selectedDates, dateStr, instance) {
      if (selectedDates.length > 1) {
        document.getElementById("event-time").setAttribute("hidden", true);
      } else {
        document.getElementById("timepicker1").parentNode.classList.remove("d-none");
        document.getElementById("timepicker1").classList.replace("d-none", "d-block");
        document.getElementById("timepicker2").parentNode.classList.remove("d-none");
        document.getElementById("timepicker2").classList.replace("d-none", "d-block");
        document.getElementById("event-time").removeAttribute("hidden");
      }
    },
  });

  flatpickr(timepicker1, options);
  flatpickr(timepicker2, options);
}

function flatpicekrValueClear() {
  start_date.flatpickr().clear();
  timepicker1.flatpickr().clear();
  timepicker2.flatpickr().clear();
}

function eventClicked() {
  document.getElementById("form-event").classList.add("view-event");
  document.getElementById("event-title").classList.replace("d-block", "d-none");
  // other elements' visibility changes...
  document.getElementById("btn-save-event").setAttribute("hidden", true);
}

function editEvent(element) {
  var eventId = element.getAttribute("data-id");

  if (eventId === "new-event") {
    document.getElementById("modal-title").innerHTML = "Add Event";
    document.getElementById("btn-save-event").innerHTML = "Add Event";
    eventTyped();
  } else if (eventId === "edit-event") {
    element.innerHTML = "Cancel";
    element.setAttribute("data-id", "cancel-event");
    document.getElementById("btn-save-event").innerHTML = "Update Event";
    element.removeAttribute("hidden");
    eventTyped();
  } else {
    element.innerHTML = "Edit";
    element.setAttribute("data-id", "edit-event");
    eventClicked();
  }
}

function eventTyped() {
  // code for handling event type
  document.getElementById("form-event").classList.remove("view-event");
  // other elements' visibility changes...
  document.getElementById("btn-save-event").removeAttribute("hidden");
}

function upcomingEvent(events) {
  events.sort(function (a, b) {
    return new Date(a.start) - new Date(b.start);
  });

  document.getElementById("upcoming-event-list").innerHTML = null;

  events.forEach(function (event) {
    // code for rendering upcoming events
    var u_event = "<div class='card mb-3'> ... </div>";
    document.getElementById("upcoming-event-list").innerHTML += u_event;
  });
}

function getTime(date) {
  if (date != null && date.getHours != null) {
    return date.getHours() + ":" + (date.getMinutes() ? date.getMinutes() : 0);
  }
}

function tConvert(time) {
  var timeArray = time.split(":");
  var hours = timeArray[0];
  var minutes = timeArray[1];
  var period = 12 <= hours ? "PM" : "AM";
  hours = (hours %= 12) || 12;
  return (
    (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + " " + period
  );
}

document.addEventListener("DOMContentLoaded", function () {
  flatPickrInit();
  var modal = new bootstrap.Modal(document.getElementById("event-modal"), { keyboard: false });
  var modalTitle = document.getElementById("modal-title");
  var formEvent = document.getElementById("form-event");
  // other variable declarations...

  var choices = new Choices("#event-category", { searchEnabled: false });
  var calendarEvents = [
    // array of events...
  ];
  var calendarElement = document.getElementById("calendar");

  var calendar = new FullCalendar.Calendar(calendarElement, {
    // FullCalendar configuration...
  });

  calendar.render();
  upcomingEvent(calendarEvents);

  formEvent.addEventListener("submit", function (event) {
    event.preventDefault();
    // code for form submission...
  });

  document.getElementById("btn-delete-event").addEventListener("click", function (event) {
    if (v) {
      // code for deleting event...
      upcomingEvent(y);
      v.remove();
      v = null;
      modal.hide();
    }
  });

  document.getElementById("btn-new-event").addEventListener("click", function (event) {
    flatpicekrValueClear();
    flatPickrInit();
    // code for new event...
    document.getElementById("edit-event-btn").setAttribute("data-id", "new-event");
    document.getElementById("edit-event-btn").click();
    document.getElementById("edit-event-btn").setAttribute("hidden", true);
  });
});

var str_dt = function (date) {
  var dateObj = new Date(date);
  var month = "" + ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"][dateObj.getMonth()];
  var day = "" + dateObj.getDate();
  var year = dateObj.getFullYear();

  if (month.length < 2) {
    month = "0" + month;
  }

  return [day.length < 2 ? "0" + day : day, " " + month, year].join(",");
};
