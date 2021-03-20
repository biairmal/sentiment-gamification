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
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/company-logo/4203d46dc2af93a8acf56a10c285dba3.png" />

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- Page Title -->
    <title>Kazee | Sentiment Analysis Game</title>
</head>

<body>
    <!-- User Account -->
    <div class="user">

        <div class="user-info">
            <a class="btn" id="toggle_popup" data-toggle="tooltip" data-placement="right" title="Click me"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill=#F73861 class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg></a>
            @if (Auth::user() != null)
            <a>Welcome, {{Auth::user()->name}} !</a>
            <div class="levelbar">
                @php
                $barPercentage = 50;
                if (Auth::user()->total_points >= 900){
                $barPercentage = 100;
                } else {
                $barPercentage = (Auth::user()->total_points % 300) *100 / 300;
                }
                @endphp
                <div class="levelbar-border">
                    <div class="levelbar-percentage" style="--width:{{$barPercentage}}">
                        <div class="levelbar-percentage">
                            <div class="levelbar-userlevel">Level {{Auth::user()->level}}</div>
                        </div>

                    </div>
                </div>

                @endif
            </div>
            <div class="popup-box">
                @if (Auth::user() == null)

                <a class="btn user-button" href="{{ url('authorized/google') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                    </svg>
                    <div class="inline">Login</div>
                </a>

                @else
                <a class="btn user-button" href="{{ route('stats',Auth::user()->email) }}">My Stats</a>
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
            <div class="about">Sentiment analysis adalah proses memahami dan mengelompokkan emosi (positif, netral, dan negatif) yang terdapat dalam tulisan menggunakan teknik analisis teks.</div>
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

                            <img class="instruction-image" src="https://image.freepik.com/free-vector/big-book-with-yin-yang-taoism-family-reading-tiny-people-yin-yang-taoism-daoism-confucianism-taoism-chinese-philosophy-concept-pinkish-coral-bluevector-isolated-illustration_335657-1495.jpg">
                            <div class="cara">Baca dan pahami kalimat yang muncul pada layar anda</div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="box">
                            <div class="urutan">2</div>
                            <img class="instruction-image" src="https://image.freepik.com/free-vector/couple-education-online-with-icons-illustration-design_24877-63617.jpg">
                            <div class="cara"> Tentukan apakah kalimat tersebut merupakan kalimat yang bersifat Negatif/Netral/Positif</div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="box">
                            <div class="urutan">3</div>
                            <img class="instruction-image" src="https://image.freepik.com/free-vector/business-people-empolyee-choosing-new-career-direction-arrow-with-target_335657-3302.jpg">
                            <div class="cara">Pilih emoji yang sesuai dengan sifat kalimat tersebut</div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="box">
                            <div class="urutan">4</div>
                            <img class="instruction-image" src="https://image.freepik.com/free-vector/busy-business-people-with-laptops-hurry-up-complete-tasks-huge-clock-hourglass-deadline-project-time-limit-task-due-dates-concept-illustration_335657-2072.jpg">
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
                    @for ($i=0; $i<count($leaderboard); $i++ ) <tr>
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
        <div class="sized-box" style="--width:200"></div>
    </div>
    <!-- End of Pregame -->

    <!-- Countdown Timer -->
    <div id="countdown"></div>
    <!-- End of Countdown Timer -->

    <!-- Game -->
    <div class="game">
        <div id="level"></div>
        <div id="timer"></div>
        <hr class="col-1 hr-modified">

        <div class="question-box">
            <div id="question_number"></div>
            <div id="question"></div>
            <div class="answer-buttons">
                <button id="ans_negative" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-emoji-angry" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zm6.991-8.38a.5.5 0 1 1 .448.894l-1.009.504c.176.27.285.64.285 1.049 0 .828-.448 1.5-1 1.5s-1-.672-1-1.5c0-.247.04-.48.11-.686a.502.502 0 0 1 .166-.761l2-1zm-6.552 0a.5.5 0 0 0-.448.894l1.009.504A1.94 1.94 0 0 0 5 6.5C5 7.328 5.448 8 6 8s1-.672 1-1.5c0-.247-.04-.48-.11-.686a.502.502 0 0 0-.166-.761l-2-1z" />
                    </svg></button>

                <button id="ans_neutral" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-emoji-neutral" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M4 10.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5zm3-4C7 5.672 6.552 5 6 5s-1 .672-1 1.5S5.448 8 6 8s1-.672 1-1.5zm4 0c0-.828-.448-1.5-1-1.5s-1 .672-1 1.5S9.448 8 10 8s1-.672 1-1.5z" />
                    </svg></button>
                <button id="ans_positive" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z" />
                    </svg></button>
            </div>
        </div>
        <div class="sized-box" style="--width:400"></div>

    </div>
    <!-- End of Game -->

    <!-- Post Game -->
    <div class="postgame">
        <div class="score-box">
            <div class="text-title inline">
                Total Score Anda :
                <div id="score" class="text-title inline"></div>
            </div>
            <hr class="col-2 hr-modified">
            <div id="postgame_text" class="postgame-text"></div>
            <div class="postgame-buttons">
                <button id="restart_btn" class="btn button"><span>Play Again</span></button>
                <a id="home_btn" class="btn button" href="{{url('/')}}">Back to Home</a>
            </div>
        </div>
        <div class="sized-box" style="--width:600"></div>
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