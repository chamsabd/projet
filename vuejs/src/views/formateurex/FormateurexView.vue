<template>
    <div id="app"  class="container ">
     <h1 class="text-center">formateur ex</h1>
    <ListerFormateurex :formateurexes="formateurexes" />
    </div>
</template>
<script>

import axios from "axios";
import ListerFormateurex from '../../components/formateurex/ListerFormateurex.vue';

export default {
     name: "FormateurexView",
     components: { 
         ListerFormateurex 
         },
         data: function () {
    return {
      formateurexes: [],
   
    };
  },
     computed:{
role(){
  return this.$route.params.role;
},
  },
watch: {
 role:function () {
  this.getformations();
 }
},
  mounted() {
    this.getformateurex();
  },
   methods: {
    async getformateurex() {
  
 await  axios
        .get("http://127.0.0.1:8000/api/formateurexes")
        .then((response) => {
          this.formateurexes = response.data;
        })
        .catch((error) => console.log(error.response));
    },
   /*showModal(id) {
      this.$bvModal.show(id);
      // this.$refs[id].show()
    }, hideModal(id) {
      this.$bvModal.hide(id);
      // this.$refs[id].show()
    },*/
  
  },
    
}
</script>
<style scoped>

@import "~material-design-icons-iconfont/dist/material-design-icons";
.formateurex {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
    font-size: 40px;
    color: rgb(167, 167, 167);
    font-weight: 600;
}
</style>
