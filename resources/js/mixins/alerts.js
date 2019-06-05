export default {
    methods: {
        showSuccessAlert(title = 'Ок', text = '') {
            swal({
                title: title,
                text: text,
                icon: "success",
                button: {
                    text: "Продолжить"
                },
            })
        },
        showFailAlert(title, text) {
            swal({
                title: title,
                text: text,
                icon: "error",
                button: {
                    text: "Продолжить"
                },
            });
        }
    }
}
