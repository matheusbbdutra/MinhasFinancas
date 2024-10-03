/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';
import { createApp } from 'vue';
import App from './vue/App.vue';
import router from './vue/Router';

const app = createApp(App);
app.use(router);
app.mount('#app');