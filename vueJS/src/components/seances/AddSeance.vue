<template>
  <div class="bloc-modale" v-if="revele">
   <div class="overlay" v-on:click='toggleModale'>
     <div class="modale card">
       <div class="btn-modale btn btn-danger" v-on:click='toggleModale'>x</div>
       Le contenue de la modale
     </div>
 
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
