<div class="lang-toggler {{ $classMod ?? '' }}">
    <a href="/" class="lang-toggler__button lang-toggler__button--ru @if($locale == 'ru') active @endif">Ru</a>
    <a href="/ro" class="lang-toggler__button lang-toggler__button--ro @if($locale == 'ro') active @endif">Ro</a>
    <a href="/en" class="lang-toggler__button lang-toggler__button--en @if($locale == 'en') active @endif">En</a>
</div>