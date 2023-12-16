import { setupFormValidation, showModal, generateQRCode } from '../../js/main.js';

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
const addEventTitle = document.querySelector(".event-name");
const addEventFrom = document.querySelector(".event-time-from");
const addEventTo = document.querySelector(".event-time-to");

const addNewEventBtn = document.getElementById("add_new_event_btn");
const addNewEventModalBtn = document.getElementById("add_new_event_modal_btn");
const addNewEventForm = document.getElementById("add_new_event_form");
const addNewEventModal = document.getElementById('add_new_event_modal');

let today = new Date();
let activeDay;
let month = today.getMonth();
let year = today.getFullYear();

const months = [
    "January", "February", "March", "April", "May", "June", "July", "August",
    "September", "October", "November", "December"
];

const eventsArr = [];
getEvents();

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
        let event = eventsArr.some(eventObj =>
            eventObj.day === i && eventObj.month === month + 1 && eventObj.year === year);

        if (i === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
            activeDay = i;
            getActiveDay(i);
            updateEvents(i);
            days += `<div class="day today active${event ? ' event' : ''}">${i}</div>`;
        } else {
            days += `<div class="day${event ? ' event' : ''}">${i}</div>`;
        }
    }

    for (let j = 1; j <= nextDays; j++) {
        days += `<div class="day next-date">${j}</div>`;
    }

    daysContainer.innerHTML = days;
    addListener();
}

prev.addEventListener("click", () => changeMonth(-1));
next.addEventListener("click", () => changeMonth(1));

initCalendar();

function addListener() {
    const days = document.querySelectorAll(".day");
    days.forEach(day => {
        day.addEventListener("click", handleDayClick);
    });
}

function handleDayClick(e) {
    getActiveDay(e.target.innerHTML);
    updateEvents(Number(e.target.innerHTML));
    activeDay = Number(e.target.innerHTML);

    days.forEach(day => {
        day.classList.remove("active");
    });

    if (e.target.classList.contains("prev-date")) {
        changeMonth(-1);
        setTimeout(() => updateActiveDay(e.target.innerHTML), 100);
    } else if (e.target.classList.contains("next-date")) {
        changeMonth(1);
        setTimeout(() => updateActiveDay(e.target.innerHTML), 100);
    } else {
        e.target.classList.add("active");
    }
}

function updateActiveDay(day) {
    const days = document.querySelectorAll(".day");
    days.forEach(day => {
        if (!day.classList.contains("prev-date") && day.innerHTML === day) {
            day.classList.add("active");
        }
    });
}

todayBtn.addEventListener("click", () => resetToToday());

dateInput.addEventListener("input", handleDateInput);

gotoBtn.addEventListener("click", handleGotoBtnClick);

function handleDateInput(e) {
    dateInput.value = dateInput.value.replace(/[^0-9/]/g, "");
    if (dateInput.value.length === 2) {
        dateInput.value += "/";
    }
    if (dateInput.value.length > 7) {
        dateInput.value = dateInput.value.slice(0, 7);
    }
    if (e.inputType === "deleteContentBackward" && dateInput.value.length === 3) {
        dateInput.value = dateInput.value.slice(0, 2);
    }
}

function handleGotoBtnClick() {
    const dateArr = dateInput.value.split("/");
    if (dateArr.length === 2) {
        const [monthInput, yearInput] = dateArr;
        if (monthInput > 0 && monthInput < 13 && yearInput.length === 4) {
            month = monthInput - 1;
            year = yearInput;
            initCalendar();
            return;
        }
    }
    alert("Invalid Date");
}

function getActiveDay(date) {
    const day = new Date(year, month, date);
    const dayName = day.toString().split(" ")[0];
    eventDay.innerHTML = dayName;
    eventDate.innerHTML = `${date} ${months[month]} ${year}`;
}

function updateEvents(date) {
    let events = "";
    const selectedEvents = eventsArr.find(event =>
        date === event.day && month + 1 === event.month && year === event.year);

    if (selectedEvents) {
        selectedEvents.events.slice().reverse().forEach(event => {
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

    eventsContainer.innerHTML = events || `<div class="no-event"><h3>No Events</h3></div>`;
    saveEvents();
}

function changeMonth(change) {
    month += change;
    if (month < 0) {
        month = 11;
        year--;
    } else if (month > 11) {
        month = 0;
        year++;
    }
    initCalendar();
}

function resetToToday() {
    today = new Date();
    month = today.getMonth();
    year = today.getFullYear();
    initCalendar();
}

function handleAddNewEventBtnClick() {
    addNewEventForm.reset();
    addNewEventForm.classList.remove('was-validated');
    showModal(addNewEventModal.id);
}

function saveEvents() {
    localStorage.setItem("events", JSON.stringify(eventsArr));
}

function getEvents() {
    if (localStorage.getItem("events") !== null) {
        eventsArr.push(...JSON.parse(localStorage.getItem("events")));
    }
}

function handleAddNewEventBtnClick() {
    addNewEventForm.reset();
    addNewEventForm.classList.remove('was-validated');
    showModal(addNewEventModal.id);
}

function addNewEvent() {
    const eventTitle = addEventTitle.value;
    const eventTimeFrom = addEventFrom.value;
    const eventTimeTo = addEventTo.value;

    const timeFromArr = eventTimeFrom.split(":");
    const timeToArr = eventTimeTo.split(":");

    if (!isValidTimeFormat(timeFromArr) || !isValidTimeFormat(timeToArr)) {
        alert("Invalid time format");
        return;
    }

    const timeFrom = convertTime(eventTimeFrom);
    const timeTo = convertTime(eventTimeTo);

    if (isEventAlreadyAdded(eventTitle)) {
        alert("Event already added");
        return;
    }

    const newEvent = {
        title: eventTitle,
        time: `${timeFrom} - ${timeTo}`
    };

    let eventAdded = false;
    if (eventsArr.length > 0) {
        eventsArr.forEach(item => {
            if (item.day === activeDay && item.month === month + 1 && item.year === year) {
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

        // Fetch data
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
        .then(data => console.log('Response from PHP:', data))
        .catch(error => console.error('Error:', error));
    }

    updateEvents(activeDay);

    const activeDayEl = document.querySelector(".day.active");
    if (!activeDayEl.classList.contains("event")) {
        activeDayEl.classList.add("event");
    }

    showModal('', addNewEventModal.id);
    addNewEventForm.submit();
}

function handleDeleteEventClick(e) {
    if (e.target.classList.contains("event") && confirm("Are you sure you want to delete this event?")) {
        const eventTitle = e.target.children[0].children[1].innerHTML;
        eventsArr.forEach(event => {
            if (event.day === activeDay && event.month === month + 1 && event.year === year) {
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

function isValidTimeFormat(timeArray) {
    return (
        timeArray.length === 2 &&
        timeArray.every(part => !isNaN(part) && parseInt(part, 10) >= 0)
    );
}

function isEventAlreadyAdded(eventTitle) {
    let eventExist = false;
    eventsArr.forEach(event => {
        if (event.day === activeDay && event.month === month + 1 && event.year === year) {
            event.events.forEach(item => {
                if (item.title === eventTitle) {
                    eventExist = true;
                }
            });
        }
    });
    return eventExist;
}

function convertTime(time) {
    let timeArr = time.split(":");
    let timeHour = timeArr[0] % 12 || 12;
    let timeMin = timeArr[1];
    let timeFormat = timeArr[0] >= 12 ? "PM" : "AM";
    return `${timeHour}:${timeMin} ${timeFormat}`;
}

function setupForm() {
    setupFormValidation(addNewEventForm.id, addNewEventModalBtn.id, addNewEvent);
}

// Event listeners
addNewEventBtn.addEventListener("click", handleAddNewEventBtnClick);
eventsContainer.addEventListener("click", handleDeleteEventClick);

// Run setup functions
initCalendar();
setupForm();