@include('blocks.mob-menu')
<header class="header">
    @include('blocks.header__top-line')

    <div class="container banner header__banner">
        <div class="banner__row">
            <h1 class="banner__title">@lang('Лечение зубов без боли с гарантией результата')</h1>
            <div class="banner__descr">@lang('Современный медицинский центр') <strong>@lang('в Кишиневе')</strong></div>
        </div>
        <div class="banner__row">
            <div class="banner__quest">
                <p class="banner__quest__title">@lang('Нужна консультация?')</p>
                <p>@lang('Оставьте заявку и получите бесплатный прием')</p>
            </div>

            <field-contact inline-template>
                <form @submit.prevent="submitHandler" @keyup.enter="validate" class="input-field-contact">
                    <div class="input-field input-field--buttoned" :class="{'input-field--error': errors.contact}">
                        <span class="icon icon--phone-call input-field__icon"></span>
                        <input class="input-field__input"
                            v-model="form.contact"
                            @input="validate"
                            type="text"
                            placeholder="Как с вами связаться?">
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
    </div>
</header>
