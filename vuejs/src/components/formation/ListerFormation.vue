<template>
  <div id="app"  class="container">
    <h1 class="text-center">formation</h1>

    <datatable
      title="formations"
      :customButtons="customButtons"
      :columns="tableColumns1"
      :rows="formations"
     
    >
      <th slot="thead-tr">Etat</th>
      <th slot="thead-tr">Actions</th>

      <template slot="tbody-tr" slot-scope="props">
        <td>
          <b-button v-if="props.row.etat == 0" pill variant="outline-success"
            >overte</b-button
          >
          <b-button v-else pill variant="outline-danger">fermer</b-button>
        </td>
        <td>
          <b-button pill variant="outline-info" @click="onRowClick(props.row)">details</b-button>
        </td>
      </template>
    </datatable>
      <b-modal  id="my-modal" size="lg"  centered ok-only>
          <formation-details :formation="formation"/>
   
       </b-modal>
  </div>
</template>

<script>
import axios from "axios";

import DataTable from "vue-materialize-datatable";
import FormationDetails from './FormationDetails.vue';
//import ArchiverItem from "@/components/ArchiverItem";



export default {
  name: "ListerFormations",
  components: {
    //  ArchiverItem,

   
    datatable: DataTable,
    FormationDetails,
 
  },
  props: {
  formations:Array,
  role:String,
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

    
      formation: {},
    };
  },
  computed: {
    customButtons() {
      return this.role == 'admin'
        ? [
            {
              hide: false, // Whether to hide the button
              icon: "add", // Materialize icon
              onclick: this.onAddClick, // Click handler
            },
          ]
        : [];
    },
  },
  methods: {
  
    onAddClick() {
    
      this.showModal("add-modal");
    },
    showModal(id) {
      this.$bvModal.show(id);
      // this.$refs[id].show()
    }, hideModal(id) {
      this.$bvModal.hide(id);
      // this.$refs[id].show()
    },
    onRowClick(row) {
      this.formation = row;
      console.log(this.formation);
      this.showModal("my-modal");
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