<template>
    <div id="app"  class="container">
      <datatable
      title="formateurexes"
      :columns="tableColumns1"
      :rows="formateurexes"
     
    >
      <th slot="thead-tr">Action</th>
      <template slot="tbody-tr" slot-scope="props">
        
        <td>  
         <b-button pill variant="outline-info" @click="fonctionDetails(props.row)">details</b-button>
        </td>

        <td>  
         <b-button pill variant="outline-warning" @click="editeFormateurex(props.row)">edite</b-button>
        </td>

      </template>
    </datatable>
    <DetailsFormateurex :formateurex="formateurex"/>
    <EditeFormateurex :formateurex="formateurex"/>


    </div>
</template>
<script>


import DataTable from "vue-materialize-datatable";
import DetailsFormateurex from "@/components/formateurex/DetailsFormateurex";
import EditeFormateurex from "@/components/formateurex/EditeFormateurex";


export default {
    name: "ListerFormateurex",
     components: {
 
    datatable: DataTable,
    DetailsFormateurex,
    EditeFormateurex,

  },
  props: {
  formateurexes:Array,
  },
  data: function () {
    return {
      tableColumns1: [
        {
          label: "nom de formateur",
          field: "nom",
          numeric: false,
          html: false,
        },
        {
          label: "specialite",
          field: "specialite",
          numeric: true,
          html: false,
        },
       
      ],
    
     formateurex: {},
    };
  },
  methods: {
      showModal(id) {
      this.$bvModal.show(id);
    },
    fonctionDetails(row) {
      this.formateurex = row;
      console.log(this.formateurex);
      this.showModal("my-modalDetails");
    },
    editeFormateurex(row){
      console.log(row);
      this.formateurex=row;
      this.showModal("my-modaldelete");
    }
  }
}
</script>
<style scoped>
@import "~material-design-icons-iconfont/dist/material-design-icons";
</style>
