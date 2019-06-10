<section class="block block--has-quest">
    <div class="consultation">
        <h3 class="consultation__title">@lang('Остались вопросы?')</h3>
        <p class="consultation__text" >@lang('Получите ответ от наших специалистов за несколько минут')</p>

        <contact-form inline-template>
            <form class="contact-form" @submit.prevent="submitHandler">
                <div class="contact-form__row">
                    <div class="input-field input-field--small" :class="{'input-field--error': phoneEmailErrors}">
                        <span class="icon icon--phone-call input-field__icon"></span>
                        <input type="number"
                            class="input-field__input"
                            @input="validate"
                            type="text"
                            placeholder="@lang('Телефон')"
                            v-model="form.phone">
                    </div>
                    <span class="contact-form__or">@lang('или')</span>
                    <div class="input-field input-field--small" :class="{'input-field--error-right': phoneEmailErrors}">
                        <span class="icon icon--message input-field__icon"></span>
                        <input type="email"
                            class="input-field__input"
                            @input="validate"
                            type="text"
                            placeholder="@lang('Эл. почта')"
                            v-model="form.email">
                    </div>
                </div>
                <div class="contact-form__row contact-form__textarea">
                    <div class="input-field input-field--textarea"
                        :class="{'input-field--error': this.errors.message}">
                        <span class="icon icon--chat input-field__icon"></span>
                        <textarea
                            class="input-field__input"
                            @input="validateMessage"
                            placeholder="@lang('Сообщение')"
                            v-model="form.message">
                        </textarea>
                    </div>
                </div>

                <button type="submit" class="button contact-form__btn" :disabled="loading" v-text="buttonText">@lang('Отправить')</button>
            </form>
        </contact-form>
    </div>
</section>
