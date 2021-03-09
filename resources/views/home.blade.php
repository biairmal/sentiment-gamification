
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- Page Title -->
    <title>Kazee | Sentiment Analysis Game</title>
</head>

<body>
    <!-- User Account -->
    <div class="user">
        
        <div class="user-info">
            <button class="btn" id="toggle_popup" data-toggle="tooltip" data-placement="right" title="Click me"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill=#F73861 class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg></button>
            @if (Auth::user() != null)
            <a>Welcome, {{Auth::user()->name}} !</a>
            @endif
            <div class="popup-box">
                @if (Auth::user() == null)

                <a class="btn user-button" href="{{ url('authorized/google') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                    </svg>
                    <div class="inline">Login</div>
                </a>

                @else
                <a class="btn user-button" href="{{ url('logout') }}">Logout</a>
                @endif
            </div>
        </div>

    </div>

    <!-- End of User Account -->

    <!-- Pre Game-->
    <div class="pregame">

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

        @if($leaderboard != "[]")
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
                    @for ($i=0; $i<count($leaderboard); $i++ )
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$leaderboard[$i]->name}}</td>
                        <td>{{$leaderboard[$i]->level}}</td>
                        <td>{{$leaderboard[$i]->total_points}}</td>
                    </tr>
                    @endfor
                    
                </table>
            </div>
        </div>
        @endif
        
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
    <div class="postgame">
        <div class="score-box">
            <div class="text-title inline">
                Total Score Anda :
                <div id="score" class="text-title inline">50</div>
            </div>
            <hr class="col-2 hr-modified">
            <div class="postgame-text">Horaaay! Anda telah menyelesaikan game ini. Apakah ingin lanjut bermain?</div>
            <div class="postgame-buttons">
                <button id="restart_btn" class="btn button"><span>Play Again</span></button>
                <a id="home_btn" class="btn button" href="{{url('/')}}">Back to Home</a>
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
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

</body>

</html>