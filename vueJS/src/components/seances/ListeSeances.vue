<template> 
   

      <div >



 <table class="table">
        <thead>
          <tr>
             <th scope="col">ID </th>
            <th scope="col">Nom De La Seance</th>
            <th scope="col">Actions possibles sur la Seance</th>
           
          </tr>
        </thead>
         <tbody class="table-group-divider" v-for="seance in seances " :key="seance.id">
 
      
       <tr class="containerSeances" v-if="id_f == seance.formation_id">
        <td>{{seance.id}}</td> 
        <td>{{seance.nom_seance}}</td>
        <td>

        </td>
        </tr>
   



</tbody>
</table>
















        
        
      
    
    
   </div>
</template>
<script>
import axios from 'axios'
import deleteSeance from "@/components/seances/deleteSeance";
import detailsSeance from "@/components/seances/detailsSeance";
import ModifierSeance from '@/components/seances/ModifierSeance'

//import DataTable from "vue-materialize-datatable";
 //v-if="this.$route.params.id == seance.formation_id"
export default {
  props:{
   id_f : Number},
     data() {
    return { 
     seances: {},
      
     //id_s:this.$route.params.id
    }
  }, 
  componenets: {
    deleteSeance,
    detailsSeance,
    ModifierSeance 
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
<style scoped>
.containerSeances {
  margin: 20px;
  background-color: aliceblue;
}

</style>
