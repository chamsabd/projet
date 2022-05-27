<template>

    <div>
      
        <div>
 &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        <b-button @click="toogleModale"  
         v-on:click="getSeance(id_s)"
      pill
      variant="outline-warning"
      ><i class="bi bi-pen"></i>  </b-button>
       <cont-edit-modal :revele="revele" 
                        :toogleModale="toogleModale" 
                        :nom_seance="nom_seance"
                        :date="date" 
                        :temps_fin="temps_fin"
                        :temps_debut="temps_debut"
                        
        ></cont-edit-modal>  </div>
    </div>
</template>
<script>
import axios from 'axios'
import ContEditModal from './contEditModal.vue'
export default {
    name:'conetnue-e',
    props:{
    id_s : Number},
    data(){
            return{
                revele: false,
                                   
                        nom_seance:"",
                        date :"" ,
                        temps_fin:"",
                        temps_debut:"",
                         
            }
        },
    components:{
        ContEditModal,
        
    },
    methods:{
        toogleModale(){
            this.revele= !this.revele
        } ,
        getSeance(id){
       axios.get('http://127.0.0.1:8000/api/seance/'+id,)
      .then(response =>{this.nom_seance=response.data.nom_seance,
                        this.date=response.data.date,
                        this.temps_debut=response.data.temps_debut,
                        this.temps_fin=response.data.temps_fin})
      .catch(error => console.log(error));
        }
        ,
        refresh (seances){
          this.seances= seances.data
        }
    },

}




</script>