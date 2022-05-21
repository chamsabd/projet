<template> 
    <div >
       <div v-for="seance in seances " :key="seance.id">
       <li class="list-group-item"  v-if="this.$route.params.id == seance.formation_id" 
       >{{seance.nom_seance}} 

       </li> 
    </div>
    </div>
</template>
<script>
import axios from 'axios'
//import DataTable from "vue-materialize-datatable";

export default {
  data() {
    return { 
     seances: {},
    }
  },
  
  
  created(){
       var vm=this;
    axios.get('http://127.0.0.1:8000/api/seances')
      .then(response =>vm.seances=console.log(response.data))
      .catch(error => console.log(error));

},
mounted(){
    console.log('component mounted')
} 
  
}
</script>
