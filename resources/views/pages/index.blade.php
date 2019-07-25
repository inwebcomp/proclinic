@extends('layout.default')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
@endsection

@section('content')
    @include('blocks.header')

    @include('blocks.services')

    @include('blocks.advantages')

    @include('blocks.dual-slider')

    @include('blocks.doctors-slider')

    @include('blocks.need-consultation')

    @include('blocks.clients-reviews')

    @include('blocks.index-articles')

    @include('blocks.has-quest')

    @include('blocks.contacts')

    @include('blocks.footer')
@endsection

@section('scripts')
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
@endsection

