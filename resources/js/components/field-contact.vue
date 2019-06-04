<template>
    <form @submit.prevent="submitHandler" class="input-field-contact">
        <div class="input-field input-field--buttoned" :class="{'input-field--error': errorForm}">
            <span class="icon icon--phone-call input-field__icon"></span>
            <input class="input-field__input" v-model="inputVal" @input="inputEvent" type="text" placeholder="Как с вами связаться?" >
            <button
                :disabled="loading"
                class="button input-field__button">
                {{buttonText}}
            </button>
        </div>
        <button type="submit" class="button input-field__mobl-btn" :disabled="loading">{{buttonText}}</button>
    </form>
</template>

<script>
import sendContactsMxn from '../mixins/sendContacts'

export default {
    name: 'fieldContact',
    mixins: [sendContactsMxn]
};
</script>
