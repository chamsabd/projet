<template>
    
 
      <b-button pill variant="outline-warning" @click="senddemande()">send demande</b-button>
 
</template>
<script>
import axios from "axios";
export default {
  data: function(){
    return{
 
    }
  },
  props:{
    f:Object,
  },
  methods:{
    senddemande() {
       if(this.role!="participant"){
        this.alert="vous n'etes pas participant";
this.showAlert();
      }
   else{
        var demande={};
        demande.formation_id=this.f.row.id;
        demande.date_demande=(new Date()).toISOString().split('T')[0];
        
      axios(
      {   url: 'http://127.0.0.1:8000/api/demandes/store',
            method: 'post',
            data: demande,
          })
      .then(() => {
         var alert="la demande est envoyer avec success"
  this.$emit('add',alert);
          
        })
        .catch((error) => {
          console.log(error.response.data.message)
          });}
    },
    // deleteitm(id) {
    //   axios
    //     .delete("http://127.0.0.1:8000/api/demandes/" + id)
    //     .then((response) => {
    //       if (response.data == true) this.getdemandes();
    //     })
    //     .catch((error) => console.log(error.response));
    // },
  },
};
</script>
