<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $data["title"] }}</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
            font-family: DejaVu Sans, 'sans-serif';
        }
    </style>
</head>
<body>

<h1>{{ $data["title"] }}</h1>
<div>
    {{$game->name}}
</div>

@foreach($game->clubs as $club)
    <div> {{$club->name}} </div>
@endforeach
</body>
</html>
