<template>
  <div class="bloc-modale"  v-if="revele">
   <div class="overlay" v-on:click="toggleModale()">
     <div class="modale card">
       <button class="btn-modale btn btn-danger" v-on:click="toggleModale()">x</button>
<form><!--@input="$emit('update:value', $event.target.value)"@input="nom_seance = $event.target.value"-->
  <div class="mb-3">
    <label for="texte" :state="advalid_nom" class="form-label">Nom De Seance</label>
    <b-form-input type="text" class="form-control" 
    name="texte" id="texte"  trim :state="advalid_nom"
    :value="nom_seance"  @input="$emit('update:value', $event.target.value)"
    ></b-form-input>
    <b-form-invalid-feedback :state="advalid_nom">titre doit etre 5-15 caractere </b-form-invalid-feedback>
    <b-form-valid-feedback :state="advalid_nom"> Looks Good</b-form-valid-feedback>
    <!--@input="$emit('update:value', $event.target.value)"-->
  </div>
  <div class="mb-3">
    <label for="date" class="form-label"
    :state="advalid_dated">Date De Seance</label>
    <b-form-datepicker type="date" class="form-control" name="date" id="date"
    :value="date" 
    :min="mind"
      :max="maxd"
      reset-button
      :state="advalid_dated"
      require
      trim
    ></b-form-datepicker>
     <b-form-invalid-feedback :state="advalid_dated">please enter a date</b-form-invalid-feedback>
      <b-form-valid-feedback :state="advalid_dated">Looks Good.</b-form-valid-feedback>
  
  </div>
<div class="mb-3">
  <!--@input="$emit('update:value', $event.target.value)"-->
    <label for="temps_debut" class="form-label">Temps De Début De La Seance</label>
    <input type="time" class="form-control" name="temps_debut" id="temps_debut" 
    :value="temps_debut" 
    >
  </div>
  <div class="mb-3">
    <!--@input="$emit('update:value', $event.target.value)"-->
    <label for="temps_fin" class="form-label">Temps De Fin De La Seance</label>
    <input type="time" class="form-control" name="temps_fin" id="temps_fin" required
    :value="temps_fin"  >
  </div>
  <div class="mb-3">
    <input type="hidden"  name="formation_id" id="formation_id" >
  </div>
  <button type="submit" class="btn btn-primary" 
  @click="update"
  data-dismiss="modal">Modifier</button> &nbsp;
  <button type="reset" class="btn btn-warning"> Annuler</button>
</form>     </div>
    </div>
       </div>
</template>
<script>
import axios from 'axios';
export default {
 name: 'cont-edit-modal',
 //props:["SeanceToEdit","revele","toggleModale"],
 
 props:{
   revele : Boolean,
   toggleModale:
 { type: Function,
   default() {
   return 'Default function'
      } },
    nom_seance:String,
    date:String  ,
    temps_debut:String,
    temps_fin:String,
    id:Number
 },
 data(){
    const now = new Date();
   return {
     nom:this.nom_seance ,
    today: new Date(now.getFullYear(), now.getMonth(), now.getDate()),

 }},
 methods:{
   update(){
     if(!this.advalid_titre ||!this.advalid_dated ) {
     axios.put('http://127.0.0.1:8000/api/seance/'+this.id,{
       nom_seance:this.nom_seance,
       date:this.date,
       temps_debut:this.temps_debut,
       temps_fin:this.temps_fin,
       //id_foramtion:78
     }).then(response=>console.log(response),
        console.log(this.nom_seance),
        console.log(this.date),
        console.log(this.temps_debut),
        console.log(this.temps_fin))
     .catch(error=>console.log(error)) ;
   }
   },
   
    getModel ($event) {
    return $event.target.value.trim()
  } 
  },

computed: {
advalid_nom() {
 if (this.nom_seance != undefined  && this.nom_seance != "")
        return (
          this.nom_seance.length >= 5 && this.nom_seance.length <= 15
        );

      return false;

    },
     minf() {
      const min = new Date(this.date);
      if (this.date) min.setDate(min.getDate());
      return this.date ? min : undefined;
    },
    mind() {
      const min = new Date(this.today);
      min.setMonth(min.getMonth() + 1);
      return min;
    },
      maxd() {
      const max = new Date(this.date);
      if (this.date) max.setDate(max.getDate() );
      return this.date ? max : undefined;
    },
  advalid_dated() {
      if (this.date != undefined && this.date != "")
        return true;
      return false;
    },
}
} 
//this.$emit('seance-updated',response)
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
padding: 80px;
position: fixed;
top:10%;
}
.btn-modale{
  position: absolute;
  top:10px;
  right: 10px;
}
</style>
