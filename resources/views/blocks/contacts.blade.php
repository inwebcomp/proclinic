<section class="block block--map">
    <div class="map" id="map">
    </div>

    <script>
        function initMap() {
            var coordinates = {lat: 46.993857, lng: 28.857413},

                map = new google.maps.Map(document.getElementById('map'), {
                    center: coordinates,
                    zoom: 16,
                });

                marker = new google.maps.Marker({
                    position: coordinates,
                    map: map,
                    animation: google.maps.Animation.DROP,
                    icon: './img/icons/png/map-icon.png'
                });
        }
    </script>

    <div class="contacts">
        <div class="contacts__head">@lang('Контакты клиники')</div>
        <div class="contacts__head-mg"></div>
        <div class="contacts__content">
            <div class="contacts__list">
                <p class="contacts__item">
                    <span class="icon icon--fill icon--circle icon--location contacts__item__icon"></span>
                    <b>Moldova,</b> Zelinski 15/4 Sectorul Botanica, Chisinau
                </p>
                <p class="contacts__item">
                    <span class="icon icon--fill icon--circle icon--phone-call-white  contacts__item__icon"></span>
                    <a href="tel:+37378906060" class="contacts__phone">
                        <b>+373 789 06 060</b>
                    </a>
                    <a href="mailto:info@boosdent.kz" class="contacts__mail">info@boosdent.kz</a>
                </p>
            </div>
            <div class="contacts__right-box">
                    <a href="#" class="icon icon--fill icon--circle icon--fb  contacts__right-box__icon"></a>
            </div>
        </div>

        <div class="contacts__footer">
            <a href="#" class="button">@lang('Как к нам добраться')</a>
        </div>
    </div>
</section>
