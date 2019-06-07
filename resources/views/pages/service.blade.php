@extends('layout.second-page')

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
@endsection

