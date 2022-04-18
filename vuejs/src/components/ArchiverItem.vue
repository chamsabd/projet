<template>
    <b-button pill @click="deleteitm(id)" variant="outline-danger">supprimer</b-button> 
</template>
<script>
import axios from "axios";
//import $ from "jquery";
export default {
  name: 'ArchiverItem',
  props: {
   id:Number,
  },
  methods: {

    deleteitm(id){
axios.delete('http://127.0.0.1:8000/api/formation/'+id)
 .then((response) => {
            if(response.data==1){
 console.log("id",id);
        //    this.getformations();
        document.location.reload(true);
        }
             })
        .catch((error) => console.log(error.response));
    }
  },
}
</script>

<style>

</style>