@extends('layout.second-page')

@section('content')
    @include('blocks.page-header')

    @include('blocks.text-block', ['text' => $service->text, 'resource' => 'service', 'resourceId' => $service->id])

    @include('service.extended', ['items' => $children])
@endsection

@section('scripts')
@endsection

