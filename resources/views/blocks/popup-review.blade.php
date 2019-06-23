<popup ref="contact" class-mod="popup--review">
    <popup-form inline-template>
        <div class="popup-contacts">
            <div class="popup-contacts__info">
                <h3 class="title popup-contacts__title">@lang('Отправьте нам свой отзыв!')</h3>

                <form action="" @submit.prevent="submitHandler" class="popup-contacts">
                    <div class="popup-contacts__row">
                        <div class="input-field" :class="{'input-field--error': errors.name}">
                            <span class="icon icon--user input-field__icon"></span>
                            <input type="text"
                                class="input-field__input"
                                v-model="form.name"
                                @input="validate('name')"
                                type="text"
                                placeholder="@lang('Ваше имя')">
                        </div>
                    </div>

                    <div class="popup-contacts__row">
                        <div class="input-field input-field--textarea" :class="{'input-field--error': errors.message}">
                            <span class="icon icon--chat input-field__icon"></span>
                            <textarea
                                class="input-field__input"
                                @input="validate('message')"
                                placeholder="@lang('Сообщение')"
                                v-model="form.message">
                            </textarea>
                        </div>
                    </div>

                    <div class="popup-contacts__row">
                        <button type="submit" class="button popup-contacts__btn" :disabled="loading" v-text="buttonText">@lang('Отправить')</button>
                    </div>
                </form>
            </div>
        </div>
    </popup-form>
</popup>
