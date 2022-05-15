<template>
  <div id="app" class="container">
    <h1 class="text-center">Datatable with Vue</h1>

        <datatable
      title="Basic table"
      :columns="tableColumns1"
      :rows="demandes"
      :perPage="[3, 5, 10]"
    >
    <!-- <adddemande 
    v-on:reloadlist="getdemandes()"
    />
      <th slot="thead-tr">Actions</th> -->

      <template slot="tbody-tr">
        <!-- <td>
          <b-button pill variant="outline-info">detail</b-button>
        </td> -->
      </template>
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

  },
};
</script>