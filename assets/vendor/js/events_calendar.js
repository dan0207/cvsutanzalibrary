// Import JavaScript Files ////////////////////////////////////////////////////////
import { setupFormValidation, showModal, generateQRCode } from '../../js/main.js';
// Import JavaScript Files ////////////////////////////////////////////////////////

// DOM Elements
const date = document.querySelector(".date");
const daysContainer = document.querySelector(".days");
const prev = document.querySelector(".prev");
const next = document.querySelector(".next");
const todayBtn = document.querySelector(".today-btn");
const gotoBtn = document.querySelector(".goto-btn");
const dateInput = document.querySelector(".date-input");
const eventDay = document.querySelector(".event-day");
const eventDate = document.querySelector(".event-date");
const eventsContainer = document.querySelector(".events");
const addEventTitle = document.querySelector(".event-name ");
const addEventFrom = document.querySelector(".event-time-from ");
const addEventTo = document.querySelector(".event-time-to");

const add_new_event_btn = document.getElementById("add_new_event_btn");
const add_new_event_modal_btn = document.getElementById("add_new_event_modal_btn");
const add_new_event_form = document.getElementById("add_new_event_form");

const add_new_event_modal = document.getElementById('add_new_event_modal');

// Date variables
let today = new Date();
let activeDay;
let month = today.getMonth();
let year = today.getFullYear();

// Array of months
const months = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
];

// Array to store events
const eventsArr = [];
getEvents();

// Function to initialize the calendar
function initCalendar() {
    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);
    const prevLastDay = new Date(year, month, 0);
    const prevDays = prevLastDay.getDate();
    const lastDate = lastDay.getDate();
    const day = firstDay.getDay();
    const nextDays = 7 - lastDay.getDay() - 1;

    date.innerHTML = `${months[month]} ${year}`;

    let days = "";

    for (let x = day; x > 0; x--) {
        days += `<div class="day prev-date">${prevDays - x + 1}</div>`;
    }

    for (let i = 1; i <= lastDate; i++) {
        let event = false;
        eventsArr.forEach((eventObj) => {
            if (
                eventObj.day === i &&
                eventObj.month === month + 1 &&
                eventObj.year === year
            ) {
                event = true;
            }
        });

        if (
            i === new Date().getDate() &&
            year === new Date().getFullYear() &&
            month === new Date().getMonth()
        ) {
            activeDay = i;
            getActiveDay(i);
            updateEvents(i);
            days += `<div class="day today active ${event ? 'event' : ''}">${i}</div>`;
        } else {
            days += `<div class="day ${event ? 'event' : ''}">${i}</div>`;
        }
    }

    for (let j = 1; j <= nextDays; j++) {
        days += `<div class="day next-date">${j}</div>`;
    }

    daysContainer.innerHTML = days;
    addListener();
}

// Event listeners for navigating to the previous and next month
prev.addEventListener("click", function () {
    month--;
    if (month < 0) {
        month = 11;
        year--;
    }
    initCalendar();
});

next.addEventListener("click", function () {
    month++;
    if (month > 11) {
        month = 0;
        year++;
    }
    initCalendar();
});

// Initial calendar setup
initCalendar();

// Function to add active class on day click
function addListener() {
    const days = document.querySelectorAll(".day");
    days.forEach((day) => {
        day.addEventListener("click", (e) => {
            getActiveDay(e.target.innerHTML);
            updateEvents(Number(e.target.innerHTML));
            activeDay = Number(e.target.innerHTML);
            days.forEach((day) => {
                day.classList.remove("active");
            });

            if (e.target.classList.contains("prev-date")) {
                prevMonth();
                setTimeout(() => {
                    const days = document.querySelectorAll(".day");
                    days.forEach((day) => {
                        if (
                            !day.classList.contains("prev-date") &&
                            day.innerHTML === e.target.innerHTML
                        ) {
                            day.classList.add("active");
                        }
                    });
                }, 100);
            } else if (e.target.classList.contains("next-date")) {
                nextMonth();
                setTimeout(() => {
                    const days = document.querySelectorAll(".day");
                    days.forEach((day) => {
                        if (
                            !day.classList.contains("next-date") &&
                            day.innerHTML === e.target.innerHTML
                        ) {
                            day.classList.add("active");
                        }
                    });
                }, 100);
            } else {
                e.target.classList.add("active");
            }
        });
    });
}

// Event listener for 'Today' button
todayBtn.addEventListener("click", () => {
    today = new Date();
    month = today.getMonth();
    year = today.getFullYear();
    initCalendar();
});

// Event listener for date input
dateInput.addEventListener("input", (e) => {
    dateInput.value = dateInput.value.replace(/[^0-9/]/g, "");
    if (dateInput.value.length === 2) {
        dateInput.value += "/";
    }
    if (dateInput.value.length > 7) {
        dateInput.value = dateInput.value.slice(0, 7);
    }
    if (e.inputType === "deleteContentBackward") {
        if (dateInput.value.length === 3) {
            dateInput.value = dateInput.value.slice(0, 2);
        }
    }
});

// Event listener for 'Go To' button
gotoBtn.addEventListener("click", function () {
    const dateArr = dateInput.value.split("/");
    if (dateArr.length === 2) {
        if (dateArr[0] > 0 && dateArr[0] < 13 && dateArr[1].length === 4) {
            month = dateArr[0] - 1;
            year = dateArr[1];
            initCalendar();
            return;
        }
    }
    alert("Invalid Date");
});

// Function to get active day details and update UI
function getActiveDay(date) {
    const day = new Date(year, month, date);
    const dayName = day.toString().split(" ")[0];
    eventDay.innerHTML = dayName;
    eventDate.innerHTML = `${date} ${months[month]} ${year}`;
}

// Function to update events when a day is active
function updateEvents(date) {
    let events = "";
    eventsArr.forEach((event) => {
        if (
            date === event.day &&
            month + 1 === event.month &&
            year === event.year
        ) {
            event.events.slice().reverse().forEach((event) => {
                events += `<div class="event">
                    <div class="title">
                        <i class="fas fa-circle"></i>
                        <h3 class="event-title">${event.title}</h3>
                    </div>
                    <div class="event-time">
                        <span class="event-time">${event.time}</span>
                    </div>
                </div>`;
            });
        }
    });

    if (events === "") {
        events = `<div class="no-event">
            <h3>No Events</h3>
        </div>`;
    }

    eventsContainer.innerHTML = events;
    saveEvents();
}

// Event listener for input in event title
addEventTitle.addEventListener("input", (e) => {
    addEventTitle.value = addEventTitle.value.slice(0, 60);
});

// Event listener for input in event time from
addEventFrom.addEventListener("input", (e) => {
    addEventFrom.value = addEventFrom.value.replace(/[^0-9:]/g, "");
    if (addEventFrom.value.length === 2) {
        addEventFrom.value += ":";
    }
    if (addEventFrom.value.length > 5) {
        addEventFrom.value = addEventFrom.value.slice(0, 5);
    }
});

// Event listener for input in event time to
addEventTo.addEventListener("input", (e) => {
    addEventTo.value = addEventTo.value.replace(/[^0-9:]/g, "");
    if (addEventTo.value.length === 2) {
        addEventTo.value += ":";
    }
    if (addEventTo.value.length > 5) {
        addEventTo.value = addEventTo.value.slice(0, 5);
    }
});

// Function to add a new event
function addNewEvent() {
    const eventTitle = addEventTitle.value;
    const eventTimeFrom = addEventFrom.value;
    const eventTimeTo = addEventTo.value;

    // Check correct time format 24 hour
    const timeFromArr = eventTimeFrom.split(":");
    const timeToArr = eventTimeTo.split(":");

    if (
        timeFromArr.length !== 2 ||
        timeToArr.length !== 2 ||
        timeFromArr[0] > 23 ||
        timeFromArr[1] > 59 ||
        timeToArr[0] > 23 ||
        timeToArr[1] > 59
    ) {
        eventTimeFrom.setCustomValidity('Invalid');
        eventTimeTo.setCustomValidity('Invalid');
    }

    const timeFrom = convertTime(eventTimeFrom);
    const timeTo = convertTime(eventTimeTo);

    // Check if the event is already added
    let eventExist = false;
    eventsArr.forEach((event) => {
        if (
            event.day === activeDay &&
            event.month === month + 1 &&
            event.year === year
        ) {
            event.events.forEach((event) => {
                if (event.title === eventTitle) {
                    eventExist = true;
                }
            });
        }
    });

    if (eventExist) {
        eventTitle.setCustomValidity('Invalid');
    }

    const newEvent = {
        title: eventTitle,
        time: `${timeFrom} - ${timeTo}`,
    };

    let eventAdded = false;

    if (eventsArr.length > 0) {
        eventsArr.forEach((item) => {
            if (
                item.day === activeDay &&
                item.month === month + 1 &&
                item.year === year
            ) {
                item.events.push(newEvent);
                eventAdded = true;
            }
        });
    }

    if (!eventAdded) {
        eventsArr.push({
            day: activeDay,
            month: month + 1,
            year: year,
            events: [newEvent],
        });

        fetch('../../../php_script/events_calendar_script.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                day: activeDay,
                month: month + 1,
                year: year,
                title: eventTitle,
                timeFrom: eventTimeFrom,
                timeTo: eventTimeTo
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Response from PHP:', data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    updateEvents(activeDay);

    const activeDayEl = document.querySelector(".day.active");
    
    if (!activeDayEl.classList.contains("event")) {
        activeDayEl.classList.add("event");
    }

    showModal('', add_new_event_modal.id);
    add_new_event_form.submit();
};

// Event listener for clicking on an event to delete
eventsContainer.addEventListener("click", (e) => {
    if (e.target.classList.contains("event")) {
        if (confirm("Are you sure you want to delete this event?")) {
            const eventTitle = e.target.children[0].children[1].innerHTML;
            eventsArr.forEach((event) => {
                if (
                    event.day === activeDay &&
                    event.month === month + 1 &&
                    event.year === year
                ) {
                    event.events.forEach((item, index) => {
                        if (item.title === eventTitle) {
                            event.events.splice(index, 1);
                        }
                    });

                    if (event.events.length === 0) {
                        eventsArr.splice(eventsArr.indexOf(event), 1);
                        const activeDayEl = document.querySelector(".day.active");
                        
                        if (activeDayEl.classList.contains("event")) {
                            activeDayEl.classList.remove("event");
                        }
                    }
                }
            });

            updateEvents(activeDay);
        }
    }
});

// Function to save events in local storage
function saveEvents() {
    localStorage.setItem("events", JSON.stringify(eventsArr));
}

// Function to get events from local storage
function getEvents() {
    if (localStorage.getItem("events") === null) {
        return;
    }

    eventsArr.push(...JSON.parse(localStorage.getItem("events")));
}

// Function to convert time to 12-hour format
function convertTime(time) {
    let timeArr = time.split(":");
    let timeHour = timeArr[0];
    let timeMin = timeArr[1];
    let timeFormat = timeHour >= 12 ? "PM" : "AM";
    timeHour = timeHour % 12 || 12;
    time = `${timeHour}:${timeMin} ${timeFormat}`;
    return time;
}

// Setup form validation and event handling
setupFormValidation(add_new_event_form.id, add_new_event_modal_btn.id, addNewEvent);

// Event listener for 'Add New Event' button
add_new_event_btn.addEventListener("click", function () {
    add_new_event_form.reset();
    add_new_event_form.classList.remove('was-validated');
    showModal(add_new_event_modal.id);
});
