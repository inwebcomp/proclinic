@extends('layout.default')

@section('content')
    @include('blocks.header')

    @include('blocks.services', [
        'items' => $services
    ])
    @include('blocks.advantages', [
        'items' => $advantages
    ])

    @include('blocks.dual-slider')

    @include('blocks.personal-slider')

    @include('blocks.need-consultation')

    @include('blocks.clients-reviews')

    @include('blocks.articles-list')

    @include('blocks.has-quest')

    @include('blocks.contacts')

    @include('blocks.footer')
@endsection

@section('scripts')
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3YzninfSxe8Ml8YqLnNspvnAehzd5t38&callback=initMap">
    </script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
@endsection

