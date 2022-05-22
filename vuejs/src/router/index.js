import Vue from 'vue'
import VueRouter from 'vue-router'

import Dashboard from '@/views/Dashboard'


//import DemandesView from '@/views/demande/DemandesView'
import afficherDemandes from '@/components/demande/afficherDemandes'
import FormationsView from '@/views/formation/FormationsView'

import InscritsView from '@/views/inscrit/InscritsView'
import CalenderView from '@/views/CalenderView'

import containerSeances from '../views/Seance/containerSeances'

Vue.use(VueRouter)
Vue.component('add-seance',require('@/components/seances/AddSeance.vue').default);
Vue.component('delete-seance',require('@/components/seances/deleteSeance.vue').default);
Vue.component('details-seance',require('@/components/seances/detailsSeance.vue').default);
Vue.component('add-seance',require('@/components/seances/AddSeance.vue').default);
Vue.component('liste-seances',require('@/components/seances/ListeSeances.vue').default);
Vue.component('cont-add-modal',require('@/components/seances/contAddModal.vue').default)
Vue.component('container-seance',require('@/views/Seance/containerSeances.vue').default)
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
  },
  {
    path: '/ContainerSeances',
    name: 'ContainerSeances',
    component : containerSeances
  // component:()=>
  // import("")
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
