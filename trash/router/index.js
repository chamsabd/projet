import Vue from 'vue'
import VueRouter from 'vue-router'
 import VueDataTable from '@/components/VueDataTable' // @pashute: I added this later...

Vue.use(VueRouter)

const routes = [
     { 
       path: '/',
      name: 'VueDataTable',
       component: VueDataTable
     }
]

// eslint-disable-next-line no-new
const router = new VueRouter({
   routes
})

export default router