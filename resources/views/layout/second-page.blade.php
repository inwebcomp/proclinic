<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-54PGWJW');</script>
    <!-- End Google Tag Manager -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">

    <link rel="shortcut icon" href="/img/favicon.png" type="image/png">

    @include('layout.meta')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('styles')
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-54PGWJW"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

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

    <script src="https://api-maps.yandex.ru/2.1/?apikey=338995d5-7d2b-4122-b470-b9e25f624804&lang={{ $locale . '_' . strtolower($locale) }}" type="text/javascript"></script>

    @yield('scripts')

    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
