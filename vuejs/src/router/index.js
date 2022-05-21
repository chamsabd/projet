import Vue from 'vue'
import VueRouter from 'vue-router'

import Dashboard from '@/views/Dashboard'


//import DemandesView from '@/views/demande/DemandesView'
import afficherDemandes from '@/components/demande/afficherDemandes'
import FormationsView from '@/views/formation/FormationsView'
import InscritsView from '@/views/inscrit/InscritsView'
import CalenderView from '@/views/CalenderView'
Vue.use(VueRouter)

const routes = [
  {

    path: '/',

    component: Dashboard,
    children: [
      {
        path: '/',
     
        component: CalenderView
      },
      {
          path: '/formations/:role',
          name: 'FormationsView',
          component: FormationsView
        },
        {
          path: '/inscrits',
          name: 'InscritsView',
          component: InscritsView
        }
     
    ]
   
  },
  {
    path: '/demande',
    name: 'afficherDemandes',
    component: afficherDemandes
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
