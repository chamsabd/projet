<template>
  
     <div >
          <b-modal  id="my-modal" size="lg"   centered ok-only>
         <b-card v-if="seance.id"  class="text-center">
           <h2>Détails </h2>
    <b-card-text> Nom de la séance : {{seance.nom_seance}}</b-card-text>
    <b-card-text>Date de la séance: {{seance.date}} </b-card-text>
<b-card-text >Temps début: {{seance.temps_debut}} </b-card-text>
   <b-card-text >Temps fin: {{seance.temps_fin}} </b-card-text>
  </b-card>


       </b-modal>
     </div>
    
  
</template> 
<script>
//import axios from "axios";
// import addDemande from './addDemande.vue';

export default {
 
  name: 'detailsSeance',
  
  methods: {
   

  },
};
</script>
<style  scoped>
.popup{
  position:fixed ;
  top:0 ;
  left: 0;
  right: 0;
  bottom:0 ;
  z-index: 99;
  background-color:rgba(0,0,0,0.2) ;

  display: flex;
	align-items: center;
	justify-content: center;
}
.popupinner{
background: #FFF;
		padding: 32px;
}

</style>