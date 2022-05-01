<template>
  <div id="app" class="container">
    <h1 class="text-center">Datatable with Vue</h1>

    <table id="myTable" class="table table-bordered mt-5">
      <thead>
        <tr>
         
          <th>titre formation</th>
          <th>date debut</th>
          <th>desc</th>
          <th>action</th>
        </tr>
      </thead>
       <tbody>
      <tr v-for="formation in formations" :key="formation.id">
        <td>{{formation.titre}}</td>
        <td>{{formation.date_debut}}</td>
        <td>{{formation.description}}</td>
       <td> 
        
          <b-button pill variant="outline-info">detail</b-button>
  <b-button pill variant="outline-success">modifier</b-button>
   <ArchiverItem :id="formation.id"/>
   </td>
      
      </tr>
       
    </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";
import $ from "jquery";
import  ArchiverItem from "@/components/ArchiverItem"
export default {
   name: 'FormationsView',
   components: {
   ArchiverItem
  },
  data: function() {
        return {
            formations:[ ]
        }
    },
  mounted() {
    this.getformations();
  },
  methods: {
    table(data){

    $('#myTable').DataTable().clear().destroy();

            this.$nextTick(() => {
        $("#myTable").DataTable({
          data:data,

             dom: 'Blfrtip', 
              buttons: ["searchBuilder","searchPanes","colvis", "excel", "print", "csv"],
          });})
       
    },
    getformations() {
      axios
        .get("http://127.0.0.1:8000/api/formations")
        .then((response) => {
            this.formations=response.data;
            this.table();
             })
        .catch((error) => console.log(error.response));
    },
    deleteitm(id){
axios.delete('http://127.0.0.1:8000/api/formation/'+id)
 .then((response) => {
            if(response.data==true)
            this.getformations();
             })
        .catch((error) => console.log(error.response));
    }
  },
   
};
</script>

<style></style>