<template>
<b-modal  id="my-modaldelete" size="lg"  centered ok-only >
 <form ref="my-modal2form" @submit.stop.prevent="submitEditeforex">   
     <div>
         <b-form-group :state="advalid_email" id="input-group-2" label="email:" label-for="input-2">
         <b-form-input
         :state="advalid_email"
          id="input-1"
          v-model="formateurexes.email"
          type="email"
          trim
        ></b-form-input>
         <b-form-invalid-feedback :state="advalid_email">
                email doit comporte le caractere @gmail.com
              </b-form-invalid-feedback>
              <b-form-valid-feedback :state="advalid_email">
                valider
              </b-form-valid-feedback>
        
        </b-form-group>
         <b-form-group :state="advalid_nom" id="input-group-2" label="nom:" label-for="input-2">
        <b-form-input
        :state="advalid_nom"
          id="input-2"
          v-model="formateurexes.nom"
          trim
        ></b-form-input>
        <b-form-invalid-feedback :state="advalid_nom">
                nom doit etre 5-15 caractere
              </b-form-invalid-feedback>
              <b-form-valid-feedback :state="advalid_nom">
                valider
              </b-form-valid-feedback>
      </b-form-group>

      <b-form-group :state="advalid_prenom" id="input-group-2" label="prenom:" label-for="input-2">
        <b-form-input
        :state="advalid_prenom"
          id="input-2"
          v-model="formateurexes.prenom"
          trim
        ></b-form-input>
        <b-form-invalid-feedback :state="advalid_prenom">
                prenom doit etre 5-15 caractere
              </b-form-invalid-feedback>
              <b-form-valid-feedback :state="advalid_prenom">
                valider
              </b-form-valid-feedback>
      </b-form-group>

      <b-form-group :state="advalid_specialite" id="input-group-2" label="specialite:" label-for="input-2">
        <b-form-input
        :state="advalid_specialite"
          id="input-2"
          v-model="formateurexes.specialite"
          trim
        ></b-form-input>
        <b-form-invalid-feedback :state="advalid_specialite">
                specialite doit etre 5-15 caractere
              </b-form-invalid-feedback>
              <b-form-valid-feedback :state="advalid_specialite">
                valider
              </b-form-valid-feedback>
      </b-form-group>

      <b-form-group :state="advalid_ncin" id="input-group-2" label="ncin:" label-for="input-2">
        <b-form-input
        :state="advalid_ncin"
          id="input-2"
          v-model="formateurexes.ncin"
          trim
        ></b-form-input>
         <b-form-invalid-feedback :state="advalid_ncin">
                ncin doit 8 number
              </b-form-invalid-feedback>
              <b-form-valid-feedback :state="advalid_ncin">
                valider
              </b-form-valid-feedback>
      </b-form-group>
    
  </div>
  <div>
    <button type="submit" class="btn btn-primary">edite</button>
  </div>

</form>
</b-modal>
    
</template>
<script>
import axios from "axios";
export default {
      name: 'EditeFormateurex',
        data(){
                
                return{
                         
                        
                          formateurexes:{
                            ncin:'',
                          },
                         
                }
        },
         props: {
  formateurex:Object,
  },
  methods:{

    async submitEditeforex (){
      console.log("ediiit")
      axios({
       method: 'put',
       url: 'http://127.0.0.1:8000/api/formateurex/'+this.formateurex.id,
       data: this.formateurexes
       })
      .then((resp) => {
          console.log(resp);
       })
      .catch((e) => console.log(e.response));


    },
  }, 
   computed: {
      advalid_nom() {
      if (this.formateurexes.nom != undefined  && this.formateurexes.nom != "")
        return (
          this.formateurexes.nom.length >= 5 && this.formateurexes.nom.length <= 15
        );
      return false;
    },
    advalid_prenom() {
      if (this.formateurexes.prenom != undefined  && this.formateurexes.prenom != "")
        return (
          this.formateurexes.prenom.length >= 5 && this.formateurexes.prenom.length <= 15
        );
      return false;
    },
    advalid_specialite() {
      if (this.formateurexes.specialite != undefined  && this.formateurexes.specialite != "")
        return (
          this.formateurexes.specialite.length >= 5 && this.formateurexes.specialite.length <= 15
        );
      return false;
    },
    advalid_ncin(){
      if (this.formateurexes.ncin != undefined && this.formateurexes.specialite != "")
      return this.formateurexes.ncin >= 1 && this.formateurexes.ncin <= 100000000
      return false
    },

    advalid_email(){
      if (this.formateurexes.email != undefined)
      //return(this.formateurexes.email != '@')
      return this.formateurexes.email !=null && this.formateurexes.email=="@gmail.com"
      return false
    }
   },
 
  
}
</script>