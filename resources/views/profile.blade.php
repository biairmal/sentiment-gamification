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

<div class="user">

<div class="user-info">
    <button class="btn" id="toggle_popup" data-toggle="tooltip" data-placement="right" title="Click me"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill=#F73861 class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
        </svg></button>
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

    <a class="btn user-button" href="{{ url('/') }}">Back To Home</a>

    <div class="sized-box" style="--width:50px"></div>
    <div class="text-title">My Profile</div>
    <div class="profile">
        <table class="profile-table">
            <tr>
                <td><b>Nama</td>
                <td>{{Auth::user()->name}}</td>
            </tr>
            <tr>
                <td><b>Email</td>
                <td>{{Auth::user()->email}}</td>
            </tr>
            <tr>
                <td><b>Level</td>
                <td>{{Auth::user()->level}}</td>
            </tr>
            <tr>
                <td><b>Total Points</td>
                <td>{{Auth::user()->total_points}}</td>
            </tr>
            <tr>
                <td><b>Games Played</td>
                <td>{{count($recentMatches)}}</td>
            </tr>
            <tr>
                <td><b>Lifetime Answers</td>
                <td>{{$recentMatches->sum('total_answers')}}</td>
            </tr>
        </table>
    </div>


    <div class="text-title">Recent Matches</div>
    <div class="recent-match">

    </div>
    <table class="table">
        <tr>
            <th>Time</th>
            <th>Total Answers</th>
            <th>Score</th>
        </tr>
        @for ($i=0; $i<count($recentMatches); $i++ ) <tr>
            <td>{{$recentMatches[$i]->created_at}}</td>
            <td>{{$recentMatches[$i]->total_answers}}</td>
            <td>{{$recentMatches[$i]->score}}</td>
            </tr>
            @endfor

    </table>
    </div>
</body>

</html>