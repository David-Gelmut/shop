<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SHOP</title>
    <meta name="description" content="Краткое описание сайта">
    <meta name="keywords" content="Ключевые слова">
    <!-- Подключение шрифтов -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Подключение стилей -->
    <link rel="stylesheet" href="{{asset('assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/media.css')}}">

    @vite('resources/js/app.js')
</head>
<body>
@yield('content')
<!-- Подключение скриптов -->
<script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script  src="{{asset('assets/js/script.js')}}"></script>
<script type="module" src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>
