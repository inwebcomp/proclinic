<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ProClinic</title>

    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    @yield('styles')
</head>
<body>
    @yield('content')

    @yield('scripts')

    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
