import {createApp} from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import App from "./public_app/App.vue";
import router from './public_app/router'


createApp(App).use(VueAxios, axios).use(router).mount("#app")
