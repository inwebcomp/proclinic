<footer class="footer">
    <div class="container">
        <div class="footer__main">
            <a class="logo footer__logo" href="#">
                <img src="{{ asset('img/logo.svg') }}" width="200" alt="{{ config('app.name') }}" class="logo__img">
            </a>

            @include('blocks.menu', [
                'classMod' => 'menu--dark footer__menu',
            ])
        </div>
    </div>

    <div class="footer__bottom">
        <div class="container footer__bottom__container">
            <span class="footer__copr">© ProClinic.md</span>
            <p class="footer__text ">Powered by <a href="#"><b>InWeb.md</b></a></p>
        </div>
    </div>

</footer>
