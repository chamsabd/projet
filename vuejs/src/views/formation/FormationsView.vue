<template>
  <div id="app" class="container">
    <h1 class="text-center">Datatable with Vue</h1>

    <datatable
      title="Basic table"
      :columns="tableColumns1"
      :rows="formations"
      v-on:row-click="onRowClick"
      :perPage="[3, 5, 10]"
    >
      <th slot="thead-tr">Etat</th>
      <th slot="thead-tr">Actions</th>

      <template slot="tbody-tr" slot-scope="props">
        <td>
          <b-button v-if="props.row.etat == 0" pill variant="outline-info"
            >overte</b-button
          >
          <b-button v-else pill variant="outline-danger">fermer</b-button>
        </td>
        <td>
          <b-button pill variant="outline-info">detail</b-button>
        </td>
      </template>
    </datatable>
    <FormationDetails :formation="formation" />
  </div>
</template>

<script>
import axios from "axios";

import DataTable from "vue-materialize-datatable";
//import ArchiverItem from "@/components/ArchiverItem";
import FormationDetails from "@/components/formation/FormationDetails";
export default {
  name: "FormationsView",
  components: {
    //  ArchiverItem,
    FormationDetails,
    datatable: DataTable,
  },
  data: function () {
    return {
      tableColumns1: [
        {
          label: "titre de formation",
          field: "titre",
          numeric: false,
          html: false,
        },
        {
          label: "date debut",
          field: "date_debut",
          numeric: true,
          html: false,
        },
        {
          label: "description",
          field: function f(fo) {
            if (fo.description) {
              return fo.description.toString().substring(0, 20) + "…";
            } else {
              return "pas de description";
            }
          },
          numeric: false,
          html: false,
        },
      ],

      formations: [],
      formation: {},
    };
  },
  mounted() {
    this.getformations();
  },
  methods: {
    showModal(id) {
      this.$bvModal.show(id);
      // this.$refs[id].show()
    },
    onRowClick(row) {
      this.formation = row;
      console.log(this.formation);
      this.showModal("my-modal");
    },
    getformations() {
      axios
        .get("http://127.0.0.1:8000/api/formations")
        .then((response) => {
          this.formations = response.data;
        })
        .catch((error) => console.log(error.response));
    },
    deleteitm(id) {
      axios
        .delete("http://127.0.0.1:8000/api/formation/" + id)
        .then((response) => {
          if (response.data == true) this.getformations();
        })
        .catch((error) => console.log(error.response));
    },
  },
};
</script>

<style>
@import "~material-design-icons-iconfont/dist/material-design-icons";
</style>