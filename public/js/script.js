// HTML ELEMENT FOR INJECTION
const countElement = document.getElementById('countdown');
const timerElement = document.getElementById('timer');
const scoreElement = document.getElementById('score');
const questionNumberElement = document.getElementById('question_number');
const questionElement = document.getElementById('question');
const userLevelElement = document.getElementById('level');
const postgameTextElement = document.getElementById('postgame_text');

// GAME VARIABLES
const defaultCountdownTime = 0;
const defaultGameTime = 10;
let countdownTime, gameTime, score, questionNumber, gameOver, lives;

// QUESTION GENERATOR VARIABLES
let questionData = null;
let questionUnknown, questionAbsolute, tempAnsweredQuestion, questionArray, currentQuestionIndex, noMoreQuestionInThisLevel;
const levelTopics = ["Cyber Bullying", "Tayangan TV", "Politik"];

// USER VARIABLES
let user = null;
let userInfo, userInputValid, calibrationScore;
let userLevel = 1;

// X-CSRF TOKEN
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    // BUTTON ONCLICK FUNCTIONS
    $("#start_btn").click(clickStart);
    $("#restart_btn").click(clickRestart);
    $(".answer-buttons button").click(answerQuestion);
    $("#toggle_popup").click(togglePopupBox);
    // PARSING QUESTION AND USER DATA FROM DATABASE
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
});

function initiateVariables() {
    countElement.innerHTML = "";
    timerElement.innerHTML = "";
    postgameTextElement.innerHTML = "Horaaay selamat! Anda telah menyelesaikan game ini. Apakah ingin lanjut bermain?";
    countdownTime = defaultCountdownTime;
    gameTime = defaultGameTime;
    userInfo = (user != null) ? user.email : "anonymous@gmail.com";
    questionUnknown = [];
    questionAbsolute = [];
    tempAnsweredQuestion = [];
    score = 0;
    questionNumber = 1;
    lives = 3;
    calibrationScore = 0;
    userInputValid = false;
    gameOver = false;
    noMoreQuestionInThisLevel = false;
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
    } else if (gameOver == true || noMoreQuestionInThisLevel == true) {
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
    if (gameOver == true) {
        postgameTextElement.innerHTML = "Game Over :( Nyawa anda habis karena salah saat menjawab soal kalibrasi yang dikeluarkan di waktu yang acak. Apakah ingin bermain lagi?";
    } else if (noMoreQuestionInThisLevel == true) {
        postgameTextElement.innerHTML = "Soal telah habis, apakah anda ingin menyelesaikan soal yang ada di level sebelumnya?";
    }
    $(".postgame").addClass("enabled");
    $(".game").removeClass("enabled");
    scoreElement.innerHTML = `${score}`;
    fetchUserData();
    if (score > 0 && userInfo != "anonymous@gmail.com") {
        storeUserScore();
    }
    if (userInputValid == true && userInfo != "anonymous@gmail.com") {
        storeAnsweredQuestion();
    }
}

function getUserLevel() {
    userLevel = user != null ? user.level : 1;
}



// QUESTION GENERATOR
async function showQuestion() {
    if (questionAbsolute.length != 0 || questionUnknown.length != 0) {
        if (questionNumber <= 5 || questionNumber % 2 == 1) {
            questionArray = (questionAbsolute.length > 0) ? questionAbsolute : questionUnknown;
        } else if (questionNumber % 2 == 0) {
            questionArray = (questionUnknown.length > 0) ? questionUnknown : questionAbsolute;
        }
        console.log("lives : " + lives);
        currentQuestionIndex = await getRandomIndex(questionArray);
        questionNumberElement.innerHTML = `Question ${questionNumber}`;
        questionElement.innerHTML = questionArray[currentQuestionIndex].question;
    } else {
        console.log("Masuk")
        noMoreQuestionInThisLevel = true;
        gameFinished();
    }
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
        console.log("userInputValid : " + userInputValid);
    }
    if (userInputValid == true) {
        storeUserInput(question_id, value);
    }
    tempAnsweredQuestion.push(question_id);
    countScore(value, question_id);
    questionArray.splice(currentQuestionIndex, 1);
    nextQuestion();
}

function getRandomIndex(questionArray) {
    randomIndex = Math.floor(Math.random() * (questionArray.length));
    return randomIndex;
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
            total_answers: questionNumber,
        },
        success: function (response) {
            // console.log(response);
        }
    });
}

function storeAnsweredQuestion() {
    console.log(tempAnsweredQuestion);
    console.log(JSON.stringify(tempAnsweredQuestion));
    $.ajax({
        url: '/submit-answered-questions',
        type: 'POST',
        data: {
            _token: CSRF_TOKEN,
            email : userInfo,
            answered_questions: JSON.stringify(tempAnsweredQuestion),
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
            // console.log(response);
        }
    });
}
