<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ProClinic</title>

    @yield('styles')
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
    <div id="app">
        @include('blocks.mob-menu')
        <header class="empty-header">
            @include('blocks.header__top-line')
        </header>

            @yield('content')

        @include('blocks.has-quest')

        @include('blocks.contacts')

        @include('blocks.footer')
    </div>

    @yield('scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
