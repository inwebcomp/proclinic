@extends('layout.default')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
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
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
@endsection

