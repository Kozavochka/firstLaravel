<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $data["title"] }}</title>

{{--https://fonts.google.com/specimen/Oswald--}}

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
      /*  @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: normal;
            src: url(https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap) format('truetype');
        }*/

      body {
          font-family: DejaVu Sans, 'sans-serif';
      }
    </style>
</head>
<body>
{{-- https://github.com/dompdf/dompdf/wiki/UnicodeHowTo#load-a-font-supporting-your-characters-into-dompdf --}}
<h1>{{ $data["title"] }}</h1>
<p>{{ $data["content"] }}</p>
</body>
</html>
