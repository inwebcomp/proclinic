<script>
import alerts from '../mixins/alerts'
import validationForm from '../mixins/validationForm'

export default {
    name: 'testimonial-form',
    mixins: [alerts, validationForm],

    data: () => ({
        form: {
           name: '',
           message: ''
        },
        errors: {
            name: false,
            message: false
        }
    }),

    computed: {
        buttonText() {
            return this.loading ? 'Отправка...' : 'Отправить'
        }
    },

    methods: {
        validate(field) {
            if (field === 'all') {
                for (let item in this.form) {
                    this.errors[item] = ! this.form[item]
                }
            } else {
                this.errors[field] = ! this.form[field]
            }
        },

        submitHandler() {
            this.validate('all')

            if(this.hasErrors() || this.loading) {
                return false;
            }

            this.loading = true;

            axios.post('/api/testimonial', this.form)
            .then( ({data}) => {
                this.loading = false;
                this.reset()
                this.showSuccessAlert(data.message, data.description)
                this.$root.$emit('closePopup')
            })
            .catch(({response}) => {
                this.loading = false;
                this.showFailAlert(response.data.message)
            });
        }
    },
};
</script>

