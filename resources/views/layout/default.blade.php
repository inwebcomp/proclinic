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
        @yield('content')
    </div>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3YzninfSxe8Ml8YqLnNspvnAehzd5t38&callback=initMap">
    </script>
    @yield('scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
