// ==== html element for injetion ====
const countElement = document.getElementById('countdown');
const timerElement = document.getElementById('timer');
const scoreElement = document.getElementById('score');
const questionNumberElement = document.getElementById('question_number');
const questionElement = document.getElementById('question');

// ==== game variables ====
const defaultCountdownTime = 3;
const defaultGameTime = 60;
let time = defaultCountdownTime;
let gameTime = defaultGameTime;
let score = 0
let questionNumber = 1;

// ==== question generator variables ====
let questionData = null;
let tempShowedQuestion = [];
let currentQuestionId;

// ==== button onclick function ====
$("#start_btn").click(clickStart);
$("#home_btn").click(backToHome);
$("#restart_btn").click(clickRestart);
$(".answer_buttons button").click(answerQuestion);

// ==== X-CSRF token ====
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// parsing question data from database
try {
    gameData = gameData.replaceAll('&quot;', '\"');
    questionData = Object.values(JSON.parse(gameData));
} catch (e) {
    questionData = Object.values(gameData);
    console.log(e);
}

// ==== game navigation ====
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

function backToHome() {
    $(".postgame").removeClass("enabled");
    $(".pregame").removeClass("disabled");
}

// ==== countdown before start and game timer ====
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

// ==== game state ====
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

// ==== question generator ====
function showQuestion() {
    currentQuestionId = getRandomIndex();
    questionNumberElement.innerHTML = `Question ${questionNumber}`;
    questionElement.innerHTML = questionData[currentQuestionId].question;
}

function nextQuestion() {
    questionNumber++;
    showQuestion();
}

function answerQuestion() {
    // getting value from clicked answer buttons
    if (this.id == "ans_positive") {
        value = "positive";
    } else if (this.id == "ans_neutral") {
        value = "neutral";
    } else if (this.id == "ans_negative") {
        value = "negative";
    }
    score +=1;
    question_id = currentQuestionId;
    // storeUserInput(question_id, value);
    countScore(value, question);
    nextQuestion();
}

function getRandomIndex() {
    // randomIndex = Math.floor(Math.random() * (max - min + 1) + min);
    // max index = questionData.length - 1; min index = 0
    randomIndex = Math.floor(Math.random() * (questionData.length));;
    if (tempShowedQuestion.indexOf(randomIndex == -1)) {
        tempShowedQuestion.push(randomIndex);
        return randomIndex;
    }
    return getRandomIndex();
}

// ==== scoring system ====
function countScore(value, question) {
    //place to count score
    correct_ans = getSentiment(question);
    if (value == correct_ans) {
        score++;
    }
}

function getSentiment(question) {
    //sentiment analysis model here
}

// ==== database ====
function storeUserInput(question_id, value) {
    username = 'anonymous';
    $.ajax({
        url: '/answer',
        type: 'POST',
        data: {
            _token: CSRF_TOKEN,
            question_id: question_id,
            value: value,
            username: username,
        },
        success: function (response) {
            console.log(response);
            console.log(response.username);
            console.log(response.value);
            console.log(response.question_id);
        }
    });
}
