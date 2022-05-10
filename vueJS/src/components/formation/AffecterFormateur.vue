<template>
<b-modal  id="add-modal2" size="lg"  centered ok-only >
 <form ref="my-modal2form" >   <!-- @submit.stop.prevent="submitEdite"-->
       <!--  <div>
                 <b-form-select v-model="selected"  >
                         
                         <option v-for="nomFormateur in nomFormateurs" :value="nomFormateur" :key="nomFormateur.id">
                          {{ nomFormateur.nom }}
    
                        </option>

                 </b-form-select> 
         </div> -->
<label class="form-label">Formateur</label>
          <select class="form-select" aria-label="Default select example" v-model="formation.formateur.nom">
             <option v-for="utilisateur in utilisateurs" :key="utilisateur.id">{{utilisateur.nom}}</option>
          </select>
          <div>
            <button type="submit" class="btn btn-primary" @click="submitEdite()">Submit</button>
          </div>
</form>
</b-modal>
        
</template>
<script>
import axios from "axios";
export default {
  name: 'AffecterFormateur',
        data(){
                
                return{
                         selected: null,
                        utilisateurs:[],
                        formation: {
                          formateur:''
                          },
                          nomFormateur:'',
                }
        },

   mounted() {
    this.getutilisateurs();
  },
  methods:{
      
    async getutilisateurs() {
      await axios
        .get("http://127.0.0.1:8000/api/utilisateurs")
        .then((response) => {
          this.utilisateurs = response.data;
        })
        .catch((error) => console.log(error.response));
    },

    async submitEdite (){
      console.log("ediiit")
      // axios({
      // method: 'put',
      // url: 'http://127.0.0.1:8000/api/formation/updateFormateur',
      // data: this.formation.id + this.formation   
      // })
      // .then((resp) => {
      //     console.log(resp);
      //   })
      // .catch((e) => console.log(e.response));


    }
  }
 
}
</script>

<style>

</style>