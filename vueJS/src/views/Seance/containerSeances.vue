<template>
  <div class="containerSeances" id="app">
    <!--l'id passé est{{this.$route.params.id}}-->
    <div style="color: blueviolet" class="heading">
      <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css"
      />
      <h2>Seances de la formation : {{this.$route.params.name}}</h2>
    </div>
    <div > 
    
    <cont-add-modal @cont-add-modal="contAddModal"  class="py-4"
       :to="{name:'contAddModal' ,params:{id:this.$route.params.id}}"
       ></cont-add-modal> </div>
    <center>
<liste-seances :to="{name:'ListeSeances' ,params:{id:this.$route.params.id} } "
                :id_f="id_f"
           ></liste-seances>
           
          </center>
  </div>
</template>
<script>
import AddSeance from "@/components/seances/AddSeance";
import ListeSeances from "@/components/seances/ListeSeances.vue";
//import deleteSeance from "@/components/seances/deleteSeance";
//import detailsSeance from "@/components/seances/detailsSeance";
import contAddModal from '../../components/seances/contAddModal.vue';
//import ModifierSeance from '@/components/seances/ModifierSeance'
//import ModifierSeance from '../../components/seances/ModifierSeance.vue';
//import ModifierSeance from '../../components/seances/ModifierSeance.vue';
//import axios from 'axios'
export default {
  //components: { ModifierSeance },
   data(){
     return{
       id_f:this.$route.params.id ,
    //  ModifierSeance  // formation_id :this.props.row.id,
   }},

  componenets: {
    AddSeance,
    ListeSeances,
    //deleteSeance,
    //detailsSeance,
    //ModifierSeance ,
    contAddModal
  }, 

  methods:{
      contAddModal(seance){
    this.nom_seance=seance.nom_seance;
          console.log(seance);

  } ,

  


  }
};
</script>
<style scoped>
.containerSeances {
  margin: 50px;
  background-color: aliceblue;
}
.heading {
  padding: 10px;
}
</style>