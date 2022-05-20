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
         <b-button pill variant="outline-secondary" @click="details(props.row)">DETAILe</b-button>
        </td>
      </template>
    </datatable>

    </div>
</template>
<script>


import DataTable from "vue-materialize-datatable";


export default {
    name: "ListerFormateurex",
     components: {
 
    datatable: DataTable,

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
    
     // formateurex: {},
    };
  },
 /* methods: {
      showModal(id) {
      this.$bvModal.show(id);
      // this.$refs[id].show()
    }, hideModal(id) {
      this.$bvModal.hide(id);
      // this.$refs[id].show()
    },
  }*/
}
</script>
<style scoped>
@import "~material-design-icons-iconfont/dist/material-design-icons";
</style>
