*Отзыв на сайте*
@if($name)
*Имя:* {{ $name }}
@endif
@if($messageText)
*Текст отзыва:*
{!! $messageText !!}
@endif