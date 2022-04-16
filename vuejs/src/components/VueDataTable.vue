<template>
  <div id="app" class="container">
    <h1 class="text-center">Datatable with Vue</h1>

    <table id="myTable" class="table table-bordered mt-5">
      <thead>
        <tr>
          <th>ID</th>
          <th>User ID</th>
          <th>Title</th>
          <th>Body</th>
        </tr>
      </thead>
       <tbody>
      <tr v-for="user in users" :key="user.id">
        <td>{{user.id}}</td>
        <td>{{user.userId}}</td>
        <td>{{user.title}}</td>
        <td>{{user.body}}</td>
      </tr>
       
    </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";
import $ from "jquery";

export default {
  data: function() {
        return {
            users:[ ]
        }
    },
  mounted() {
    this.getUsers();
  },
  methods: {
    getUsers() {
      axios
        .get("https://jsonplaceholder.typicode.com/posts")
        .then((response) => {
            this.users=response.data;
              $("#myTable").DataTable().clear().destroy();
       this.$nextTick(() => {  $("#myTable").DataTable({
             dom: 'B<"clear">lfrtip',  buttons: ["searchBuilder","searchPanes","colvis", "excel", "print", "csv"],
          });
        })})
        .catch((error) => console.log(error.response));
    },
  },
   
};
</script>

<style></style>