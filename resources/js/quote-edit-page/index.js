import {createApp} from 'vue';
import EditForm from './edit-form.vue';

createApp({
    template: '#__wrapper',
    components: {EditForm},
}).mount('#editQuoteForm');
