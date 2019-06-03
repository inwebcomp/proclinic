<template>
    <div class="input-field-contact">
        <div class="input-field input-field--buttoned">
            <span class="icon icon--phone-call input-field__icon"></span>
            <input class="input-field__input" type="text" placeholder="Как с вами связаться?" >
            <button
                @click="submitHandler"
            class="button input-field__button">Отправить</button>
        </div>
        <button class="button banner__input-button">Отправить</button>
    </div>
</template>

<script>
    export default {
        name: 'fieldContact',
        props: {

        },
        data: () => ({
            show: '1234'
        }),


    };
</script>
