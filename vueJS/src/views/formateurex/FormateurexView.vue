<template>
    <div id="app"  class="container ">
     <h1 class="text-center">formateur ex</h1>
     <b-alert
      :show="dismissCountDown"
      dismissible
      variant="info"
      @dismissed="dismissCountDown=0"

      @dismiss-count-down="countDownChanged"
    >
    <h6 aria-describedby="help-block">  {{alert}}  </h6>

      <b-form-text id="help-block">This alert will dismiss after {{ dismissCountDown }} seconds...</b-form-text>
      <b-progress
        variant="info"
        :max="dismissSecs"
        :value="dismissCountDown"
        height="4px"
      ></b-progress>
    </b-alert>
    <ListerFormateurex :formateurexes="formateurexes" @add="Add" />
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
       dismissSecs: 10,
        dismissCountDown: 0,

    
      alert:'',
   
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
      countDownChanged(dismissCountDown) {
        this.dismissCountDown = dismissCountDown
      },
      showAlert() {
        this.dismissCountDown = this.dismissSecs
      },
      Add(alert){
   console.log(alert);
    if(alert!='none'){
    this.alert=alert;
this.showAlert();
}
this.getformateurex();
},
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
