// const startingMinutes = 1;
// let time = startingMinutes*60;

// const countdownEl = document.getElementById('countdown');

// function startCountdown(){
//     setInterval(updateCountdown, 1000);
// }

// function updateCountdown(){
//     const minutes = Math.floor(time/60);
//     let seconds = time % 60;

//     seconds = seconds < 10 ? '0' +seconds : seconds;

// countdownEl.innerHTML= `${minutes}:${seconds}`;
//     time--;
//     time = time < 0 ? "" : time; 
// }
let countdownTimer = 3;
let time = countdownTimer;
var intervalVar;

function startGame() {

    $(document).ready(function () {
        $("#start-btn").click(function () {
            $(".pregame-box").addClass("disabled")
            $(".countdown").addClass("enabled")
            intervalVar = setInterval(countdownOnStart, 1000); 
        })
    })
}

function countdownOnStart() {

    const countdownEl = document.getElementById('countdown-timer');
    countdownEl.innerHTML = `${time}`;
    time--;
    time = time <= 0 ? "Go!" : time;
}
