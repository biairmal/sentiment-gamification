<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('/css/style.css') }}" />

    <!-- JQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- PAGE TITLE -->
    <title>Kazee | Sentiment Analysis Game</title>
</head>

<body>

    <!-- User Account -->
    @if (Auth::user() == null)
    <div class="flex items-center justify-end mt-4">
        <a href="{{ url('authorized/google') }}">
            <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;" width="150px">
        </a>
    </div>
    @else
    <div class="logout">
        <a>{{Auth::user()->name}}</a>
        <a href="{{ url('logout') }}">Logout</a>
    </div>
    @endif
    <!-- End of User Account -->

    <!-- Pre Game-->
    <div class="pregame disabled">

        <!-- Game Info-->
        <div class="game-info">
            <div class="text-title">Sentiment Analysis Game!</div>
            <hr class="col-1 hr-modified">
            <div class="about">Sentiment analysis adalah proses memahami dan mengelompokkan emosi (positif, negatif) yang terdapat dalam tulisan menggunakan teknik analisis teks.</div>
        </div>
        <!-- End of Game Info -->

        <!-- How to Play -->
        <div class="how-to-play">
            <div class="text-title">Cara Bermain</div>
            <div class="container">
                <div class="row">
                    <div class="col-lg">
                        <div class="box">
                            <div class="urutan">1</div>
                            <div class="cara">Baca dan pahami kalimat yang muncul pada layar anda</div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="box">
                            <div class="urutan">2</div>
                            <div class="cara"> Tentukan apakah kalimat tersebut merupakan kalimat yang bersifat Negatif/Positif</div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="box">
                            <div class="urutan">3</div>
                            <div class="cara">Pilih emoji yang sesuai dengan sifat kalimat tersebut</div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="box">
                            <div class="urutan">4</div>
                            <div class="cara">Tentukan sebanyak-banyaknya dalam kurun waktu 1 menit</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of How to Play -->

        <button id="start_btn" class="btn button"><span>Mulai Bermain</span></button>

        <!-- Leaderboard -->
        <div class="leaderboard">
            <div class="text-title">Leaderboard</div>
            <div class="leaderboard-table">
                <table class="table">
                    <tr>
                        <th>Rank</th>
                        <th>User</th>
                        <th>Level</th>
                        <th>Total Score</th>
                    </tr>
                    @for ($i = 1; $i < 11; $i++) <tr>
                        <td>{{$i}}</td>
                        <td>Banana</td>
                        <td>5</td>
                        <td>500</td>
                        </tr>
                        @endfor
                </table>
            </div>
        </div>
        <!-- End of Leaderboard -->
        <div class="sized-box"></div>
    </div>
    <!-- End of Pregame -->

    <!-- Countdown Timer -->
    <div id="countdown"></div>
    <!-- End of Countdown Timer -->

    <!-- Game -->
    <div class="game">
        <div class="level">Level 1</div>
        <div id="timer"></div>
        <hr class="col-1 hr-modified">

        <div class="question-box">
            <div id="question_number"></div>
            <div id="question"></div>
            <div class="answer-buttons">
                <button id="ans_positive" class="btn btn-success">Positive</button>
                <button id="ans_negative" class="btn btn-danger">Negative</button>
            </div>
        </div>

    </div>
    <!-- End of Game -->

    <!-- Post Game -->
    <div class="postgame enabled">
        <div class="score-box">
            <div class="text-title inline">Total Score Anda : </div>
            <div id="score" class="text-title inline">50</div>
            <hr class="col-2 hr-modified">
            <div class="postgame-text">Selamat anda telah melewati LEVEL 1! Apakah anda ingin lanjut level berikutnya?</div>
            <div class="postgame-buttons">
                <button id="restart_btn" class="btn button"><span>Play Again</span></button>
                <button id="home_btn" class="btn button">Back to Home</button>
            </div>
        </div>



    </div>
    <!-- End of Post Game -->

    <!-- Injecting CSRF Token to JavaScript -->
    <script type="text/javascript">
        var gameData = "{{ json_encode($questions,JSON_UNESCAPED_SLASHES)}}";
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var userData = "{{ json_encode(Auth::user(),JSON_UNESCAPED_SLASHES)}}";
    </script>

    <!-- JavaScript Function -->
    <script type="text/javascript" src="{{ secure_asset('js/script.js') }}"></script>

</body>

</html>