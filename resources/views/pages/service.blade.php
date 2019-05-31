@extends('layout.second-page')

@section('styles')
@endsection

@section('content')
    @include('blocks.page-header')

    @include('blocks.text-block')

    @include('blocks.table', [
        'rows' => [
            [
                'address' => 'Moldova, Zelinski 15/4 Sectorul Botanica, Chişinău',
                'work_time' => '8:00 - 21:30',
                'email' => 'procline@mail.com',
                'phone' => '+373 789 06 060'
            ],
            [
                'address' => 'Moldova, Zelinski 15/4 Sectorul Botanica, Chişinău',
                'work_time' => '8:00 - 21:30',
                'email' => 'procline@mail.com',
                'phone' => '+373 789 06 060'
            ],
            [
                'address' => 'Moldova, Zelinski 15/4 Sectorul Botanica, Chişinău',
                'work_time' => '8:00 - 21:30',
                'email' => 'procline@mail.com',
                'phone' => '+373 789 06 060'
            ],
            [
                'address' => 'Moldova, Zelinski 15/4 Sectorul Botanica, Chişinău',
                'work_time' => '8:00 - 21:30',
                'email' => 'procline@mail.com',
                'phone' => '+373 789 06 060'
            ],
        ]
    ])

    @include('blocks.article-card')

@endsection

@section('scripts')
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3YzninfSxe8Ml8YqLnNspvnAehzd5t38&callback=initMap">
    </script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
@endsection

