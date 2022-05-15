<template>
  <div id="app"  class="container">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">email</th>
      <th scope="col">ncin</th>
      <th scope="col">role</th>
      <th scope="col">date inscrit</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="inscrit in inscrits" :key="inscrit.pivot.id">
      <th scope="row">{{inscrit.pivot.id}}</th>
      <td scope="col">{{inscrit.email}}</td>
      <td scope="col">{{inscrit.ncin}}</td>
      <td scope="col">{{inscrit.role}}</td>
      <td scope="col">{{inscrit.pivot.date_inscrit}}</td>
      <td scope="col">action</td>
    </tr>
 
  </tbody>
</table>
  </div>
</template>

<script>
import axios from "axios";



export default {
  name: "ListerInscrits",
  components: {
  
  },
  props: {
  inscrits:Array,
 
  },
  data: function () {
    return {
  
    };
  },
  computed: {
 
  },
//    mounted() {
//     this.getinscrits();
//   },
  methods: {
//     async getinscrits() {
//  await  axios
//         .get("http://127.0.0.1:8000/api/inscrit/"+this.formation_id)
//         .then((response) => {
//           this.inscrits = response.data;
//         })
//         .catch((error) => console.log(error.response));
//     },

 

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