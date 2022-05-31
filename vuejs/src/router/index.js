import Vue from 'vue'
import VueRouter from 'vue-router'

import Dashboard from '@/views/Dashboard'


//import DemandesView from '@/views/demande/DemandesView'
import DemandesView from '@/views/demande/DemandesView'
import FormationsView from '@/views/formation/FormationsView'

//import AddFormateurex from '@/components/formateurex/AddFormateurex'
//import ListerFormateurex from '@/components/formateurex/ListerFormateurex'
import FormateurexView from '@/views/formateurex/FormateurexView'

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
          path: '/inscrits/:role',
          name: 'InscritsView',
          component: InscritsView

        },
         {
          path: '/ressource',
          name: 'ListerRessource',
          component: ListerRessource
        },
       {
    path: '/demandes',
    name: 'DemandesView',
    component: DemandesView,

   
  },
 

//   {
//     path: '/demande',
//     name: 'afficherDemandes',
//     component: afficherDemandes
//   },
  {
    path: '/formateurex',
    name: 'FormateurexView',
    component: FormateurexView
  },

 
  {
    path: '/demandes',
    name: 'DemandesView',
    component: DemandesView
  },

  
]}]


const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
