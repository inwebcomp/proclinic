<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">

    @include('layout.meta')

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

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3YzninfSxe8Ml8YqLnNspvnAehzd5t38&callback=initMap">
    </script>

    @yield('scripts')

    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
