let countdownTimer = 3;
let time = countdownTimer;

function startGame() {

    $(document).ready(function () {
        $("#start-btn").click(function () {
            $(".pregame-box").addClass("disabled");
            $(".countdown").addClass("enabled");
            setInterval(countdownOnStart, 1000);
            setTimeout(gameStarted, 4900);
        })
    })
}

function gameStarted(){
    $(".countdown").removeClass("enabled");
    $(".game-elements").addClass("enabled");
    
}

function countdownOnStart() {

    const countdownEl = document.getElementById('countdown-timer');
    countdownEl.innerHTML = `${time}`;
    time--;
    time = time <= 0 ? "Go!" : time;
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
