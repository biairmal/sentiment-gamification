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

    <a class="btn user-button" href="{{ url('logout') }}">Back To Home</a>

    <div class="text-title">My Profile</div>
    <table>
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
            <td>50</td>
        </tr>
        <tr>
            <td><b>Lifetime Answers</td>
            <td>50</td>
        </tr>
    </table>

    <div class="text-title">Recent Matches</div>
    <table class="table">
        <tr>
            <th>Time</th>
            <th>Total Answers</th>
            <th>Score</th>
        </tr>
        @for ($i=0; $i<count($recentMatches); $i++ ) <tr>
            <td>{{$recentMatches[$i]->created_at}}</td>
            <td>50</td>
            <td>{{$recentMatches[$i]->score}}</td>
            </tr>
            @endfor

    </table>
    </div>
</body>

</html>