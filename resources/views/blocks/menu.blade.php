<nav class="menu {{ $classMod ?? '' }}">
    @foreach($menu as $item)
    <a href="{{ $item->link }}" class="menu__link">{{ $item->title }}</a>
    @endforeach
</nav>
