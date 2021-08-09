<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap Style -->
    <link href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Bootstrap icons -->
    <link href="{{ asset('plugins/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            min-height: 10rem;
            padding-top: 10rem;
        }
    </style>
</head>

<body>

    <header class="fixed-top">
        @include('layouts._header')
    </header>
    <main>
        @include('layouts._flash')
        @yield('content')
    </main>

    <footer class="bd-footer py-3 mt-3 bg-light">
        @include('layouts._footer')
    </footer>

    <!-- Jquery -->
    <script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Script -->
    <script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>


</body>

</html>
