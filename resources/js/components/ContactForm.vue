<template>
</template>

<script>
import alerts from '../mixins/alerts'
import validationForm from '../mixins/validationForm'

export default {
    name: 'contact-form',
    mixins: [alerts, validationForm],

    data: () => ({
        form: {
           phone: '',
           email: '',
           message: ''
        },
        errors: {
            phone: false,
            email: false,
            message: false
        }
    }),

    computed: {
        buttonText() {
            return this.loading ? 'Отправка...' : 'Отправить'
        },
        phoneEmailErrors() {
            if(this.errors.phone && this.errors.email) {
                return true
            }
        }
    },

    methods: {
        validate() {
            this.errors.phone = ! this.form.phone
            this.errors.email = ! this.form.email
        },

        validateMessage() {
            this.errors.message = ! this.form.message
        },

        submitHandler() {
            this.validate()
            this.validateMessage()

            if(this.phoneEmailErrors || this.errors.message || this.loading) {
                return false;
            }

            this.loading = true;

            axios.post('/api/contact', this.form)
            .then( ({data}) => {
                this.loading = false;
                this.reset()
                this.showSuccessAlert(data.description, data.message)
            })
            .catch((error) => {
                this.loading = false;
                this.showFailAlert(data.description, data.message)
            });
        }
    },
};
</script>

