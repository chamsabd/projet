<template>
    
  <div>
      <b-button pill variant="outline-warning" @click="senddemande()">send demande</b-button>
  </div>
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
      console.log(this.f);
      // var now=new Date();
      // var date=new Date(now.getFullYear(), now.getMonth(), now.getDate());
      //   //  var fd = new FormData()
        //   fd.append('formation_id',this.f.id);
        //  fd.append('date_demande', date);
        var demande={};
        demande.formation_id=this.f.row.id;
        demande.date_formation=new Date();
      axios(
      {   url: 'http://127.0.0.1:8000/api/demandes/store',
            method: 'post',
            data: demande,
          })
      .then((response) => {
        console.log(response);
          
        })
        .catch((error) => console.log(error.response));
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
