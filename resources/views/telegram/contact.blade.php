*Сообщение*
@if($phone)
*Телефон:* {{ $phone }}
@endif
@if($email)
*Email:* {{ $email }}
@endif
@if($messageText)
*Текст сообщения:*
{!! $messageText !!}
@endif