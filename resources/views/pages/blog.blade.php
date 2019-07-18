@extends('layout.second-page')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
@endsection

@section('content')
    @include('blocks.page-header')

    @include('blog.categories')

    @include('blocks.articles-slider', ['articles' => $popularArticles])

    <section class="block--articles">
        <div class="container">
            @include('blocks.articles-list')
            @include('blocks.pagination', ['pages' => $articles])
        </div>
    </section>


@endsection

@section('scripts')
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
@endsection

