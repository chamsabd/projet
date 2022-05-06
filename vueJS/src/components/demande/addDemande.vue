<template>
    
  <div>
      <b-button variant="info" @click="getdemande(id)">Envoyer demande</b-button>
  </div>

</template>
<script>
import axios from "axios";
export default {
  name: 'addDemande',
    props: {
  demande:Object,
  },
  methods: {
   
    getdemande(id) {
      axios.get("http://127.0.0.1:8000/api/demandes/store/"+id).then((response) => {
          this.demandes = response.data;
        })
        .catch((error) => console.log(error.response));
    },
    // deleteitm(id) {
    //   axios
    //     .delete("http://127.0.0.1:8000/api/formation/" + id)
    //     .then((response) => {
    //       if (response.data == true) this.getformations();
    //     })
    //     .catch((error) => console.log(error.response));
    // },
  },
};
</script>
