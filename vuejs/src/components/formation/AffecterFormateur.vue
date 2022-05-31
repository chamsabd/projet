<template>
<b-modal  id="my-modal2" size="lg"  centered ok-only >
 <form ref="my-modal2form" @submit.stop.prevent="submitEdite">   
       
<!--<label class="form-label">Formateur</label>
          <select class="form-select" aria-label="Default select example" v-model="formateur.id">
             <option v-for="utilisateur in utilisateurs" :key="utilisateur.id">{{utilisateur.nom}}</option>
          </select>
          <div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>-->


          <div>
    <b-form-select v-model="formateur.id" :options="options"></b-form-select>
  </div>
  <div>
    <button type="submit" class="btn btn-primary">Submit</button>
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
                         
                        utilisateurs:[],
                        
                          formateur:{},
                         
                }
        },
  props: {
  formation:Object,
  },

   mounted() {
    this.getutilisateurs();
  },
  methods:{
      
    async getutilisateurs() {
      await axios
        .get("http://127.0.0.1:8000/api/users")
        .then((response) => {
          this.utilisateurs = response.data;
        })
        .catch((error) => console.log(error.response));
    },

    async submitEdite (){
      console.log("ediiit")
      axios({
       method: 'put',
       url: 'http://127.0.0.1:8000/api/formation/update/'+this.formation.id,
       data: this.formateur
       })
      .then((resp) => {
          console.log(resp);
       })
      .catch((e) => console.log(e.response));


    }
  }, 
  computed: {
    options() {
      var val = this.utilisateurs;

      var option = val.map(function (utilisateur) {
        return {
          text:
            utilisateur.nom ,
          value: utilisateur.id
        };
      });
      return option;
    }
    }
 
}
</script>

<style>

</style>