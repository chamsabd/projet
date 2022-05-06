import Vue from 'vue'
import VueRouter from 'vue-router'
import VueDataTable from '@/components/VueDataTable'
import DemandeForm from '@/components/DemandeForm'
Vue.use(VueRouter)

const routes = [
  {
    path: '/test',
    name: 'VueDataTable',
    component: VueDataTable
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
