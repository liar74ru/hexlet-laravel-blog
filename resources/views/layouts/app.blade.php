<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hexlet Blog - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-param" content="_token" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        <nav style="background: #f8f9fa; padding: 1rem;">
        <ul style="list-style: none; display: flex; gap: 2rem; margin: 0; padding: 0;">
            <li><a href="{{ route('welcome') }}">Главная</a></li>
            <li><a href="{{ route('about') }}">О проекте</a></li>
            <li><a href="{{ route('articles.index') }}">Список статей</a></li>
        </ul>
    </nav>
        <div class="container mt-4">
            <h1>@yield('header')</h1>
            <div>
                @yield('content')
            </div>
        </div>
    </body>
</html>