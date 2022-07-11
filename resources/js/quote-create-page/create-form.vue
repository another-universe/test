<script>
export default {
    name: 'CreateForm',

    template: '#_createQuoteForm',

    data() {
        return {
            form: {
                text: '',
            },
            errors: {},
            submitting: false,
            alert: null,
        };
    },

    computed: {
        alertType() {
            if (this.alert?.type === 'success') {
                return 'alert-success';
            }

            return 'alert-danger';
        },
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
                this.form.text = '';
                this.showAlert('success');
            } catch (e) {
                if (e.response) {
                    const {status, data} = e.response;

                    if (status === 401) {
                        location.replace(location.href);
                        return;
                    } else if (status === 422) {
                        this.errors = data.errors;
                        await this.$nextTick();
                        this.invalidFieldFocus();
                        return;
                    }
                } else if (navigator.onLine === false || e.request) {
                    this.showAlert('error', FALLBACK_MESSAGES.network_error);
                    return;
                }

                this.showAlert(
                    'error',
                    `${FALLBACK_MESSAGES.error_occured} ${FALLBACK_MESSAGES.try_again}`
                );
            } finally {
                this.submitting = false;
            }
        },

        invalidFieldFocus() {
            this.$refs.form.querySelector('.is-invalid').focus();
        },

        async showAlert(type, message = null) {
            this.alert = {type, message};
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
        this.$refs.form.querySelector('#text').focus();
    },
};
</script>
