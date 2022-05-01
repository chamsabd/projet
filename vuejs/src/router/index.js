import Vue from 'vue'
import VueRouter from 'vue-router'
import VueDataTable from '@/components/VueDataTable'

Vue.use(VueRouter)

const routes = [
  {
    path: '/test',
    name: 'VueDataTable',
    component: VueDataTable
  },
  
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
