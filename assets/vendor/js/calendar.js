// Import JavaScript Files ////////////////////////////////////////////////////////
import { setupFormValidation, showModal, generateQRCode } from '../../js/main.js';
// Import JavaScript Files ////////////////////////////////////////////////////////

// DOM Elements

const active_date = document.getElementById("active_date");
const days_container = document.getElementById("days_container");
const event_day = document.getElementById("event_day");
const event_date = document.getElementById("event_date");
const events_container = document.getElementById("events_container");
const prev_btn = document.getElementById("prev_btn");
const next_btn = document.getElementById("next_btn");
const today_btn = document.getElementById("today_btn");
const goto_btn = document.getElementById("goto_btn");
const goto_input = document.getElementById("goto_input");
const add_new_event_btn = document.getElementById("add_new_event_btn");
const add_new_event_form = document.getElementById("add_new_event_form");
const add_new_event_modal = document.getElementById('add_new_event_modal');
// const todayBtn = document.querySelector(".today-btn");
// const gotoBtn = document.querySelector(".goto-btn");
// const goto_input = document.querySelector(".date-input");
// const eventDate = document.querySelector(".event-date");
// const eventsContainer = document.querySelector(".events");
// const addEventTitle = document.querySelector(".event-name ");
// const addEventDate = document.querySelector(".event-time-from ");
// const addEventTime = document.querySelector(".event-time-to");

// const add_new_event_modal_btn = document.getElementById("add_new_event_modal_btn");


let today = new Date(); // Current Date
let month = today.getMonth(); // Current Month
let year = today.getFullYear(); // Current Year

let activeDate; // Active or Selected Date




const months = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
]; // Array of months


const eventsArr = []; // Array to store events

// getEvents();


// Initial calendar setup
initCalendar();

// Function to initialize the calendar
function initCalendar() {
    const days_prevMonth = new Date(year, month, 0).getDate(); // Get number of days in previous month
    const days_currentMonth = new Date(year, month + 1, 0).getDate(); // Get number of days in current month
    const nthDay_firstWeek = new Date(year, month, 1).getDay(); // Get the nth number days in a week of first day
    const nthDay_lastWeek = 7 - new Date(year, month + 1, 0).getDay() - 1; // Get the nth number days in a week of last day


    active_date.innerHTML = `${months[month]} ${year}`; // Display the Current Month and Year

    let days = ""; // Store days

    for (let x = nthDay_firstWeek; x > 0; x--) {
        days += `<div class="day py-2 prev-month text-border">${days_prevMonth - x + 1}</div>`; // Push date in days array
    }

    for (let i = 1; i <= days_currentMonth; i++) {
        let event = false;
        // eventsArr.forEach((eventObj) => {
        //     if (
        //         eventObj.day === i &&
        //         eventObj.month === month + 1 &&
        //         eventObj.year === year
        //     ) {
        //         event = true;
        //     }
        // });

        if (
            i === new Date().getDate() &&
            year === new Date().getFullYear() &&
            month === new Date().getMonth()
        ) {
            activeDate = new Date(year, month, i);
            getActiveMonth(month);
            updateEvents(i);
            days += `<div class="day py-2 text-bg-primary today active ${event ? 'event' : ''}">${i}</div>`;
        } else {
            days += `<div class="day py-2 text-primary ${event ? 'event' : ''}">${i}</div>`;
        }
    }

    for (let j = 1; j <= nthDay_lastWeek; j++) {
        days += `<div class="day py-2 next-month text-border">${j}</div>`;
    }

    days_container.innerHTML = days;
    // addListener(); // For Admin
}

// Function to get active day details and update UI
function getActiveMonth(month) {
    event_month.innerHTML = months[month];
}

// Function to update events when a day is active
function updateEvents() {
    let events = "";
    if (events === "") {
        events = `<div class="no-event">
            <div class="fs-5 my-3">No Events</div>
        </div>`;
    } else {
        eventsArr.forEach((event) => {
            events += `<div class="event">
                <div class="title">
                    <i class="fas fa-circle"></i>
                    <h3 class="event-title">${event.title}</h3>
                </div>
                <div class="event-time">
                    <span class="event-time">${event.date} - ${event.time}</span>
                </div>
            </div>`;
        });
    }

    events_container.innerHTML = events;
    // saveEvents();
}

// Event listeners for navigating to the previous and next month
prev_btn.addEventListener("click", prevMonth);
next_btn.addEventListener("click", nextMonth);


function prevMonth() {
    month--;
    if (month < 0) {
        month = 11;
        year--;
    }
    initCalendar();
}

function nextMonth() {
    month++;
    if (month > 11) {
        month = 0;
        year++;
    }
    initCalendar();
}


// Event listener for 'Today' button
today_btn.addEventListener("click", () => {
    today = new Date();
    month = today.getMonth();
    year = today.getFullYear();
    initCalendar();
});


// Event listener for date input
goto_input.addEventListener("input", (e) => {
    goto_input.value = goto_input.value.replace(/[^0-9/]/g, "");
    if (goto_input.value.length === 2) {
        goto_input.value += "/";
    }
    if (goto_input.value.length > 7) {
        goto_input.value = goto_input.value.slice(0, 7);
    }
});

// Event listener for 'Go To' button
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

// Event listener for 'Add New Event' button
// add_new_event_btn.addEventListener("click", function () { // For Admin
//     add_new_event_form.reset();
//     add_new_event_form.classList.remove('was-validated');
//     event_date.value = activeDate;
//     showModal(add_new_event_modal.id);
// });


// Function to add active class on day click
// function addListener() {
//     const days = document.querySelectorAll(".day");
//     days.forEach((day) => {
//         day.addEventListener("click", (e) => {
//             activeDay = Number(e.target.innerHTML);
//             days.forEach((day) => {
//                 day.classList.remove("active");
//             });

//             if (e.target.classList.contains("prev-month")) {
//                 // prevMonth();
//                 setTimeout(() => {
//                     const days = document.querySelectorAll(".day");
//                     days.forEach((day) => {
//                         if (
//                             !day.classList.contains("prev-month") &&
//                             day.innerHTML === e.target.innerHTML
//                         ) {
//                             day.classList.add("active");
//                         }
//                     });
//                 }, 100);
//             } else if (e.target.classList.contains("next-date")) {
//                 // nextMonth();
//                 setTimeout(() => {
//                     const days = document.querySelectorAll(".day");
//                     days.forEach((day) => {
//                         if (
//                             !day.classList.contains("next-date") &&
//                             day.innerHTML === e.target.innerHTML
//                         ) {
//                             day.classList.add("active");
//                         }
//                     });
//                 }, 100);
//             } else {
//                 e.target.classList.add("active");
//             }
//         });
//     });
// } // For Admin


// // Event listener for input in event title
// addEventTitle.addEventListener("input", (e) => {
//     addEventTitle.value = addEventTitle.value.slice(0, 60);
// });

// // Event listener for input in event time from
// addEventTime.addEventListener("input", (e) => {
//     addEventFrom.value = addEventFrom.value.replace(/[^0-9:]/g, "");
//     if (addEventFrom.value.length === 2) {
//         addEventFrom.value += ":";
//     }
//     if (addEventFrom.value.length > 5) {
//         addEventFrom.value = addEventFrom.value.slice(0, 5);
//     }
// });


// // Function to add a new event
// function addNewEvent() {
//     const eventTitle = addEventTitle.value;
//     const eventDate = addEventDate.value;  // Changed from addEventFrom to addEventDate
//     const eventTimeFrom = addEventTimeFrom.value;  // Changed from addEventFrom to addEventTimeFrom

//     // Check correct time format 24 hour
//     const timeFromArr = eventTimeFrom.split(":");

//     if (
//         timeFromArr.length !== 2 ||
//         timeFromArr[0] > 23 ||
//         timeFromArr[1] > 59
//     ) {
//         addEventTimeFrom.setCustomValidity('Invalid');
//     }

//     const timeFrom = convertTime(eventTimeFrom);

//     // Check if the event is already added
//     let eventExist = false;
//     eventsArr.forEach((event) => {
//         if (
//             event.date === eventDate &&
//             event.events.some(existingEvent => existingEvent.title === eventTitle)
//         ) {
//             eventExist = true;
//         }
//     });

//     if (eventExist) {
//         addEventTitle.setCustomValidity('Invalid');
//     }

//     const newEvent = {
//         title: eventTitle,
//         date: eventDate,
//         time: timeFrom,
//     };

//     // Sort events based on date in ascending order
//     eventsArr.push(newEvent);
//     eventsArr.sort((a, b) => new Date(a.date) - new Date(b.date));

//     updateEvents();
//     showModal('', add_new_event_modal.id);
//     add_new_event_form.submit();
// }





// // Event listener for clicking on an event to delete
// eventsContainer.addEventListener("click", (e) => {
//     if (e.target.classList.contains("event")) {
//         if (confirm("Are you sure you want to delete this event?")) {
//             const eventTitle = e.target.children[0].children[1].innerHTML;
//             eventsArr.forEach((event) => {
//                 if (
//                     event.month === month + 1 &&
//                     event.year === year
//                 ) {
//                     event.events.forEach((item, index) => {
//                         if (item.title === eventTitle) {
//                             event.events.splice(index, 1);
//                         }
//                     });

//                     if (event.events.length === 0) {
//                         eventsArr.splice(eventsArr.indexOf(event), 1);
//                         const activeDayEl = document.querySelector(".day.active");

//                         if (activeDayEl.classList.contains("event")) {
//                             activeDayEl.classList.remove("event");
//                         }
//                     }
//                 }
//             });

//             updateEvents(activeDay);
//             initCalendar();
//         }
//     }
// });

// // Function to save events in local storage
// function saveEvents() {
//     // localStorage.setItem("events", JSON.stringify(eventsArr));
// }
// // Function to get events from local storage
// function getEvents() {
//     if (localStorage.getItem("eventss") === null) {
//         return;
//     }

//     // localStorage.clear();
//     eventsArr.push(...JSON.parse(localStorage.getItem("events")));
// }

// // Function to convert time to 12-hour format
// function convertTime(time) {
//     let timeArr = time.split(":");
//     let timeHour = timeArr[0];
//     let timeMin = timeArr[1];
//     let timeFormat = timeHour >= 12 ? "PM" : "AM";
//     timeHour = timeHour % 12 || 12;
//     time = `${timeHour}:${timeMin} ${timeFormat}`;
//     return time;
// }

// // Setup form validation and event handling
// setupFormValidation(add_new_event_form.id, add_new_event_modal_btn.id, addNewEvent);

