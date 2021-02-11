const countElement = document.getElementById('countdown');
const timerElement = document.getElementById('timer');
let defaultCountdownTime = 3;
let defaultGameTime = 5;
let time = defaultCountdownTime;
let gameTime = defaultGameTime;

$("#start_btn").click(clickStart);
$("#home_btn").click(backToHome);
$("#restart_btn").click(clickRestart);

function clickStart() {
    $(document).ready(function () {
        countElement.innerHTML = "";
        timerElement.innerHTML = "";
        $(".pregame").addClass("disabled");
        $("#countdown").addClass("enabled");
        countInterval = setInterval(countdown, 1000);
    });
}

function clickRestart(){
    $(".postgame").removeClass("enabled");
    clickStart();
}

function countdown() {
    if (time > 0) {
        countElement.innerHTML = `${time}`;
        time = time;
        time--;
    } else if (time <= 0) {
        text = "Go!";
        countElement.innerHTML = `${text}`;
        time = defaultCountdownTime;
        stopCountdown();
    }
}

function stopCountdown() {
    clearInterval(countInterval);
    gameStarted()
}

function timer() {
    if (gameTime >= 0) {
        timerElement.innerHTML = `${gameTime}`;
        gameTime = gameTime;
        gameTime--;
    } else if (gameTime < 0) {
        text = "";
        timerElement.innerHTML = `${text}`;
        stopTimer();
        gameTime = defaultGameTime;
    }
}

function stopTimer() {
    clearInterval(timerInterval);
    gameFinished();
}

function gameStarted() {
    timerInterval = setInterval(timer, 1000);
    setTimeout(function () {
        $("#countdown").removeClass("enabled");
        $(".game").addClass("enabled");
    }, 1000);
}

function gameFinished() {
    $(".postgame").addClass("enabled");
    $(".game").removeClass("enabled");
}

function backToHome() {
    $(".postgame").removeClass("enabled");
    $(".pregame").removeClass("disabled");
}





// let countdownTime;
// let time;
// let gameTime;
// let timeLeft;

// function startGame() {
//     countdownTime = 4;
//     time = countdownTime;
//     gameTime = 10;
//     timeLeft = gameTime;
//     $(document).ready(function () {
//         $(".start_btn").click(function () {
//             $(".pregame").addClass("disabled");
//             $(".countdown").addClass("enabled");

//             // setTimeout(gameStarted, 4900);
//         })
//     })
//     setInterval(countdownOnStart, 1000);
// }

// function gameStarted() {
//     $(".countdown").removeClass("enabled");
//     setInterval(gameTimer, 1000);
//     setTimeout(function () {
//         $(".game").addClass("enabled");
//     }, 1000);
// }

// function gameFinished() {
//     $(".game").removeClass("enabled");
//     $(".postgame").addClass("enabled");
// }

// function backToHome() {
//     $(document).ready(function () {
//         $(".home_btn").click(function () {
//             $(".postgame").removeClass("enabled");
//             $(".pregame").removeClass("disabled");
//         })
//     })
// }

// function countdownOnStart() {

//     const countdownEl = document.getElementById('countdown_text');
//     countdownEl.innerHTML = `${time}`;
//     time--;
//     time = time <= 0 ? "Go!" : time;
//     // if (time == "Go!") {
//     //     gameStarted();
//     //     // gameStarted();
//     // }
// }

// function gameTimer() {
//     const countdownEl = document.getElementById('timer_text');
//     countdownEl.innerHTML = `${gameTime}`;
//     gameTime--;
//     gameTime = gameTime <= 0 ? "" : gameTime;
//     if (gameTime == "") {
//         gameFinished();
//     }

// Kodingan jalan
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
