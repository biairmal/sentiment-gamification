let countdownTime;
let time;
let gameTime;
let timeLeft;

function startGame() {
    countdownTime = 3;
    time = countdownTime;
    gameTime = 10;
    timeLeft = gameTime;
    $(document).ready(function () {
        $(".start_btn").click(function () {
            $(".pregame").addClass("disabled");
            $(".countdown").addClass("enabled");
            setInterval(countdownOnStart, 1000);
            // setTimeout(gameStarted, 4900);
        })
    })
}


function gameStarted() {
    $(".countdown").removeClass("enabled");
    setInterval(gameTimer, 1000);
    setTimeout(function () {
        $(".game").addClass("enabled");
    }, 1000);
}

function gameFinished() {
    $(".game").removeClass("enabled");
    $(".postgame").addClass("enabled");
}

function countdownOnStart() {

    const countdownEl = document.getElementById('countdown_text');
    countdownEl.innerHTML = `${time}`;
    time--;
    time = time <= 0 ? "Go!" : time;
    if (time == "Go!") {
        setTimeout(gameStarted(), 2000);
        // gameStarted();
    }
}

function gameTimer() {
    const countdownEl = document.getElementById('timer_text');
    countdownEl.innerHTML = `${gameTime}`;
    gameTime--;
    gameTime = gameTime <= 0 ? "" : gameTime;
    if (gameTime == "") {
        gameFinished();
    }
}

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
