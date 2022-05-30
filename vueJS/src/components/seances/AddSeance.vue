<!---->
<template>
  <div class="bloc-modale"  v-if="revele">
   <div class="overlay" v-on:click="toggleModale()">
     <div class="modale card">
       <div class="btn-modale btn btn-danger" v-on:click="toggleModale()">x</div>
<form @submit.stop.prevent="addSeance"  >
  <div class="mb-3">
    <label for="texte" class="form-label"  :state="advalid_nom">Nom De Seance a Ajouter</label>
    <b-form-input type="text" 
    class="form-control" name="texte" id="texte" trim
    :state="advalid_nom"
    v-model="seance.nom_seance"   ></b-form-input>
    <b-form-invalid-feedback :state="advalid_nom">titre doit etre 5-15 caractere </b-form-invalid-feedback>
    <b-form-valid-feedback :state="advalid_nom"> Looks Good</b-form-valid-feedback>
    
  </div>

  <div class="mb-3">
    <label :state="advalid_dated" for="date" class="form-label mb-2 mr-sm-2 mb-sm-0">Date De Seance</label>
    <b-form-datepicker type="date" class="form-control"
     name="date" id="date"
      :min="mind"
      :max="maxd"
      reset-button
      v-model="seance.date"
      :state="advalid_dated"
      require
      trim

      ></b-form-datepicker>
      <b-form-invalid-feedback :state="advalid_dated">please enter a date</b-form-invalid-feedback>
      <b-form-valid-feedback :state="advalid_dated">Looks Good.</b-form-valid-feedback>
  
  
  </div>
    
<div class="mb-3">
    <label for="temps_debut" class="form-label">Temps De Début De La Seance</label>
    <input type="time" class="form-control" name="temps_debut" id="temps_debut" required v-model="seance.temps_debut">
  </div>

  <div class="mb-3">
    <label for="temps_fin" class="form-label">Temps De Fin De La Seance</label>
    <input type="time" class="form-control" name="temps_fin" id="temps_fin" required v-model="seance.temps_fin">
  </div>
  <div class="mb-3">
    <input type="hidden"  name="formation_id" id="formation_id" v-model="seance.formation_id">
  </div>
<!-- @click="addSeance" -->
  <button type="submit" class="btn btn-primary">Valider</button> &nbsp;
  <button type="reset" class="btn btn-warning"> Annuler</button>
</form>     </div>
 
    </div>
       </div>

</template>

<script>

import axios from 'axios';


export default {
 name: 'add-seance',
 props:{
   revele : Boolean,
   toggleModale:
 { type: Function,
   default() {
   return 'Default function'
      } }

 },
 data(){
    const now = new Date();
   return {
   seance : {
       nom_seance:'',
       date :"" ,
       temps_fin:"",
       temps_debut:"",
       formation_id:this.$route.params.id
       },
     nom_seance_error:"" ,
     dat_error:"",
     today: new Date(now.getFullYear(), now.getMonth(), now.getDate()),
   }
 } ,
 methods:{
addSeance(){
    if(!this.advalid_titre ||!this.advalid_dated ) {
  axios.post('http://127.0.0.1:8000/api/seance/store',{
  seance : this.seance ,
  
  }).then(response=>{
    if (response.status==201){
     console.log(this.seance)

    }
  })
  .catch(error =>{console.log(error) }) ;
  
} },/*
submitHandler(){
  //valisation nom seance
  this.nom_seance_error=this.seance.nom_seance.length>5 ?'': 'le nom de la seance doit avoir au minimum 6 caractéres'
  this.dat_error=this.seance.date>this.today?'': 'choisissez une date a partir de demain'
 if ((!this.nom_seance_error) ){this.addSeance()}

},*/

 }
,

computed: {

advalid_nom() {

      if (this.seance.nom_seance != undefined  && this.seance.nom_seance != "")

        return (

          this.seance.nom_seance.length >= 5 && this.seance.nom_seance.length <= 15

        );

      return false;

    },
     minf() {
      const min = new Date(this.seance.date);
      if (this.seance.date) min.setDate(min.getDate());
      return this.seance.date ? min : undefined;
    },
    mind() {
      const min = new Date(this.today);
      min.setMonth(min.getMonth() + 1);
      return min;
    },
      maxd() {
      const max = new Date(this.seance.date);
      if (this.seance.date) max.setDate(max.getDate() );
      return this.seance.date ? max : undefined;
    },
  advalid_dated() {
      if (this.seance.date != undefined && this.seance.date != "")
        return true;
      return false;
    },

},





};
</script>
<style  scoped>
.bloc-modale {
  position: fixed;
  top:0;
  bottom:0;
  left:0;
  right:0;
  display: flex;
  justify-content: center;
  align-items: center;
}
.overlay{
  background: rgba(0,0,0,0.5);
  position: fixed;
  top:0;
  bottom:0;
  left:0;
  right:0;
  display: flex;
  justify-content: center;
  align-items: center;

}
.modale{
background: #f1f1f1;
color:#333;
padding: 50px;
position: fixed;
top:20%;
}
.btn-modale{
  position: absolute;
  top:10px;
  right: 10px;
}
.error{
  color:red;
  margin-top: 10px;
  font-size: 0.8em;
  font-weight: bold;
}
</style>
