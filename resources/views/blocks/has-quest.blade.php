<section class="block block--has-quest">
    <div class="consultation">
        <h3 class="consultation__title">@lang('Остались вопросы?')</h3>
        <p class="consultation__text" >@lang('Получите ответ от наших специалистов за несколько минут')</p>

        <form class="contact-form">
            <div class="contact-form__row">
                <div class="input-field input-field--small">
                    <span class="icon icon--phone-call input-field__icon"></span>
                    <input class="input-field__input" type="text" placeholder="@lang('Телефон')">
                </div>
                <span class="contact-form__or">@lang('или')</span>
                <div class="input-field input-field--small">
                    <span class="icon icon--phone-call input-field__icon"></span>
                    <input class="input-field__input" type="text" placeholder="@lang('Эл. почта')">
                </div>
            </div>
            <div class="contact-form__row contact-form__textarea">
                <div class="input-field input-field--textarea ">
                    <span class="icon icon--phone-call input-field__icon"></span>
                    <textarea name="" class="input-field__input" placeholder="@lang('Сообщение')" ></textarea>
                </div>
            </div>

            <button type="submit" class="button contact-form__btn">@lang('Отправить')</button>
        </form>


    </div>

</section>
