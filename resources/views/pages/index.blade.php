@extends('layout.default')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
@endsection

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

    <section class="block block--articles">
        <div class="container">
            <h3 class="block__title">@lang('Мы ответим на ваши вопросы')</h3>
            @include('blocks.articles-list')
            <a href="#" class="button articles-list__more-btn">Все статьи</a>
        </div>
    </section>

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

