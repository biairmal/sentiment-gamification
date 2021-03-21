// HTML ELEMENT FOR INJECTION
const countElement = document.getElementById('countdown')
const timerElement = document.getElementById('timer')
const scoreElement = document.getElementById('score')
const questionNumberElement = document.getElementById('question_number')
const questionElement = document.getElementById('question')
const userLevelElement = document.getElementById('level')
const postgameTextElement = document.getElementById('postgame_text')

// GAME VARIABLES
const defaultCountdownTime = 3
const defaultGameTime = 60
let countdownTime, gameTime, score, questionNumber, lives // int
let gameOver // bool

// QUESTION GENERATOR VARIABLES
let questionData = null // array
let tempAnsweredQuestion, questionArray, questionDataAnswered, questionDataUnanswered // array
let questionThisLevelUnknown, questionThisLevelAbsolute, questionLowerLevelAbsolute, questionLowerLevelUnknown, questionForCalibration // array
let currentQuestionIndex // int
let noMoreQuestion // bool
const levelTopics = ["Cyber Bullying", "Tayangan TV", "Politik"]

// USER VARIABLES
let userEmail // string
let thisUser // object
let userInputValid // bool
let calibrationScore, userLevel // int

// X-CSRF TOKEN
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

$(document).ready(function () {
    // BUTTON ONCLICK FUNCTIONS
    $("#start_btn").click(clickStart)
    $("#restart_btn").click(clickRestart)
    $(".answer-buttons button").click(answerQuestion)
    $("#toggle_popup").click(togglePopupBox)
    // PARSING QUESTION AND USER DATA FROM DATABASE
    let user
    try {
        gameData = gameData.replaceAll(`&quot;`, '\"')
        userData = userData.replaceAll('&quot;', '\"')
        questionData = Object.values(JSON.parse(gameData))
        user = JSON.parse(userData)
    } catch (e) {
        questionData = Object.values(gameData)
        user = userData
        console.log(e)
    }
    userEmail = (user != null) ? user.email : "anonymous@gmail.com"
})

// GAME NAVIGATION
function togglePopupBox() {
    $(".popup-box").fadeToggle("popup-box")
}

function clickStart() {
    $(".pregame").addClass("disabled")
    $("#countdown").addClass("enabled")
    countInterval = setInterval(countdown, 1000)
}

function clickRestart() {
    $(".postgame").removeClass("enabled")
    clickStart()
}

// COUNTDOWN TIMER AND GAME TIMER
function countdown() {
    if (countdownTime > 0) {
        countElement.innerHTML = `${countdownTime}`
        countdownTime = countdownTime
        countdownTime--
    } else if (countdownTime <= 0) {
        text = "Go!"
        countElement.innerHTML = `${text}`
        countdownTime = defaultCountdownTime
        clearInterval(countInterval)
        gameStarted()
    }
}

function timer() {
    let minutes = Math.floor(gameTime / 60)
    let seconds = gameTime % 60
    // minutes = minutes < 10 ? '0' + minutes : minutes
    seconds = seconds < 10 ? '0' + seconds : seconds
    if (gameOver == true || noMoreQuestion == true) {
        gameTime = -1
    }
    if (gameTime >= 0) {
        timerElement.innerHTML = `${minutes}:${seconds}`
        gameTime = gameTime
        gameTime--
    } else if (gameTime < 0) {
        text = ""
        timerElement.innerHTML = `${text}`
        clearInterval(timerInterval)
        gameFinished()
        gameTime = defaultGameTime
    }
}

// ASSIGNING NEEDED VARIABLES
function assignVariables() {
    countElement.innerHTML = ""
    timerElement.innerHTML = ""
    postgameTextElement.innerHTML = "Horaaay selamat! Anda telah menyelesaikan game ini. Apakah ingin lanjut bermain?"
    countdownTime = defaultCountdownTime
    gameTime = defaultGameTime
    questionThisLevelUnknown = []
    questionThisLevelAbsolute = []
    tempAnsweredQuestion = []
    questionDataUnanswered = []
    questionDataAnswered = []
    questionLowerLevelAbsolute = []
    questionLowerLevelUnknown = []
    questionForCalibration = []
    score = 0
    questionNumber = 1
    lives = 3
    calibrationScore = 0
    userInputValid = false
    gameOver = false
    noMoreQuestion = false
}

// GAME STATE
function gameStarted() {
    fetchUserData()
    assignVariables()
    getUserLevel()
    getQuestionsForUser()
    timerInterval = setInterval(timer, 1000)
    setTimeout(function () {
        $("#countdown").removeClass("enabled")
        $(".game").addClass("enabled")
        userLevelElement.innerHTML = "Level " + userLevel + " : " + levelTopics[userLevel - 1]
        showQuestion()
    }, 1000)
}

function gameFinished() {
    if (gameOver == true) {
        postgameTextElement.innerHTML = "Game Over :( Nyawa anda habis karena salah saat menjawab soal kalibrasi yang dikeluarkan di waktu yang acak. Apakah ingin bermain lagi?"
    } else if (noMoreQuestion == true) {
        postgameTextElement.innerHTML = "Selamat, anda telah menyelesaikan semua soal untuk level ini dan level sebelumnya!"
    }
    $(".postgame").addClass("enabled")
    $(".game").removeClass("enabled")
    scoreElement.innerHTML = `${score}`
    if (userEmail != "anonymous@gmail.com") {
        updateUserLevel()
        console.log('masuk')
        if (score > 0) {
            storeUserScore()
        }
    }
    if (userInputValid == true && userEmail != "anonymous@gmail.com") {
        storeAnsweredQuestion()
    }
}

function getUserLevel() {
    userLevel = userEmail != "anonymous@gmail.com" ? thisUser.level : 1
}



// QUESTION GENERATOR
function showQuestion() {
    questionAbsolute = questionThisLevelAbsolute
    questionUnknown = questionThisLevelUnknown
    if (questionAbsolute.length == 0 && questionUnknown.length == 0) {
        userLevelElement.innerHTML = "Bonus Stage"
        questionAbsolute = questionLowerLevelAbsolute
        questionUnknown = questionLowerLevelUnknown
    }
    if (questionAbsolute.length != 0 || questionUnknown.length != 0) {
        if (questionNumber <= 5) {
            questionArray = questionForCalibration
        }
        else if (questionNumber % 2 == 1) {
            questionArray = (questionAbsolute.length > 0) ? questionAbsolute : questionUnknown
        } else if (questionNumber % 2 == 0) {
            questionArray = (questionUnknown.length > 0) ? questionUnknown : questionAbsolute
        }
        currentQuestionIndex = getRandomIndex(questionArray)
        questionNumberElement.innerHTML = `Question ${questionNumber}`
        questionElement.innerHTML = questionArray[currentQuestionIndex].question
    } else {
        return noMoreQuestion = true;
    }
    console.log('Level : ' + questionArray[currentQuestionIndex].level+', Type : '+questionArray[currentQuestionIndex].question_type)
}

function nextQuestion() {
    questionNumber++
    showQuestion()
}

function answerQuestion() {
    // getting value from clicked answer buttons
    if (this.id == "ans_positive") {
        value = "positif"
    } else if (this.id == "ans_negative") {
        value = "negatif"
    } else if (this.id == "ans_neutral") {
        value = "neutral"
    }
    question_id = questionArray[currentQuestionIndex].id
    if (questionNumber == 6) {
        checkCalibration()
        console.log('user input valid : '+userInputValid)
    }
    if (userInputValid == true) {
        storeUserInput(question_id, value)
    }
    if (tempAnsweredQuestion.includes(question_id) == false && questionNumber > 5) {
        tempAnsweredQuestion.push(question_id)
    }
    countScore(value, question_id)
    questionArray.splice(currentQuestionIndex, 1)
    nextQuestion()
}

function getRandomIndex(questionArray) {
    randomIndex = Math.floor(Math.random() * (questionArray.length))
    return randomIndex
}

function getQuestionsForUser() {
    for (let i = 0; i < questionData.length; i++) {
        if (tempAnsweredQuestion.includes(questionData[i].id) == false) {
            questionDataUnanswered.push(questionData[i])
        } else {
            questionDataAnswered.push(questionData[i])
        }
    }
    for (let i = 0; i < questionDataUnanswered.length; i++) {
        if (questionDataUnanswered[i].level == userLevel) {
            if (questionDataUnanswered[i].question_type == "absolute_answer") {
                questionThisLevelAbsolute.push(questionDataUnanswered[i])
            } else {
                questionThisLevelUnknown.push(questionDataUnanswered[i])
            }

        } else if (questionDataUnanswered[i].level < userLevel) {
            if (questionDataUnanswered[i].question_type == "absolute_answer") {
                questionLowerLevelAbsolute.push(questionDataUnanswered[i])
            } else {
                questionLowerLevelUnknown.push(questionDataUnanswered[i])
            }
        }
    }
    for (let i = 0; i < questionData.length; i++) {
        if (questionData[i].level == userLevel) {
            if (questionData[i].question_type == "absolute_answer") {
                questionForCalibration.push(questionData[i])
            }
        }
    }
    console.log('This level unknwon')
    console.log(questionThisLevelUnknown)
    console.log('This level absolute')
    console.log(questionThisLevelAbsolute)
    console.log('Lower level unknwon')
    console.log(questionLowerLevelUnknown)
    console.log('Lower level absolute')
    console.log(questionLowerLevelAbsolute)
    console.log('Calibration Question')
    console.log(questionForCalibration)
}

// to check if user answer the questions seriously
function checkCalibration() {
    userInputValid = calibrationScore > 2 ? true : false
}

// SCORING SYSTEM
function countLives() {
    if (questionNumber > 5 && (questionNumber - 5) % 4 == 0) {
        if (lives > 0) {
            lives--
        }
        if (lives == 0) {
            return gameOver = true
        }
    }
}

function countScore(value) {
    if (questionArray[currentQuestionIndex].question_type == "absolute_answer") {
        if (questionArray[currentQuestionIndex].correct_answer == value) {
            score += 10
            if (questionNumber <= 5) {
                calibrationScore += 1
            }
        } else {
            countLives()
        }
    } else {
        score += 5
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
            email: userEmail,
        },
        success: console.log('Your input has been stored')
    })
}

function storeUserScore() {
    $.ajax({
        url: '/submit-score',
        type: 'POST',
        data: {
            _token: CSRF_TOKEN,
            score: score,
            email: userEmail,
            total_answers: questionNumber,
        },
        success: console.log('Your score has been stored')
    })
}

function storeAnsweredQuestion() {
    $.ajax({
        url: '/submit-answered-questions',
        type: 'POST',
        data: {
            _token: CSRF_TOKEN,
            email: userEmail,
            answered_questions: JSON.stringify(tempAnsweredQuestion),
        },
        success: console.log("Answered questions have been stored.")
    })
}

function fetchUserData() {
    $.ajax({
        url: '/fetch-user',
        type: 'GET',
        data: {
            _token: CSRF_TOKEN,
            email: userEmail,
        },
        success: function (response) {
            if (response != []) {
                thisUser = response[0]
                if (thisUser != null) {
                    if (thisUser.answered_questions != null) {
                        tempAnsweredQuestion = JSON.parse(response[0].answered_questions)
                    } else {
                        tempAnsweredQuestion = []
                    }
                } else {
                    tempAnsweredQuestion = []
                }
            }
            console.log(tempAnsweredQuestion)
        }
    })
}

function updateUserLevel() {
    $.ajax({
        url: '/update-level',
        type: 'POST',
        data: {
            _token: CSRF_TOKEN,
            email: userEmail,
        },
        success: console.log("User level has been updated.")
    })
}
