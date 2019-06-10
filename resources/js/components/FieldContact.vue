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
    },

    methods: {
        validate() {
            this.errors.contact = ! this.form.contact
        },

        submitHandler() {
            this.validate()

            if(this.hasErrors() || this.loading) {
                return false;
            }

            this.loading = true;

            axios.post('/api/consultation', this.form)
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

