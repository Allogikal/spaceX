import './bootstrap';
import { createApp } from 'vue';
import store from './store';
import router from './router';
import MainComponent from "./components/MainComponent.vue";

createApp(MainComponent)
    .use(router)
    .use(store)
    .mount('#app');
