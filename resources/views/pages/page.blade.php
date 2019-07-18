@extends('layout.second-page')

@section('content')
    @include('blocks.page-header')

    @include('blocks.text-block', ['text' => $page->text])
@endsection