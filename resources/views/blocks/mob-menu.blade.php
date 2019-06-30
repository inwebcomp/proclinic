<mob-menu inline-template :is-open="mobMenuIsOpen" @menu-close="menuCloseHandler">
    <div class="mob-menu-wrapper">
        <section class="mob-menu" :class="{'mob-menu--open': isOpen}">
            <button class="mob-menu__close" @click="closeMenu">
                <span class="icon icon--close mob-menu__close-icon"></span>
            </button>

            <a class="logo mob-menu__logo" href="/{{ ($locale == 'ru' ? '' : $locale) }}">
                <img class="logo__img" src="{{ asset('img/logo.svg') }}" width="170" alt="{{ config('app.name') }}">
            </a>

            <div class="mob-menu__langs">
                @include('blocks.lang-toggler')
            </div>

            <nav class="mob-menu__list">
                <a href="#" class="mob-menu__link">
                    <span class="icon icon--busines"></span>
                    Клиника
                </a>
                <a href="#" class="mob-menu__link">
                    <span class="icon icon--chat"></span>
                    Клиника
                </a>
                <a href="#" class="mob-menu__link">
                    <span class="icon icon--email-2"></span>
                    Клиника
                </a>
                <a href="#" class="mob-menu__link">
                    <span class="icon icon--man"></span>
                    Клиника
                </a>
                <a href="#" class="mob-menu__link">
                    <span class="icon icon--peoples"></span>
                    Клиника
                </a>
            </nav>

            <footer class="mob-menu__footer">
                <a href="#" class="header__phone mob-menu__phone">
                    <span class="icon icon--circle icon--fill icon--phone-call-white"></span>
                    +373
                    <span class="header__phone-bold">78 90 60 60</span>
                </a>
            </footer>
        </section>

        <transition name="fade">
            <div class="mob-menu__overlay"
                v-show="isOpen"
                @click.self="closeMenu" >
            </div>
        </transition>
    </div>
</mob-menu>
