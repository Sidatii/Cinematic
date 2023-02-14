import { createApp } from 'vue'
import { createPinia } from 'pinia'
// import { library } from '@fortawesome/fontawesome-svg-core'
// import { faHatWizard } from '@fortawesome/free-solid-svg-icons'
// import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import App from './App.vue'
import router from './router'

import "./components/index.css"
import './assets/tailwind.css'
import './axios'




const app = createApp(App)
// library.add(faHatWizard)
// Vue.component('font-awesome-icon', FontAwesomeIcon)
app.use(createPinia())
app.use(router)

app.mount('#app')
