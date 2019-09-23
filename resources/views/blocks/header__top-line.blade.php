<div class="header__top-line">
    <div class="container header__top-line__container">
        @include('blocks.logo', [
            'classMod' => 'header__logo',
        ])

        @include('blocks.menu', [
            'classMod' => 'header__menu',
        ])

        <a href="tel:{{ config('contacts.phone_link') }}" class="header__phone">
            <span class="icon icon--circle icon--fill icon--phone-call-white"></span>
            {{ config('contacts.phone_prefix') }}
            <span class="header__phone-bold">{{ config('contacts.phone') }}</span>
        </a>

        @include('blocks.lang-toggler')

        <button class="header__burgher" @click="burgherClick">
            <span class="icon icon--menu"></span>
        </button>

    </div>
</div>
