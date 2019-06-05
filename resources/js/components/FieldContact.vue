<template>
</template>

<script>
import alerts from '../mixins/alerts'
import validationForm from '../mixins/validationForm'

export default {
    name: 'field-contact',
    mixins: [alerts, validationForm],

    data: () => ({
        form: {
           contact: ''
        },
        errors: {
            contact: false
        }
    }),

    computed: {
        buttonText() {
            return this.loading ? 'Отправка...' : 'Отправить'
        },
        checkField() {
            return !!this.form.contact
        },
    },

    methods: {
        inputHandler() {
            this.errors.contact = !this.checkField
        },

        submitHandler() {
            if(!this.checkField || this.loading) {
                return false;
            }

            this.loading = true;

            axios.post('/api/consultation', {
                contact: this.form.contact
            })
            .then( ({data}) => {
                this.loading = false;
                this.form.contact = '';
                this.showSuccessAlert(data.description, data.message)
            })
            .catch((error) => {
                this.loading = false;
                this.showSuccessAlert(data.description, data.message)
            });
        }
    },
};
</script>

