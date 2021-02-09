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

    <title>Gamification!</title>

</head>

<body>
    <div class="pregame-box">
        <h2>Sentiment Analysis Game!</h2>
        <p class="about">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <button type="button" class="btn btn-primary">Start Game</button>
    </div>

    <div class="footer">
        <button type="button" class="btn btn-outline-secondary">Music</button>
        <button type="button" class="btn btn-outline-secondary">How to Play</button>
    </div>

    <div class="game-elements">

        <p class="timer">01:00</p>

        <div class="game-box">
            <h3>Question 1</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class="pick-answer">
                <button type="button" class="btn btn-success">Positive</button>
                <button type="button" class="btn btn-light">Neutral</button>
                <button type="button" class="btn btn-danger">Negative</button>
            </div>
        </div>

    </div>

    <div class="postgame-elements">
        <p>Your Score</p>
        <p class="score">20</p>
        <button type="button" class="btn btn-primary">Start Again</button>
        <button type="button" class="btn btn-light">Back to Home</button>
    </div>


</body>

</html>

<!-- 
    gameIsRunning = false
    onClick -> gameIsRunning = true
    gameIsRunning true -> timer starts, getKalimat, muncul button jawaban, question counter
    
 -->