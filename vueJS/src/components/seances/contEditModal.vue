<template>
  <div class="bloc-modale"  v-if="revele">
   <div class="overlay" v-on:click="toggleModale()">
     <div class="modale card">
       <div class="btn-modale btn btn-danger" v-on:click="toggleModale()">x</div>
<form>
  <div class="mb-3">
    <label for="texte" class="form-label">Nom De Seance</label>
    <input type="text" class="form-control" name="texte" id="texte"  required v-model="seance.nom_seance" >
  </div>

  <div class="mb-3">
    <label for="date" class="form-label">Date De Seance</label>
    <input type="date" class="form-control" name="date" id="date" required v-model="seance.date">
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

  <button type="submit" class="btn btn-primary" @click="addSeance">Modifier</button> &nbsp;
  <button type="reset" class="btn btn-warning"> Annuler</button>
</form>     </div>
 
    </div>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


    
       </div>

</template>

<script>

import axios from 'axios';


export default {
 name: 'cont-edit-modal',
 props:{
   revele : Boolean,
   toggleModale:
 { type: Function,
   default() {
   return 'Default function'
      } }

 },
 data(){
   return {
   seance : {
       nom_seance:'',
       date :"" ,
       temps_fin:"",
       temps_debut:"",
       formation_id:this.$route.params.id
       },
      
     
   }
 } ,
 methods:{
addSeance(){ 
  axios.post('http://127.0.0.1:8000/api/seance/store',{
  seance : this.seance ,
  
  }).then(response=>{
    if (response.status==201){
     console.log(this.seance)

    }
  })
  .catch(error =>{console.log(error) }) ;
  
} ,

 }
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
</style>
