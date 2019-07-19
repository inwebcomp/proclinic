<section class="block block--consultation">
    <div class="consultation">
        <h3 class="consultation__title">@lang('Нужна консультация?')</h3>
        <p class="consultation__text" >@lang('Наши специалисты ответят на все ваши вопросы')</p>

        <field-contact inline-template>
            <form @submit.prevent="submitHandler" @keyup.enter="validate" class="input-field-contact">
                <div class="input-field input-field--buttoned" :class="{'input-field--error': errors.contact}">
                    <span class="icon icon--phone-call input-field__icon"></span>
                    <input class="input-field__input"
                        v-model="form.contact"
                        @input="validate"
                        type="text"
                        placeholder="@lang('Как с вами связаться?')">
                    <button
                        :disabled="loading"
                        v-text="buttonText"
                        class="button input-field__button">
                    @lang('Отправить')
                    </button>
                </div>
                <button type="submit" class="button input-field__mobl-btn" :disabled="loading" v-text="buttonText">@lang('Отправить')</button>
            </form>
        </field-contact>
    </div>
</section>
