import Vue from 'vue'
import VueRouter from 'vue-router'

import Dashboard from '@/views/Dashboard'


//import DemandesView from '@/views/demande/DemandesView'
import afficherDemandes from '@/components/demande/afficherDemandes'
import FormationsView from '@/views/formation/FormationsView'
//import AddFormateurex from '@/components/formateurex/AddFormateurex'
//import ListerFormateurex from '@/components/formateurex/ListerFormateurex'
import FormateurexView from '@/views/formateurex/FormateurexView'
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
   
  },
  {
    path: '/demande',
    name: 'afficherDemandes',
    component: afficherDemandes
  },
  {
    path: '/formateurex',
    name: 'FormateurexView',
    component: FormateurexView
  }
 
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
