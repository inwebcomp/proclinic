<a class="logo {{ $classMod ?? '' }}" href="/{{ ($locale == 'ru' ? '' : $locale) }}">
    <img src="{{ asset('img/logo-' . $locale . '.svg') }}" width="182" height="40" alt="{{ config('app.name') }}" class="logo__img">
</a>