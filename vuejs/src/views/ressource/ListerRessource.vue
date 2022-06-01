<template>
  <div id="app"  class="container">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">titre</th>
      <th scope="col">download</th>
     <th scope="col" v-if="role=='formateur'">supprimer</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="ressource in ressources" :key="ressource.id">
      <th scope="row">{{ressource.id}}</th>
      <td scope="col">{{ressource.titre}}</td>
      <td scope="col">
        <b-icon icon="download" @click="down(ressource)"></b-icon></td>
<td scope="col" v-if="role=='formateur'"><b-icon icon="x" @click="delet(ressource.id)"></b-icon></td>
    </tr>
 
  </tbody>
</table>
  </div>
</template>

<script>
import axios from "axios";



export default {
  name: "ListerRessource",
  components: {
  
  },
  props: {
 
 
  },
    computed:{
id_formation(){

  return this.$route.query.id;
},
role(){
  return this.$route.query.role;
},
  },
watch: {
 id_formation:function () {
  this.getressources()
 }
},
  data: function () {
    return {
  ressources:[],
  file:File,
    };
  },

   mounted() {
       if(this.role!="formateur" && this.role!="participant"){
        this.$router.push("/");
      }
    this.getressources();
  },
  methods: {
    delet(id){

      axios
        .delete("http://127.0.0.1:8000/api/ressource/"+id)
        .then((response) => {
            if (response.data.length==0) {
  this.$router.push("/");
            }
           this.getressources();
        })
        .catch((error) => console.log(error.response));
  
    },
    down(ressource){
       axios({
    url:"http://127.0.0.1:8000/api/ressource/down/"+ressource.id,
    method: "GET",
    responseType: 'blob', // important
  }).then((response) => {
    console.log(response);
    const url = window.URL.createObjectURL(response.data);
    const link = document.createElement("a");
    link.href = url;
    link.setAttribute("download",ressource.titre);
    document.body.appendChild(link);
    link.click();
    link.remove();
  })

        
        .catch((error) => console.log(error.response));
    },
    async getressources() {
 await  axios
        .get("http://127.0.0.1:8000/api/ressource/"+this.id_formation)
        .then((response) => { 
          console.log(response); 
          this.ressources=response.data;
        })
        .catch((error) => console.log(error.response));
    },
  },
};
</script>

<style>
@import "~material-design-icons-iconfont/dist/material-design-icons";


</style>