import './bootstrap';
import { createApp } from 'vue';
import router from './Router/index';

const app = createApp({});

import mainVue from './components/layouts/app.vue';
app.component('main-vue', mainVue);
app.use(router);
app.mount('#app');
