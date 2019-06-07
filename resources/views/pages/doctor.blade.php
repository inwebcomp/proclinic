@extends('layout.second-page')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
@endsection

@section('content')
    @include('blocks.page-header')

    <main class="block block--doctor">
        @include('blocks.doctor-info', [
            'doctor_features' => [
                [
                    'icon' => 'aid-kit',
                    'text' => 'Опыт работы в профессии 12 лет'
                ],
                [
                    'icon' => 'happy',
                    'text' => 'Более 250 благодарных пациентов'
                ],
                [
                    'icon' => 'planning',
                    'text' => 'Автор курса для стоматологов “Мастерство протезирования”'
                ],
                [
                    'icon' => 'education',
                    'text' => 'С 2001 года проходит стажировки у ведущих стоматологов США'
                ],
            ],
        ])
        @include('blocks.doctor-experience')
    </main>


@endsection

@section('scripts')
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
@endsection

