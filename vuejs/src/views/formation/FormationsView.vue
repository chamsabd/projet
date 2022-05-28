<template>
  <div id="app"  class="container ">
    <h1 class="text-center">formation</h1>
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
   <lister-formation :formations="formations" @add="Add" :role="role"/>
  </div>
</template>

<script>
import axios from "axios";

import ListerFormation from '../../components/formation/ListerFormation.vue';

//import ArchiverItem from "@/components/ArchiverItem";
//import afficherDemandes from "@/components/demande/afficherDemandes.vue";






export default {
  name: "FormationsView",
  components: {
    //  ArchiverItem,


   
 
    ListerFormation,

  },
  data: function () {
    return {
   
 dismissSecs: 10,
        dismissCountDown: 0,

      formations: [],
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
    this.getformations();
  },
  methods: {
    async getformations() {
 await  axios
        .get("http://127.0.0.1:8000/api/"+this.role+"/formations")
        .then((response) => {
          this.formations = response.data;
   
        })
        .catch((error) => console.log(error.response));
    },
     countDownChanged(dismissCountDown) {
        this.dismissCountDown = dismissCountDown
      },
      showAlert() {
        this.dismissCountDown = this.dismissSecs
      },
  Add(alert){
   
    if(alert!='none'){
    this.alert=alert;
this.showAlert();
}

 this.getformations();

  },
    onAddClick() {
      this.formation = {};
      console.log(this.formation);
      this.showModal("my-modal");
    },
    showModal(id) {
      this.$bvModal.show(id);
      // this.$refs[id].show()
    }, hideModal(id) {
      this.$bvModal.hide(id);
      // this.$refs[id].show()
    },
  
   
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

.formation {
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