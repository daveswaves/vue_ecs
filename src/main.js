import App from '@/App.vue'
import router from '@/router'
import { createPinia } from 'pinia'
import { createApp } from 'vue'

import '@/assets/index.css'

// Element Plus - a Vue 3 based component library for designers and developers
// $ npm install element-plus --save
import 'element-plus/dist/index.css'
import ElementPlus from 'element-plus'

createApp(App)
   .use(router)
   .use(createPinia())
   .use(ElementPlus)
   .mount('#app')
