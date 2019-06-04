export default {
    data: () => ({
        inputVal: '',
        errorForm: false,
        loading: false
    }),

    methods: {
        checkField() {
            if(!this.inputVal.length) {
                this.errorForm = true;
            } else {
                this.errorForm = false;
            }
        },

        inputEvent() {
            this.checkField();
        },

        submitHandler() {
            this.checkField();

            if(this.errorForm) {
                return false;
            }

            this.loading = true;

            axios.post('/api/consultation', {
                contact: this.inputVal
            })
            .then( ({data}) => {
                this.loading = false;
                this.inputVal = '';
                swal({
                    title: data.message,
                    text: data.description,
                    icon: "success",
                    button: {
                        text: "Продолжить",
                        value: true,
                        visible: true,
                    },
                });
            })
            .catch((error) => {
                this.loading = false;
                swal({
                    title: 'Ошибка!',
                    text: 'Что-то пошло не так!',
                    icon: "error",
                    button: {
                        text: "Продолжить",
                        value: true,
                        visible: true,
                    },
                });
            });
        }
    },

    computed: {
        buttonText() {
            return this.loading ? 'Отправка...' : 'Отправить'
        }
    }
}
