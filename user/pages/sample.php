<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Date Range Picker</title>
    <style>
        .well {
            margin-top: 20px;
        }

        h1 {
            margin-top: 0;
            font-size: 22px;
        }

        .date-range {
            margin: auto;
            text-align: center;
        }

        .date-range>div {
            display: inline-block;
            margin: 10px;
        }

        p {
            text-align: right;
            margin-bottom: 0;
        }

        .is-sample {
            background-color: #007205;
            color: white;
        }

        .is-selected {
            background-color: #286090;
            color: white;
        }

        .is-selected:hover {
            background-color: #204d74 !important;
        }

        .is-between {
            border-radius: 0 !important;
            background-color: #5599d4;
            color: white;
        }

        .is-between:hover {
            background-color: #204d74 !important;
        }

        .checkin-picker .active,
        .checkout-picker .is-selected {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .checkout-picker .active,
        .checkin-picker .is-selected {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .disabled {
            color: #d8d8d8 !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="well">
            <h1>Select your booking dates:</h1>
            <div class="date-range">
                <div class="checkin-picker"></div>
                <div class="checkout-picker"></div>
            </div>
            <p>
                <a class="btn btn-success" href="#" role="button">
                    Search availabilities from <span id="display-checkin"></span>
                    to <span id="display-checkout"></span>
                </a>
            </p>
        </div>
    </div>


    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            var checkin_date, checkin_div, checkin_dp,
                checkout_date, checkout_div, checkout_dp;

            var reserve_start = new Date('2024-01-1');
            var reserve_end = new Date('2024-01-3');
            console.log(reserve_start);
            console.log(reserve_end);

            function update() {
                if (checkin_date !== undefined) {
                    $('#display-checkin').text(checkin_date.toLocaleDateString());
                }
                if (checkout_date !== undefined) {
                    $('#display-checkout').html(checkout_date.toLocaleDateString());
                }
            }

            // create checkin datepicker
            checkin_div = $('.checkin-picker').datepicker({
                autoclose: false,
                beforeShowDay: function(date) {
                    if (reserve_start !== undefined && reserve_end !== undefined) {

                        if (date >= reserve_start && date <= reserve_end) {
                            if (date == reserve_start) {
                                return {
                                    classes: 'disabled',
                                };
                            } else if (date == reserve_end) {
                                return {
                                    classes: 'pickup',
                                };
                            }
                            return{
                                classes: 'text-bg-primary',
                            };
                        }
                    }
                    if (checkout_date !== undefined) {
                        // disabled date selection for day after checkout date
                        if (date > checkout_date || date < new Date(checkout_date.getTime() - 7 * 24 * 60 * 60 * 1000)) {
                            return {
                                classes: 'disabled',
                                tooltip: 'Unavailable',
                            };
                        }
                        // display checkout date in checkin datepicker
                        if (date.getDate() === checkout_date.getDate() &&
                            date.getMonth() === checkout_date.getMonth() &&
                            date.getFullYear() === checkout_date.getFullYear()) {
                            return {
                                classes: 'is-selected'
                            };
                        }
                    }
                    // display range dates in checkin datepicker
                    if (checkin_date !== undefined && checkout_date !== undefined) {
                        if (date > checkin_date && date < checkout_date) {
                            return {
                                classes: 'is-between'
                            };
                        }
                    }
                    // display checkin date
                    if (checkin_date !== undefined) {
                        if (date.getDate() === checkin_date.getDate() &&
                            date.getMonth() === checkin_date.getMonth() &&
                            date.getFullYear() === checkin_date.getFullYear()) {
                            return {
                                classes: 'active'
                            };
                        }
                    }
                    return true;
                }
            });

            // save checkin datepicker for later
            checkin_dp = checkin_div.data('datepicker');

            // update datepickers on checkin date change
            checkin_div.on('changeDate', (event) => {
                // save checkin date
                checkin_date = event.date;
                // update checkout datepicker so range dates are displayed
                checkout_dp.update();
                checkin_dp.update();
                update();
            });

            // create checkout datepicker
            checkout_div = $('.checkout-picker').datepicker({
                autoclose: false,
                beforeShowDay: function(date) {
                    if (checkin_date !== undefined) {

                        // disabled date selection for unnessesary date
                        if (checkin_date !== undefined) {
                            if (date < checkin_date || date > new Date(checkin_date.getTime() + 7 * 24 * 60 * 60 * 1000)) {
                                return {
                                    classes: 'disabled',
                                    tooltip: 'Unavailable',
                                };
                            }
                        }

                        // display checkin date in checkout datepicker
                        if (date.getDate() === checkin_date.getDate() &&
                            date.getMonth() === checkin_date.getMonth() &&
                            date.getFullYear() === checkin_date.getFullYear()) {
                            return {
                                classes: 'is-selected'
                            };
                            // return false;
                        }
                    }
                    // display range dates in checkout datepicker
                    if (checkin_date !== undefined && checkout_date !== undefined) {
                        if (date > checkin_date && date < checkout_date) {
                            return {
                                classes: 'is-between'
                            };
                        }
                    }
                    // display checkout date
                    if (checkout_date !== undefined) {
                        if (date.getDate() === checkout_date.getDate() &&
                            date.getMonth() === checkout_date.getMonth() &&
                            date.getFullYear() === checkout_date.getFullYear()) {
                            return {
                                classes: 'active'
                            };
                        }
                    }
                    return true;
                }
            });

            // save checkout datepicker for later
            checkout_dp = checkout_div.data('datepicker');

            // update datepickers on checkout date change
            checkout_div.on('changeDate', (event) => {
                // save checkout date
                checkout_date = event.date;
                // update checkin datepicker so range dates are displayed
                checkin_dp.update();
                checkout_dp.update();
                update();
            });

        });
    </script>
</body>

</html>