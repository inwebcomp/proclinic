@extends('layout.second-page')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
@endsection

@section('content')
    @include('blocks.page-header')

    @include('blocks.tag-cloud')

    @include('blocks.articles-slider')

    <section class="block block--articles">
        <div class="container">
            @include('blocks.articles-list')
            @include('blocks.pagination')
        </div>
    </section>


@endsection

@section('scripts')
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
@endsection

