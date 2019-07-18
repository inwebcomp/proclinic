@if($name)
    <b>@lang('Имя'):</b> {{ $name }}<br>
@endif
@if($messageText)
    <b>@lang('Текст отзыва'):</b><br>
    {!! $messageText !!}
@endif