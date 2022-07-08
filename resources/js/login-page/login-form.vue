<script>
export default {
    name: 'LoginForm',

    template: '#_loginForm',

    data() {
        return {
            form: {
                email: '',
                password: '',
                remember: true,
            },
            errors: {},
            showPassword: false,
            submitting: false,
            alert: null,
        };
    },

    methods: {
        async submit() {
            if (Object.keys(this.errors).length > 0) {
                this.invalidFieldFocus();
                return;
            }

            this.alert = null;
            this.submitting = true;

            try {
                await axios.post(
                    this.$refs.form.getAttribute('data-action-url'),
                    this.form
                );
                location.replace(
                    this.$refs.form.getAttribute('data-redirect-url')
                );
            } catch (e) {
                this.submitting = false;

                if (e.response) {
                    const {status, data} = e.response;

                    if (status === 403) {
                        location.replace(location.href);
                        return;
                    } else if (status === 422) {
                        this.errors = data.errors;
                        await this.$nextTick();
                        this.invalidFieldFocus();
                        return;
                    }
                } else if (navigator.onLine === false || e.request) {
                    this.showAlert(FALLBACK_MESSAGES.network_error);
                    return;
                }

                this.showAlert(
                    `${FALLBACK_MESSAGES.error_occured} ${FALLBACK_MESSAGES.try_again}`
                );
            }
        },

        invalidFieldFocus() {
            this.$refs.form.querySelector('.is-invalid').focus();
        },

        async showAlert(message) {
            this.alert = message;
            await this.$nextTick();
            const ref = this.$refs.alert;
            ref.setAttribute('tabindex', '-1');
            ref.focus();
            ref.removeAttribute('tabindex');
        },

        async closeAlert() {
            this.alert = null;
            await this.$nextTick();
            this.$refs.submit.focus();
        },
    },

    mounted() {
        this.$refs.form.querySelector('#authEmail').focus();
    },
};
</script>
