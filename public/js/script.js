// HTML ELEMENT FOR INJECTION
const countElement = document.getElementById('countdown');
const timerElement = document.getElementById('timer');
const scoreElement = document.getElementById('score');
const questionNumberElement = document.getElementById('question_number');
const questionElement = document.getElementById('question');
const userLevelElement = document.getElementById('level');
const postgameTextElement = document.getElementById('postgame_text');

// GAME VARIABLES
const defaultCountdownTime = 3;
const defaultGameTime = 15;
let countdownTime, gameTime, score, questionNumber, gameOver, lives;

// QUESTION GENERATOR VARIABLES
let questionData = null;
let questionUnknown, questionAbsolute, tempShowedQuestion, questionArray, currentQuestionIndex;
const levelTopics = ["Cyber Bullying", "Tayangan TV", "Politik"];

// USER VARIABLES
let user = null;
let userInfo, userInputValid, calibrationScore;
let userLevel = 1;

// BUTTON ONCLICK FUNCTIONS
$(document).ready(function () {
    $("#start_btn").click(clickStart);
    $("#restart_btn").click(clickRestart);
    $(".answer-buttons button").click(answerQuestion);
    $("#toggle_popup").click(togglePopupBox);
});

// X-CSRF TOKEN
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// console.log(gameData);
// parsing question data from database
try {
    gameData = gameData.replaceAll(`&quot;`, '\"');
    userData = userData.replaceAll('&quot;', '\"');
    questionData = Object.values(JSON.parse(gameData));
    user = JSON.parse(userData);
} catch (e) {
    questionData = Object.values(gameData);
    user = userData;
    console.log(e);
}

function initiateVariables() {
    countElement.innerHTML = "";
    timerElement.innerHTML = "";
    postgameTextElement.innerHTML = "Horaaay selamat! Anda telah menyelesaikan game ini. Apakah ingin lanjut bermain?";
    countdownTime = defaultCountdownTime;
    gameTime = defaultGameTime;
    score = 0;
    questionNumber = 1;
    questionUnknown = [];
    questionAbsolute = [];
    tempShowedQuestion = [];
    userInputValid = false;
    lives = 3;
    gameOver = false;
    calibrationScore = 0;
    userInfo = (user != null) ? user.email : "anonymous@gmail.com";
    // console.log(userInfo)
}

function togglePopupBox() {
    $(".popup-box").fadeToggle("popup-box");
}
// ==== game navigation ====
function clickStart() {
    initiateVariables();
    $(".pregame").addClass("disabled");
    $("#countdown").addClass("enabled");
    countInterval = setInterval(countdown, 1000);
}

function clickRestart() {
    $(".postgame").removeClass("enabled");
    clickStart();
}

function backToHome() {
    $(".postgame").removeClass("enabled");
    $(".pregame").removeClass("disabled");
}

// COUNTDOWN TIMER AND GAME TIMER
function countdown() {
    if (countdownTime > 0) {
        countElement.innerHTML = `${countdownTime}`;
        countdownTime = countdownTime;
        countdownTime--;
    } else if (countdownTime <= 0) {
        text = "Go!";
        countElement.innerHTML = `${text}`;
        countdownTime = defaultCountdownTime;
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
    } else if (gameOver == true) {
        gameTime = 0;
    }
}

// GAME STATE
function gameStarted() {
    getUserLevel();
    getQuestionsBasedOnLevel();
    timerInterval = setInterval(timer, 1000);
    setTimeout(function () {
        $("#countdown").removeClass("enabled");
        $(".game").addClass("enabled");
        userLevelElement.innerHTML = "Level " + userLevel + " : " + levelTopics[userLevel - 1];
        showQuestion();
    }, 1000);
}

function gameFinished() {
    if (gameOver) {
        postgameTextElement.innerHTML = "Game Over :( Nyawa anda habis karena salah saat menjawab soal kalibrasi yang dikeluarkan di waktu yang acak. Apakah ingin bermain lagi?";
    }
    $(".postgame").addClass("enabled");
    $(".game").removeClass("enabled");
    scoreElement.innerHTML = `${score}`;
    fetchUserData();
    if (score > 0 && userInfo != "anonymous@gmail.com") {
        storeUserScore();
    }
}

function getUserLevel() {
    userLevel = user != null ? user.level : 1;
}



// QUESTION GENERATOR
async function showQuestion() {
    if (questionNumber <= 5 || questionNumber % 2 == 1) {
        questionArray = questionAbsolute;
    } else if (questionNumber % 2 == 0) {
        questionArray = questionUnknown;
    }
    console.log("lives : " + lives);
    currentQuestionIndex = await getRandomIndex(questionArray);
    questionNumberElement.innerHTML = `Question ${questionNumber}`;
    questionElement.innerHTML = questionArray[currentQuestionIndex].question;
}

function nextQuestion() {
    questionNumber++;
    showQuestion();
}

function answerQuestion() {
    // getting value from clicked answer buttons
    if (this.id == "ans_positive") {
        value = "positif";
    } else if (this.id == "ans_negative") {
        value = "negatif";
    } else if (this.id == "ans_neutral") {
        value = "neutral"
    }
    question_id = questionArray[currentQuestionIndex].id;
    if (questionNumber == 6) {
        checkCalibration();
        // console.log("userInputValid : " + userInputValid);
    }
    if (userInputValid == true) {
        storeUserInput(question_id, value);
    }
    // questionArray.splice(currentQuestionIndex,1);
    // console.log(questionAbsolute.length);
    // console.log(questionUnknown.length);
    countScore(value, question_id);
    nextQuestion();
}

function getRandomIndex(questionArray) {
    // randomIndex = Math.floor(Math.random() * (max - min + 1) + min);
    // max index = questionData.length - 1; min index = 0
    randomIndex = Math.floor(Math.random() * (questionArray.length));
    if (tempShowedQuestion.indexOf(randomIndex == -1)) {
        tempShowedQuestion.push(randomIndex);
        return randomIndex;
    }
    return getRandomIndex();
}

function getQuestionsBasedOnLevel() {
    for (let i = 0; i < questionData.length; i++) {
        if (questionData[i].level == userLevel) {
            if (questionData[i].question_type == "absolute_answer") {
                questionAbsolute.push(questionData[i]);
            } else {
                questionUnknown.push(questionData[i]);
            }
        }
    }
    // console.log(questionUnknown.length);
    // console.log(questionAbsolute.length);
}

// to check if user answer the questions seriously
function checkCalibration() {
    userInputValid = calibrationScore > 2 ? true : false;
}

// SCORING SYSTEM
function countLives() {
    if (questionNumber > 5 && (questionNumber - 5) % 4 == 0) {
        if (lives > 0) {
            lives--;
        }
        if (lives == 0) {
            gameOver = true;
            gameFinished();
        }
    }
}

function countScore(value) {
    if (questionArray[currentQuestionIndex].question_type == "absolute_answer") {
        if (questionArray[currentQuestionIndex].correct_answer == value) {
            score += 10;
            if (questionNumber <= 5) {
                calibrationScore += 1;
            }
        } else {
            countLives();
        }
    } else {
        score += 5;
    }
}

// DATABASE
function storeUserInput(question_id, value) {
    $.ajax({
        url: '/answer',
        type: 'POST',
        data: {
            _token: CSRF_TOKEN,
            question_id: question_id,
            value: value,
            username: userInfo,
        },
        success: function (response) {
            // console.log(response);
        }
    });
}

function storeUserScore() {
    $.ajax({
        url: '/submit-score',
        type: 'POST',
        data: {
            _token: CSRF_TOKEN,
            score: score,
            username: userInfo,
        },
        success: function (response) {
            // console.log(response);
        }
    });
}

function fetchUserData() {
    $.ajax({
        url: '/fetch-user',
        type: 'GET',
        data: {
            _token: CSRF_TOKEN,
            email: userInfo,
        },
        success: function (response) {
            console.log(response);
        }
    });
}
