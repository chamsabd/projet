import VueRouter from 'vue-router'

import Dashboard from '@/views/Dashboard'


//import DemandesView from '@/views/demande/DemandesView'
import afficherDemandes from '@/components/demande/afficherDemandes'
import FormationsView from '@/views/formation/FormationsView'
import LoginView from '@/views/LoginView'
import registerView from '@/views/registerView'
import Vue from 'vue'
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
     
    ],
   
  },
  {
    path: '/demande',
    name: 'afficherDemandes',
    component: afficherDemandes
  },
 
  // {
  //   path: '/demandes',
  //   name: 'DemandesView',
  //   component: DemandesView
  // },
  {
    path: '/login',
    name: 'LoginView',
    component: LoginView
  },
  {
    path: '/register',
    name: 'registerView',
    component: registerView
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
