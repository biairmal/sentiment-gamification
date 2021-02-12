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
        <div id="timer"></div>
        <div id="question_number"></div>
        <div id="question"></div>
        <div class="answer_buttons">
            <button id="ans_positive" onclick=answerQuestion(this.id)>Positive</button>
            <button id="ans_neutral" onclick=answerQuestion(this.id)>Neutral</button>
            <button id="ans_negative" onclick=answerQuestion(this.id)>Negative</button>
        </div>
    </div>

    <div class="postgame">
        <div class="yscore">Your Score</div>
        <div id="score"></div>
        <div class="postgame_buttons">
            <button id="restart_btn">Play Again</button>
            <button id="home_btn">Back to Home</button>
        </div>
    </div>

    <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/questions.js') }}"></script>
</body>

</html>
