
function initializeTimer() {
    var timeInMs = Date.now();

    var nextTimestamp = timeInMs + 600000;

    var curTimeUP = new Date();
    curTimeUP.setTime(nextTimestamp);

    var endDate = new Date(curTimeUP.getFullYear(), curTimeUP.getMonth(), curTimeUP.getDate(), curTimeUP.getHours(), curTimeUP.getMinutes(), curTimeUP.getSeconds());

    var currentDate = new Date();
    var seconds = (endDate - currentDate) / 1000;

    if (seconds > 0) {
        var minutes = seconds / 60;
        var hours = minutes / 60;

        minutes = (hours - Math.floor(hours)) * 60;
        hours = Math.floor(hours);
        seconds = Math.floor((minutes - Math.floor(minutes)) * 60);
        minutes = Math.floor(minutes);

        if (minutes.toString().length === 1) {
            minutes = '0' + minutes;
        }

        if (seconds.toString().length === 1) {
            seconds = '0' + seconds;
        }

        function secOut() {
            currentDate = new Date();

            seconds = (endDate - currentDate) / 1000;

            if (seconds <= 0) {
                showMessage(PayTimerId);
            }

            minutes = seconds / 60;
            hours = minutes / 60;

            minutes = (hours - Math.floor(hours)) * 60;
            hours = Math.floor(hours);
            seconds = Math.floor((minutes - Math.floor(minutes)) * 60);
            minutes = Math.floor(minutes);

            if (minutes.toString().length === 1) {
                minutes = '0' + minutes;
            }

            if (seconds.toString().length === 1) {
                seconds = '0' + seconds;
            }

            if (seconds == 0) {
                if (minutes == 0) {
                    if (hours == 0) {
                        showMessage(PayTimerId);
                    } else {
                        hours--;
                        minutes = 59;
                        seconds = 59;
                    }
                } else {
                    minutes--;
                    seconds = 59;
                }
            } else {
                seconds--;
            }

            if (minutes.toString().length === 1) {
                minutes = '0' + minutes;
            }

            if (seconds.toString().length === 1) {
                seconds = '0' + seconds;
            }

            setTimePage(minutes, seconds, PayTimerId);
        }
        PayTimerId = setInterval(secOut, 1000);
    } else {
        $('.apra-form-footer .resend-timer-block').fadeOut();
    }
}

function setTimePage(m, s, timerId) {
    var element = document.getElementById("resend-timer-block");
    if (!element) {
        clearInterval(timerId);
    } else {
        element.innerHTML = m + ":" + s;
    }

}

function showMessage(timerId) {
    $('.apra-form-footer .resend-timer-block').fadeOut();

    clearInterval(timerId);
}