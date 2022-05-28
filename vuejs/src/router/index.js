import VueRouter from 'vue-router'

import Dashboard from '@/views/Dashboard'


//import DemandesView from '@/views/demande/DemandesView'
import DemandesView from '@/views/demande/DemandesView'
import FormationsView from '@/views/formation/FormationsView'
import InscritsView from '@/views/inscrit/InscritsView'
import ListerRessource from '@/views/ressource/ListerRessource'
import CalenderView from '@/views/CalenderView'

import LoginView from '@/views/LoginView'
import registerView from '@/views/registerView'
//import CertifList from '@/components/Certification/CertifList'
import CertifView from '@/views/Certification/CertifView'
import Vue from 'vue'

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
  }, {
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
