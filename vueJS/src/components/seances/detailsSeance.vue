<template>
  <div id="app" class="container">
      <h1> test</h1>
      <button type="button" class="btn btn-primary">Primary</button>

  </div>
  
</template> <!--
<script>
import axios from "axios";
// import addDemande from './addDemande.vue';
export default {
  // components: { 
  //   addDemande },
  name: 'afficherDemande',
 data: function () {
    return {
     formation_id: " ",
      tableColumns1: [
        {
          label: "nom formation",
          field: "titre",
          numeric: false,
          html: false,
        },
        {
          label: "date demande",
          field: "date_demande",
          numeric: true,
          html: false,
        },
        {
          label: "nom utilisateur",
          field: "nom",
          numeric: false,
          html: false,
        },
      ],

    
      formation: {},
    };
  },
  methods: {
   
   getdemandes() {
      axios.get("http://127.0.0.1:8000/api/demandes")
      .then((response) => {
          this.demandes = response.data;
        })
        .catch((error) => console.log(error.response));
    },
  },
};
</script>-->