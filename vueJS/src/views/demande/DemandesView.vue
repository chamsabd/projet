<template>

    <afficherdemandes :demande="demande" />

</template>

<script>
//import axios from "axios";
import AfficherDemandes from '../../components/demande/afficherDemandes.vue';

//import DataTable from "vue-materialize-datatable";
//import ArchiverItem from "@/components/ArchiverItem";

export default {
  name: "DemandesView",
  components: {
  AfficherDemandes,
  },
  data: function () {
    return {
      tableColumns1: [
     
        {
          label: "date demande",
          field: "date_demande",
          numeric: true,
          html: false,
        },
      ],

      demandes: [],
      demande:{},
    };
  },
};
</script>

<style>
@import "~material-design-icons-iconfont/dist/material-design-icons";

</style>