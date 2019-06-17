<popup ref="contact" class-mod="popup--review">
    <div class="popup-contacts">
        <div class="popup-contacts__info">
            <h3 class="title popup-contacts__title">@lang('Отправьте нам свой отзыв!')</h3>

            <form action="" class="popup-contacts">
                <div class="popup-contacts__row">
                    <div class="input-field">
                        <span class="icon icon--user input-field__icon"></span>
                        <input type="text"
                            class="input-field__input"
                            type="text"
                            placeholder="@lang('Ваше имя')">
                    </div>
                </div>

                <div class="popup-contacts__row">
                    <div class="input-field input-field--textarea">
                        <span class="icon icon--chat input-field__icon"></span>
                        <textarea
                            class="input-field__input"
                            placeholder="@lang('Сообщение')">
                        </textarea>
                    </div>
                </div>

                <div class="popup-contacts__row">
                    <button type="submit" class="button popup-contacts__btn">@lang('Отправить')</button>
                </div>
            </form>
        </div>
    </div>
</popup>
