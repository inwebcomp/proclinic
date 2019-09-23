@extends('layout.second-page')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
@endsection

@section('content')
    @include('blocks.page-header')

    @include('blog.categories')

    @if(count($popularArticles) > 3)
        @include('blocks.articles-slider', ['articles' => $popularArticles])
    @endif

    <section class="block--articles">
        <div class="container">
            @include('blocks.articles-list')
            @include('blocks.pagination', ['pages' => $articles])
        </div>
    </section>


@endsection

@section('scripts')
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
@endsection

