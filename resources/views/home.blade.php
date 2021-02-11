<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />

    <!-- JQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


    <title>Gamification!</title>

</head>

<body>
    <div class="pregame">
        <div class="game_title">Sentiment Analysis Game!</div>
        <div class="game_about">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
        <div class="start_button"><button id="start_btn">Start Game</button></div>
    </div>

    <div id="countdown"></div>

    <div class="game">
        <div class="timer">
            <p id="timer_text"></p>
        </div>
        <div class="question_number">Question 1</div>
        <div class="question">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</div>
        <div class="answer_buttons">
            <button>Positive</button>
            <button>Neutral</button>
            <button>Negative</button>
        </div>
    </div>

    <div class="postgame">
        <div class="yscore">Your Score</div>
        <div class="score">30</div>
        <div class="postgame_buttons">
            <button class="start_btn" onclick="startGame()">Play Again</button>
            <button class="home_btn" onclick="backToHome()">Back to Home</button>
        </div>
    </div>

    <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</body>

</html>

<!-- 
    gameIsRunning = false
    onClick -> gameIsRunning = true
    gameIsRunning true -> timer starts, getKalimat, muncul button jawaban, question counter
    
 -->