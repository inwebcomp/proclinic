@extends('layout.second-page')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
@endsection

@section('content')
    @include('blocks.page-header')

    @include('blocks.text-block', ['text' => $article->text, 'resource' => 'article', 'resourceId' => $article->id])
@endsection

@section('scripts')
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
@endsection

