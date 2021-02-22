$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


const countElement = document.getElementById('countdown');
const timerElement = document.getElementById('timer');
const scoreElement = document.getElementById('score');
const questionNumberElement = document.getElementById('question_number');
const questionElement = document.getElementById('question');
let defaultCountdownTime = 3;
let defaultGameTime = 60;
let score, questionNumber;
let time = defaultCountdownTime;
let gameTime = defaultGameTime;
let questionData = null;
let tempShowedQuestion = [];
let currentQuestionId;

$("#start_btn").click(clickStart);
$("#home_btn").click(backToHome);
$("#restart_btn").click(clickRestart);
$(".answer_buttons button").click(answerQuestion);

try {
    // Parse a JSON
    gameData = gameData.replaceAll('&quot;', '\"');
    questionData = Object.values(JSON.parse(gameData));
} catch (e) {
    // You can read e for more info
    // Let's assume the error is that we already have parsed the payload
    // So just return that
    questionData = Object.values(gameData);
}

function randomIntFromInterval(min, max) { // min and max included 
    return Math.floor(Math.random() * (max - min + 1) + min);
}

function getRandomIndex() {
    randomIndex = randomIntFromInterval(0, questionData.length - 1);
    if (tempShowedQuestion.indexOf(randomIndex == -1)) {
        tempShowedQuestion.push(randomIndex);
        return randomIndex;
    }
    return getRandomIndex();
}

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
        clearInterval(countInterval);
        gameStarted();
    }
}

function timer() {
    let minutes = Math.floor(gameTime / 60);
    let seconds = gameTime % 60;
    // minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;
    if (gameTime >= 0) {
        timerElement.innerHTML = `${minutes}:${seconds}`;
        gameTime = gameTime;
        gameTime--;
    } else if (gameTime < 0) {
        text = "";
        timerElement.innerHTML = `${text}`;
        clearInterval(timerInterval);
        gameFinished();
        gameTime = defaultGameTime;
    }
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
    score = 0;
    tempShowedQuestion = [];
}

function backToHome() {
    $(".postgame").removeClass("enabled");
    $(".pregame").removeClass("disabled");
}

function getSentiment(question) {
    //sentiment analysis model
}

function showQuestion() {
    currentQuestionId = getRandomIndex();
    questionNumberElement.innerHTML = `Question ${questionNumber}`;
    questionElement.innerHTML = questionData[currentQuestionId].question;
    // console.log(tempShowedQuestion);
}

function nextQuestion() {
    questionNumber++;
    showQuestion();
}

function answerQuestion() {
    if (this.id == "ans_positive") {
        value = "positive";
    } else if (this.id == "ans_neutral") {
        value = "neutral";
    } else if (this.id == "ans_negative") {
        value = "negative";
    }
    question_id = currentQuestionId;
    username = 'anonymous';
    $.ajax({
        url: '/answer',
        type: 'POST',
        data: {
            _token: CSRF_TOKEN,
            username: username,
            value: value,
            question_id: question_id,
        },
        success : function(response){
            console.log(response);
            console.log(response.username);
            console.log(response.value);
            console.log(response.question_id);
        }
    });
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
