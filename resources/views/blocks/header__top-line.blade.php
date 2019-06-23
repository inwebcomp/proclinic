<div class="header__top-line">
    <div class="container header__top-line__container">
        <a class="logo header__logo" href="#">
            <img src="{{ asset('img/logo.svg') }}" width="200" alt="{{ config('app.name') }}" class="logo__img">
        </a>

        @include('blocks.menu', [
            'classMod' => 'header__menu',
        ])

        <a href="#" class="header__phone">
            <span class="icon icon--circle icon--fill icon--phone-call-white"></span>
            +373
            <span class="header__phone-bold">78 90 60 60</span>
        </a>

        @include('blocks.lang-toggler')

        <button class="header__burgher" @click="burgherClick">
            <span class="icon icon--menu"></span>
        </button>

    </div>
</div>
