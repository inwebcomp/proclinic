<footer class="footer">
    <div class="container">
        <div class="footer__main">
            @include('blocks.logo', [
                'classMod' => 'footer__logo',
            ])

            @include('blocks.menu', [
                'classMod' => 'menu--dark footer__menu',
            ])
        </div>
    </div>

    <div class="footer__bottom">
        <div class="container footer__bottom__container">
            <span class="footer__copr">{!! \App\Models\Textblock::html('copyrights', true) !!}</span>
            <p class="footer__text ">Powered by <a href="//inweb.md" target="_blank" class="footer__text__link"><b>InWeb.md</b></a></p>
        </div>
    </div>

</footer>
