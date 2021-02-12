const countElement = document.getElementById('countdown');
const timerElement = document.getElementById('timer');
const scoreElement = document.getElementById('score');
const questionNumberElement = document.getElementById('question_number');
const questionElement = document.getElementById('question');
let defaultCountdownTime = 3;
let defaultGameTime = 10;
let score, questionNumber;
let time = defaultCountdownTime;
let gameTime = defaultGameTime;

$("#start_btn").click(clickStart);
$("#home_btn").click(backToHome);
$("#restart_btn").click(clickRestart);
// $(".answer_buttons").click(answerQuestion);

function clickStart() {
    $(document).ready(function () {
        countElement.innerHTML = "";
        timerElement.innerHTML = "";
        $(".pregame").addClass("disabled");
        $("#countdown").addClass("enabled");
        countInterval = setInterval(countdown, 1000);
    });
}

function clickRestart() {
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
    score = 0;
    questionNumber = 1;
    timerInterval = setInterval(timer, 1000);
    setTimeout(function () {
        $("#countdown").removeClass("enabled");
        $(".game").addClass("enabled");
        showQuestion();
    }, 1000);
}

function gameFinished() {
    $(".postgame").addClass("enabled");
    $(".game").removeClass("enabled");
    scoreElement.innerHTML = `${score}`;
}

function backToHome() {
    $(".postgame").removeClass("enabled");
    $(".pregame").removeClass("disabled");
}

function getSentiment(question) {
    //sentiment analysis model
}

function showQuestion() {
    questionNumberElement.innerHTML = `Question ${questionNumber}`;
    questionElement.innerHTML = questionsList[questionNumber];
}

function nextQuestion() {
    questionNumber++;
    showQuestion();
}

function answerQuestion(clicked_id) {

    if (clicked_id == "ans_positive") {
        value = "positive";
    } else if (clicked_id == "ans_neutral") {
        value = "neutral";
    } else if (clicked_id == "ans_negative") {
        value = "negative";
    }
    // alert(value);
    countScore(value, question);
    nextQuestion();

}

function countScore(value, question) {
    //place to count score
    correct_ans = getSentiment(question);
    if (value == correct_ans) {
        score++;
    }
}
