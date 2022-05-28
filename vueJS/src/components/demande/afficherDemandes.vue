<template>
  <div id="app" class="container">
    <h1 class="text-center">Datatable with Vue</h1>

      <datatable
      title="Basic table"
      :columns="tableColumns1"
      :rows="d"
      >
   <th slot="thead-tr">refuse</th>
   <th slot="thead-tr">accept</th>
<!--  -->
      <template slot="tbody-tr" slot-scope="props">
        <td>
          <b-button variant="danger" @click="refuse(props.row.pivot.id)">   refuse <b-iconstack >
      <b-icon stacked icon="square"></b-icon>
      <b-icon stacked icon="x"></b-icon>
    </b-iconstack></b-button>
</td> <td>

  <b-button variant="success"  @click="accept(props.row.pivot.id)">  accept <b-iconstack >
      <b-icon stacked icon="square"></b-icon>
      <b-icon stacked icon="check"></b-icon>
    </b-iconstack></b-button>
       
        
         </td>
          </template>

    </datatable>
  </div>
</template>
<script>
import axios from "axios";
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
refuse(id){
  //delet demande
  //send email
       axios
        .get("http://127.0.0.1:8000/api/demandes/refuse/" + id)
        .then(() => {
        this.$emit('respon',"demande refuser");
        })
        .catch((error) => console.log(error.response));
  console.log(id);
 
      // axios
      //   .put("http://127.0.0.1:8000/api/demandes/refuse" + id)
      //   .then((response) => {
      //     if (response.data == true) 
       
      //   })
      //   .catch((error) => console.log(error.response));
    
},
accept(id){
  //add demande to inscrit 
  //change nbr place -1
  //send email
  //delet demande
    axios
        .get("http://127.0.0.1:8000/api/demandes/accepte/" + id)
        .then(() => {
        
        this.$emit('respon',"demande accepter");
        })
        .catch((error) => console.log(error.response));
  
console.log(id);
}
  },
};
</script>