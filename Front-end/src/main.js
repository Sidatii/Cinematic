import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'

import "./components/index.css"
import './assets/tailwind.css'
import './axios'

const app = createApp(App)

app.use(createPinia())
app.use(router)

app.mount('#app')
