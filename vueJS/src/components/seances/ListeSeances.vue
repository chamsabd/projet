<template> 
   

      
       <div>
       <li class="list-group-item"   v-for="seance in seances " :key="seance.id"
       >{{seance.nom_seance}}

       </li> 
      <!-- <p  >{{seances}}</p>-->
    </div>
   
</template>
<script>
import axios from 'axios'
//import DataTable from "vue-materialize-datatable";
 //v-if="this.$route.params.id == seance.formation_id"
export default {
  data() {
    return { 
     seances: {},
     id_s:this.$route.params.id
    }
  },
  
  
  created(){
      // var vm=this;
       axios.get('http://127.0.0.1:8000/api/seances')
      .then(response =>this.seances=response.data)
      .catch(error => console.log(error));

},
mounted(){
    console.log('component mounted')
} 
  
}
</script>
