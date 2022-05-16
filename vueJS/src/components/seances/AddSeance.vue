<template>
  <div class="bloc-modale" v-if="revele">
   <div class="overlay" v-on:click='toggleModale'>
     <div class="modale card">
       <div class="btn-modale btn btn-danger" v-on:click='toggleModale'>x</div>
<form>
  <div class="mb-3">
    <label for="texte" class="form-label">Nom De Seance a Ajouter</label>
    <input type="text" class="form-control" id="texte"  required >
  </div>

  <div class="mb-3">
    <label for="date" class="form-label">Date De Seance</label>
    <input type="date" class="form-control" id="date" required>
  </div>

<div class="mb-3">
    <label for="temps_debut" class="form-label">Temps De Début De La Seance</label>
    <input type="time" class="form-control" id="temps_debut" required>
  </div>

  <div class="mb-3">
    <label for="temps_fin" class="form-label">Temps De Fin De La Seance</label>
    <input type="time" class="form-control" id="temps_fin" required>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>     </div>
 
    </div>
       </div>

</template>

<script>
export default {
 name: 'add-seance',
 props:['revele','toggleModale']
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
top:30%;
}
.btn-modale{
  position: absolute;
  top:10px;
  right: 10px;
}
</style>
