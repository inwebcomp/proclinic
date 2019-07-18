@if($phone)
    <b>@lang('Телефон'):</b> {{ $phone }}<br>
@endif
@if($email)
    <b>@lang('Email'):</b> {{ $email }}<br>
@endif
@if($messageText)
    <b>@lang('Текст сообщения'):</b><br>
    {!! $messageText !!}
@endif