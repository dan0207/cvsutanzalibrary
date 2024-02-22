// Import JavaScript Files ////////////////////////////////////////////////////////
import { getformatDate, getformatTime } from '../../js/main.js';
// Import JavaScript Files ////////////////////////////////////////////////////////

// DOM Elements

const active_date = document.getElementById("active_date");
const days_container = document.getElementById("days_container");
const event_month = document.getElementById("event_month");
const events_container = document.getElementById("events_container");
const prev_btn = document.getElementById("prev_btn");
const next_btn = document.getElementById("next_btn");
const today_btn = document.getElementById("today_btn");
const goto_btn = document.getElementById("goto_btn");
const goto_input = document.getElementById("goto_input");


let today = new Date();
let month = today.getMonth();
let year = today.getFullYear();

let activeDate;

const months = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
];


const eventsArr = [];

initCalendar();

function initCalendar() {
    const days_prevMonth = new Date(year, month, 0).getDate();
    const days_currentMonth = new Date(year, month + 1, 0).getDate();
    const nthDay_firstWeek = new Date(year, month, 1).getDay();
    const nthDay_lastWeek = 7 - new Date(year, month + 1, 0).getDay() - 1;


    active_date.innerHTML = `${months[month]} ${year}`;

    let days = "";

    for (let x = nthDay_firstWeek; x > 0; x--) {
        days += `<div class="day py-2 prev-month text-border">${days_prevMonth - x + 1}</div>`;
    }

    for (let i = 1; i <= days_currentMonth; i++) {
        let event = false;

        if (
            i === new Date().getDate() &&
            year === new Date().getFullYear() &&
            month === new Date().getMonth()
        ) {
            activeDate = new Date(year, month, i);
            getActiveMonth(month);
            updateEvents(i);
            days += `<div class="day py-2 text-bg-primary rounded-3 today active ${event ? 'event' : ''}">${i}</div>`;
        } else {
            days += `<div class="day py-2 text-primary ${event ? 'event' : ''}">${i}</div>`;
        }
    }

    for (let j = 1; j <= nthDay_lastWeek; j++) {
        days += `<div class="day py-2 next-month text-border">${j}</div>`;
    }

    days_container.innerHTML = days;
}

function getActiveMonth(month) {
    event_month.innerHTML = months[month];
}

async function getEvents() {
    try {
        const response = await fetch('../php_script/calendar_script.php');
        const data = await response.json();
        eventsArr.length = 0;
        eventsArr.push(...data);
    } catch (error) {
        console.error('Error:', error);
        throw error;
    }
}

function updateEvents() {
    getEvents().then(() => {
        const filteredEvents = eventsArr.filter(event => new Date(event.event_date).getMonth() === month);

        let eventsHTML = "";

        if (filteredEvents.length === 0) {
            eventsHTML = `<div class="no-event">
            <div class="fs-5 my-3">No Events</div>
        </div>`;
        } else {
            eventsHTML = filteredEvents
                .map(event => {
                    return `<div class="event pt-2 row m-0">
                            <div class="col-2">
                                <i class="fa-solid fa-calendar text-primary"></i>
                            </div>
                            <div class="col-10 mb-2">
                                <div class="title text-start d-flex align-items-center">
                                    <h6 class="event-title my-auto">${event.event_title}</h6>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="event-details text-start ps-3">
                                    <span class="event-date fs-7">${getformatDate(new Date(event.event_date))}</span>
                                    <span class="event-time fs-7 ms-1">${getformatTime(event.event_timeFrom)} to ${getformatTime(event.event_timeTo)}</span>
                                </div>
                            </div>
                        </div><hr>`;
                })
                .join('');
        }

        events_container.innerHTML = eventsHTML;
    }).catch(error => {
        console.error('Error fetching events:', error);
    });
}

prev_btn.addEventListener("click", prevMonth);
next_btn.addEventListener("click", nextMonth);


function prevMonth() {
    month--;
    if (month < 0) {
        month = 11;
        year--;
    }
    getActiveMonth(month);
    updateEvents()
    initCalendar();
}

function nextMonth() {
    month++;
    if (month > 11) {
        month = 0;
        year++;
    }
    getActiveMonth(month);
    updateEvents()
    initCalendar();
}


today_btn.addEventListener("click", () => {
    today = new Date();
    month = today.getMonth();
    year = today.getFullYear();
    initCalendar();
});


goto_input.addEventListener("input", (e) => {
    goto_input.value = goto_input.value.replace(/[^0-9/]/g, "");
    if (goto_input.value.length === 2) {
        goto_input.value += "/";
    }
    if (goto_input.value.length > 7) {
        goto_input.value = goto_input.value.slice(0, 7);
    }
});

goto_btn.addEventListener("click", function () {
    const dateArr = goto_input.value.split("/");
    if (dateArr.length === 2) {
        if (dateArr[0] > 0 && dateArr[0] < 13 && dateArr[1].length === 4) {
            month = dateArr[0] - 1;
            year = dateArr[1];
            initCalendar();
            return;
        }
    }
});