// ==== html element for injetion ====
const countElement = document.getElementById('countdown');
const timerElement = document.getElementById('timer');
const scoreElement = document.getElementById('score');
const questionNumberElement = document.getElementById('question_number');
const questionElement = document.getElementById('question');
const userLevelElement = document.getElementById('level');

// ==== game variables ====
const defaultCountdownTime = 0;
const defaultGameTime = 60s;
let time = defaultCountdownTime;
let gameTime = defaultGameTime;
let score = 0
let questionNumber = 1;

// ==== question generator variables ====
let questionData = null;
let questionBasedOnLevel = [];
let questionForCalibration = [];
let tempShowedQuestion = [];
let questionArray;
let currentQuestionIndex;
const levelTopics = ["Cyber Bullying", "Tayangan TV", "Politik"];

// ==== user variables ====
let user = null;
let userInfo;
let userLevel = 1;
let userInputValid = false;
let calibrationScore = 0;

// ==== button onclick function ====
$("#start_btn").click(clickStart);
$("#restart_btn").click(clickRestart);
$(".answer-buttons button").click(answerQuestion);
$("#toggle_popup").click(togglePopupBox);

// ==== X-CSRF token ====
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


// parsing question data from database
try {
    gameData = gameData.replaceAll('&quot;', '\"');
    userData = userData.replaceAll('&quot;', '\"');
    questionData = Object.values(JSON.parse(gameData));
    user = JSON.parse(userData);
} catch (e) {
    questionData = Object.values(gameData);
    user = userData;
    console.log(e);
}



function togglePopupBox() {
    $(".popup-box").fadeToggle("popup-box");
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
    userInfo = (user != null) ? user.email : "anonymous@gmail.com";
    score = 0;
    console.log(userInfo)
    questionNumber = 1;
    timerInterval = setInterval(timer, 1000);
    setTimeout(function () {
        $("#countdown").removeClass("enabled");
        $(".game").addClass("enabled");
        getUserLevel();
        getQuestionsBasedOnLevel();
        userLevelElement.innerHTML = "Level "+userLevel+" : "+levelTopics[userLevel-1];
        showQuestion();
    }, 1000);
}

function gameFinished() {
    $(".postgame").addClass("enabled");
    $(".game").removeClass("enabled");
    scoreElement.innerHTML = `${score}`;
    if (score > 0) {
        storeUserScore();
    }
    score = 0;
    calibrationScore = 0;
    tempShowedQuestion = [];
    questionBasedOnLevel = [];
}

function getUserLevel() {
    if (user != null) {
        userLevel = user.level;
    } else {
        userLevel = 1;
    }
    // console.log(userLevel);
}



// ==== question generator ====
async function showQuestion() {
    if (questionNumber <= 5) {
        questionArray = questionForCalibration;
    } else {
        questionArray = questionBasedOnLevel;
    }
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
        console.log("userInputValid : " + userInputValid);
    }
    if (userInputValid == true) {
        console.log("input valid");
        storeUserInput(question_id, value);
    }
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
                questionForCalibration.push(questionData[i]);
            } else {
                questionBasedOnLevel.push(questionData[i]);
            }
        }
    }
    console.log(questionBasedOnLevel);
    console.log(questionForCalibration);
}

// to check if user answer the questions seriously
function checkCalibration() {
    if (calibrationScore > 2) {
        userInputValid = true;
    } else {
        userInputValid = false;
    }
}

// ==== scoring system ====
function countScore(value, question_id) {
    // count score with sentiment analysis model
    // correct_ans = getSentiment(question);
    // if (value == correct_ans) {
    //     score++;
    // }

    // count score without sentiment analysis model
    if (questionArray[currentQuestionIndex].question_type == "absolute_answer") {
        if (questionArray[currentQuestionIndex].correct_answer == value) {
            score += 10;
            if (questionNumber <= 5) {
                calibrationScore += 1;
            }
        }
    } else {
        score += 5;
    }
}

function getSentiment(question) {
    //sentiment analysis model here
}

// ==== database ====
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
            console.log(response);
            console.log(response.username);
            console.log(response.value);
            console.log(response.question_id);
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
            console.log(response);
        }
    });
}
