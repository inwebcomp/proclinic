<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ProClinic</title>

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body>
        @include('blocks.header')

        @include('blocks.services', [
            'items' => $services
        ])
        @include('blocks.advantages', [
            'items' => [
                [
                    'icon' => 'tooth-whitening',
                    'count' => '01',
                    'name' => 'Материалы и оборудование',
                    'text' => 'Десятилетний опыт создания концепции
                        индивидуального лечения для сохранения
                        красоты и здоровья ваших зубов'
                ],
                [
                    'icon' => 'doctor',
                    'count' => '02',
                    'name' => 'Материалы',
                    'text' => 'Десятилетний опыт создания концепции
                        индивидуального лечения для сохранения
                        красоты и здоровья ваших зубов'
                ],
                [
                    'icon' => 'cardiogram',
                    'count' => '03',
                    'name' => 'Материалы',
                    'text' => 'Десятилетний опыт создания концепции
                        индивидуального в'
                ],
                [
                    'classMod' => 'advantage--lg',
                    'icon' => 'technology',
                    'count' => '04',
                    'name' => 'Материалы',
                    'text' => 'Десятилетний опыт создания концепции
                        индивидуального в'
                ],
                [
                    'classMod' => 'advantage--lg',
                    'icon' => 'respect',
                    'count' => '05',
                    'name' => 'Материалы',
                    'text' => 'Десятилетний опыт создания концепции
                        индивидуального в'
                ],

            ]
        ])

        @include('blocks.dual-slider')

        @include('blocks.personal-slider')

        @include('blocks.need-consultation')

        @include('blocks.clients-reviews')

        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
        <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
