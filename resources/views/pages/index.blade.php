<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ProClinic</title>

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body>
        @include('blocks.header', [
            'classMod' => 'active',
            'data' => [
                'title' => 'Some title22sdsds',
                'description' => 'Some description'
            ]
        ])
    </body>
</html>
