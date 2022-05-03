<template>
  <div id="app" class="container">
    <h1 class="text-center">Datatable with Vue</h1>

    <datatable
      title="Basic table"
      :columns="tableColumns1"
      :rows="formations"
      :perPage="[3, 5, 10]"
    >
      <th slot="thead-tr">Actions</th>
 
       <template slot="tbody-tr" slot-scope="props">
        <tr>
          <td></td>
        <td>
          <b-button
            pill
            v-b-toggle="'collapse-' + props.row.id"
            variant="outline-info"
            >detail</b-button
          >
         
        </td>
        </tr>
       <table class="details">
        <tr >
          <FormationDetails :formation="props.row" />
        </tr></table>
      </template> 
    </datatable>

 
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
    };
  },
  mounted() {
    this.getformations();
  },
  methods: {
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
.details{
 
   display:block !important; 
width:100%;
  right: 0px;
}
</style>