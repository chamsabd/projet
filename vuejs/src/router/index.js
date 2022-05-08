import Vue from 'vue'
import VueRouter from 'vue-router'
import DemandesView from '@/views/Demande/DemandesView'
import FormationsView from '@/views/formation/FormationsView'
Vue.use(VueRouter)

const routes = [
  {
    path: '/formations',
    name: 'FormationsView',
    component: FormationsView
  },

  {
    path: '/Demande',
    name: 'DemandesView',
    component: DemandesView
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
