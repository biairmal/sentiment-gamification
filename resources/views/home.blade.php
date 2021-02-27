<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1", >
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />

    <!-- JQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
    <title>Gamification!</title>
</head>

<body>

    <!-- HOME / PRE GAME-->
    <div class="pregame">
        <div class="game_title">Sentiment Analysis Game!</div>
        <div class="game_about">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
        <div class="start_button"><button id="start_btn" class="btn btn-primary">Start Game</button></div>
    </div>

    <!-- COUNTDOWN BEFORE THE GAME -->
    <div id="countdown"></div>
    <div class="flex items-center justify-end mt-4">
                <a href="{{ url('authorized/google') }}">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
                </a>
            </div>
    <!-- GAME STARTED  -->
    <div class="game">
        <div id="timer"></div>
        <div id="question_number"></div>
        <div id="question"></div>
        <div class="answer_buttons">
            <button id="ans_positive"  class="btn btn-success">Positive</button>
            <button id="ans_negative"  class="btn btn-danger">Negative</button>
        </div>
    </div>

    <!-- POST GAME -->
    <div class="postgame">
        <div class="yscore">Your Score</div>
        <div id="score"></div>
        <div class="postgame_buttons">
            <button id="restart_btn" class="btn btn-primary">Play Again</button>
            <button id="home_btn" class="btn btn-light">Back to Home</button>
        </div>
    </div>
    
    <!-- injecting csrf token to javascript -->
    <script type="text/javascript">
        var gameData = "{{ json_encode($questions,JSON_UNESCAPED_SLASHES)}}";
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    </script>

    <!-- javascript function -->
    <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>

</body>

</html>
