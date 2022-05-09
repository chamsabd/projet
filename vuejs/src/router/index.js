import Vue from 'vue'
import VueRouter from 'vue-router'

import Dashboard from '@/views/Dashboard'


//import DemandesView from '@/views/demande/DemandesView'

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
 

  

    path: '/formations',
    name: 'FormationsView',
    component: FormationsView
  },

  // {
  //   path: '/demandes',
  //   name: 'DemandesView',
  //   component: DemandesView
  // },

]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
