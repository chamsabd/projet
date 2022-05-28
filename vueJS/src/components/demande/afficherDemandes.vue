<template>
  <div id="app" class="container">
    <h1 class="text-center">Datatable with Vue</h1>

      <datatable
      title="Basic table"
      :columns="tableColumns1"
      :rows="d"
      >
    <!-- <adddemande 
    v-on:reloadlist="getdemandes()"
    />
      <th slot="thead-tr">Actions</th> -->

    </datatable>
  </div>
</template>
<script>
//import axios from "axios";
import DataTable from "vue-materialize-datatable";
// import addDemande from './addDemande.vue';
export default {
  // components: { 
  //   addDemande },
  name: 'afficherDemande',
    components: {
    datatable: DataTable,

  },
  props: {
    d:Array
  },
 data: function () {
    return {
        
     formation_id: " ",
      tableColumns1: [
       {
          label: "email utilisateur",
          field: "email",
          numeric: false,
          html: false,
        },
        {
          label: "date demande",
          field: "pivot.created_at",
          numeric: true,
          html: false,
        },
       
      ],

    
      //demande: {},
    };
  },
 
  methods: {

  },
};
</script>