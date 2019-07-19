@if(is_iterable($menu))
    <nav class="menu {{ $classMod ?? '' }}">
        @foreach($menu as $item)
            <a href="{{ $item->link }}" class="menu__link" @click="scrollToBlock">{{ $item->title }}</a>
        @endforeach
    </nav>
@endif
