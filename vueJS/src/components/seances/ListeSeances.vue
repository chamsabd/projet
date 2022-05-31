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
 
      
       <tr class="containerSeances" v-if="id_f == seance.formation_id" >
        <td>{{seance.id}}</td> 
        <td>{{seance.nom_seance}}</td>
        <td>
 
        <b-button pill variant="outline-primary" @click="onRowClick(seance.id)">
          <i class="bi bi-info-circle"></i>   
       <b-modal  id="my-modal" size="lg"   centered ok-only>
         <b-card   class="text-center">
           <h2>Détails </h2>
           <b-card-text> Nom de la séance : {{seance.nom_seance}}</b-card-text>
           <b-card-text>Date de la séance: {{seance.date}} </b-card-text>
           <b-card-text >Temps début: {{seance.temps_debut}} </b-card-text>
           <b-card-text >Temps fin: {{seance.temps_fin}} </b-card-text>
         </b-card>


       </b-modal>
          </b-button>
      &emsp;
        <b-button
        href="javascript:;"
         
         pill variant="outline-danger"
                @click="deleteSeance(seance.id)"
                  ><i class="bi bi-trash3"></i>
                </b-button>  
            
            <modifier-seance 
              :id_s="seance.id"
              ></modifier-seance>
              
        </td>
        </tr>
   



</tbody>
</table>
    
   </div>
</template>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6"></script>
<script src="https://cdn.jsdelivr.net/npm/@vue/composition-api@1.6.2"></script>

<script>
import axios from 'axios'
import deleteSeance from "@/components/seances/deleteSeance";
import detailsSeance from "@/components/seances/detailsSeance";
import ModifierSeance from '@/components/seances/ModifierSeance'
import DeleteSeance from './deleteSeance.vue';
//import { ref} from '@vue/composition-api'
//import DataTable from "vue-materialize-datatable";
 //v-if="this.$route.params.id == seance.formation_id"

export default {
  components: { ModifierSeance },
  props:{
 
    DeleteSeance ,
    id_f : Number},
     data() {
    return { 
     seances: {},
      ModifierSeance  // formation_id :this.props.row.id,
     //id_s:this.$route.params.id
    }
  }, 
  componenets: {
    deleteSeance,
    detailsSeance,
    ModifierSeance ,
    
  },
  methods:{
       showModal(id) {
      this.$bvModal.show(id);
    }, hideModal(id) {
      this.$bvModal.hide(id);
    },
    onRowClick(seance) {
      this.seances.id= seance.id
    // console.log(this.seances.id);
    // this.seance = seance
    // console.log(this.seance);
    // if (seance==seance.id){console.log(seance)}
      this.showModal("my-modal");
    },
     deleteSeance(id){
       if(confirm("Voulez vous supprimer cette séance?")){
             axios.delete( 'http://127.0.0.1:8000/api/seance/'+id)
             .then(response=>this.seances=response)
             .catch(error=>console.log(error))}
        }
        ,
  }
  ,
  
  
  
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
