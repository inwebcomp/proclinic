<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ProClinic</title>
    </head>
    <body>
        @include('blocks.header')

        @include('snippets.category', [
            'title' => 'Some title',
            'description' => 'Some description'
        ])
    </body>
</html>
