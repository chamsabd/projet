import Vue from 'vue'
import VueRouter from 'vue-router'
import VueDataTable from '@/components/VueDataTable'
import FormationsView from '@/views/formation/FormationsView'
Vue.use(VueRouter)

const routes = [
  {
    path: '/formations',
    name: 'FormationsView',
    component: FormationsView
  },
  {
    path: '/demande',
    name: 'DemandeForm',
    component: DemandeForm
  },
  
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
