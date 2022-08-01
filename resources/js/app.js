import './bootstrap';
import { createApp,h } from 'vue';
import App from './components/App.vue'
import router from './routes'
import axios from 'axios'
import VueAxios from 'vue-axios'

const app = createApp({
    render: () => h(App)
})
app.use(router)
.use(VueAxios,axios)
.mount('#app')