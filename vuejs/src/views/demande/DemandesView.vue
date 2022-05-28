<template>

    <AfficherDemande :d="demandes" />

</template>

<script>
//import axios from "axios";

import axios from "axios";
//import DataTable from "vue-materialize-datatable";
//import ArchiverItem from "@/components/ArchiverItem";
import AfficherDemande from '../../components/demande/afficherDemandes.vue';
export default {
  name: "DemandesView",
  components: {
 AfficherDemande,
  },
  data: function () {
    return {


     
      demandes:[],
    };
  }, 
   computed:{
form_id(){
  return this.$route.params.id;
},
  },
watch: {
 form_id:function () {
  this.getdemandes();
 }
},
    methods: {
    async getdemandes() {
 await  axios
        .get("http://127.0.0.1:8000/api/demandes/formation/"+this.form_id)
        .then((response) => {
          this.demandes = response.data;
        })
        .catch((error) => console.log(error.response));
    },}
};
</script>

<style>
@import "~material-design-icons-iconfont/dist/material-design-icons";

</style>