<template>
    
  <div>
      <b-button variant="info" @click="getdemande()">Envoyer demande</b-button>
  </div>

</template>
<script>
import axios from "axios";
export default {
  data: function(){
    return{
    demandes: {
      utilisateur_id:Number,
      formation_id:Number,
    }
    }
  },
  methods: {
   
    getdemande() {
      axios.post("http://127.0.0.1:8000/api/demandes/store",{
      demandes: this.demandes
      })
      .then((response) => {
        console.log(response.status)
          this.demandes = response.data;
          this.$emit('reloadlist');
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
