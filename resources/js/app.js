require('./bootstrap');

require('alpinejs');

import { createApp } from "vue";
import router from './router';
import StarsIndex from './components/stars/StarsIndex.vue';

createApp({
    components: {
        StarsIndex
    }
}).use(router).mount('#app')
