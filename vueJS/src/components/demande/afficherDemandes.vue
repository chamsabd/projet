<template>
  <div id="app" class="container">
    <h1 class="text-center">Datatable with Vue</h1>

        <datatable
      title="Basic table"
      :columns="tableColumns1"
      :rows="demandes"
      v-on:row-click="onRowClick"
      :perPage="[3, 5, 10]"
    >
    <adddemande 
    v-on:reloadlist="getdemandes()"
    />
      <th slot="thead-tr">Actions</th>

      <template slot="tbody-tr">
        <td>
          <b-button pill variant="outline-info">detail</b-button>
        </td>
      </template>
    </datatable>
  </div>
</template>
<script>
import axios from "axios";
import addDemande from './addDemande.vue';
export default {
  components: { addDemande },
  name: 'afficherDemande',

  methods: {
   
   getdemandes() {
      axios.get("http://127.0.0.1:8000/api/demandes")
      .then((response) => {
          this.formations = response.data;
        })
        .catch((error) => console.log(error.response));
    },
  },
};
</script>