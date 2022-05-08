import Vue from 'vue'
import VueRouter from 'vue-router'
import Dashboard from '@/views/Dashboard'

import FormationsView from '@/views/formation/FormationsView'
Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'HomeView',
    component: Dashboard,
    children: [
      {

          path: '/formations/:role',
          name: 'FormationsView',
          component: FormationsView
        }
     
    ]
  }
 

  
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
