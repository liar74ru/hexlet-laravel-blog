<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hexlet Blog - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-param" content="_token" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>
        <!-- Подключаем CSS -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
        <!-- Подключаем наши стили для флеш-сообщений -->
        <style>
            {!! file_get_contents(resource_path('css/flash-messages.css')) !!}
            {!! file_get_contents(resource_path('css/createedit.css')) !!}
        </style>
    </head>
    <body>
        <!-- Навигация и другой контент -->
        @include('partials.navbar')
        @include('components.flash-messages')
        <div class="container mt-4">
            <h1>@yield('header')</h1>
            <div>
                @yield('content')
            </div>
        </div>
    </body>
</html>