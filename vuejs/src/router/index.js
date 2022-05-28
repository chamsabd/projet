import Vue from 'vue'
import VueRouter from 'vue-router'

import Dashboard from '@/views/Dashboard'


//import DemandesView from '@/views/demande/DemandesView'
import DemandesView from '@/views/demande/DemandesView'
import FormationsView from '@/views/formation/FormationsView'
import InscritsView from '@/views/inscrit/InscritsView'
import ListerRessource from '@/views/ressource/ListerRessource'
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
        },
     
    
   
  
  
        

         {
          path: '/ressource/:id',
          name: 'ListerRessource',
          component: ListerRessource
        },
       {
    path: '/demandes/:id',
    name: 'DemandesView',
    component: DemandesView
  },
   {
          path:'/listesCertifs',
          name:'listeCertif',
          component:CertifView,

        }
       
    ]
   
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
