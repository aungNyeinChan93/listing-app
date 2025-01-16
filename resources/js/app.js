import './bootstrap';
import '../css/app.css'
import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'
import Master from './pages/layouts/Master.vue';
import { ZiggyVue } from "../../vendor/tightenco/ziggy";


createInertiaApp({
    title:(title)=>` My App - ${title}`,
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    const page = pages[`./Pages/${name}.vue`]
    if(page){
        page.default.layout = page.default.layout || Master
    }
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .component('Head',Head)
      .component('Link',Link)
      .mount(el)
  },
  progress: {
    color: "#fff",
    showSpinner: true,
},
})
