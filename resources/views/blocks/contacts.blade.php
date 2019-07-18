<section class="block block--map">
    <div class="map" id="map"></div>

    <div class="contacts">
        <div class="contacts__head">@lang('Контакты клиники')</div>
        <div class="contacts__head-mg"></div>
        <div class="contacts__content">
            <div class="contacts__list">
                <p class="contacts__item">
                    <span class="icon icon--fill icon--circle icon--location contacts__item__icon"></span>
                    {!! \App\Models\Textblock::html('address', true) !!}
                </p>
                <p class="contacts__item">
                    <span class="icon icon--fill icon--circle icon--phone-call-white  contacts__item__icon"></span>
                    <a href="tel:{{ config('contacts.phone_link') }}" class="contacts__phone">
                        <b>{{ config('contacts.phone_prefix') . ' ' . config('contacts.phone') }}</b>
                    </a>
                    <a href="mailto:{{ config('contacts.email') }}" class="contacts__mail">{{ config('contacts.email') }}</a>
                </p>
            </div>
            <div class="contacts__right-box">
                    <a href="https://www.facebook.com/stomatologie.proclinic/" class="icon icon--fill icon--circle icon--fb  contacts__right-box__icon"></a>
            </div>
        </div>

        <div class="contacts__footer">
            <a href="#" class="button">@lang('Как к нам добраться')</a>
        </div>
    </div>
</section>
