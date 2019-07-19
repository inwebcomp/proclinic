<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">

    @include('layout.meta')

    @yield('styles')
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="app">
        @yield('content')

        <transition name="fade">
            <div class="popup-mask" v-show="popupIsActive" @click="$root.$emit('closePopup')"></div>
        </transition>

        @include('blocks.popup-review')
    </div>

    <script src="https://api-maps.yandex.ru/2.1/?apikey=338995d5-7d2b-4122-b470-b9e25f624804&lang={{ $locale . '_' . strtolower($locale) }}" type="text/javascript"></script>

    @yield('scripts')
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
