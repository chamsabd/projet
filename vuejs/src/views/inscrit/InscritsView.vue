<template>
  <div id="app"  class="container ">
    <h1 class="text-center">les participants</h1>
    <b-alert
      :show="dismissCountDown"
      dismissible
      variant="info"
      @dismissed="dismissCountDown=0"
      @dismiss-count-down="countDownChanged">
    <h6 aria-describedby="help-block"> {{alert}} </h6>
      <b-form-text id="help-block">This alert will dismiss after {{ dismissCountDown }} seconds...</b-form-text>
      <b-progress
        variant="info"
        :max="dismissSecs"
        :value="dismissCountDown"
        height="4px"
      ></b-progress>
    </b-alert>

  <div class="accordion" role="tablist">
    <b-card no-body class="mb-1"  v-for="formation in formations" :key="formation.id">
      <b-card-header header-tag="header" class="p-1" role="tab" v-if="formation.inscrits">
        <b-button  block  v-b-toggle :href="'#id'+formation.id" @click.prevent>
            <b-container class="bv-example-row"  >
  <b-row>
    <b-col>{{formation.titre}}</b-col>
    <b-col>{{formation.date_debut}}</b-col>
  </b-row>
</b-container>
</b-button>
      </b-card-header>
      <b-collapse :id="'id'+formation.id" v-if="formation.inscrits"  accordion="my-accordion" role="tabpanel">
        <b-card-body>
          <lister-inscrit :inscrits="formation.inscrits" @add="Add" />
        </b-card-body>
      </b-collapse>
    </b-card>
  </div>

  </div>
</template>

<script>
import axios from "axios";
import ListerInscrit from '../../components/inscrit/ListerInscrit.vue';

//import ArchiverItem from "@/components/ArchiverItem";








export default {
  name: "InscritsView",
  components: {
    ListerInscrit
    //  ArchiverItem,

     

  },
  data: function () {
    return {
 dismissSecs: 10,
        dismissCountDown: 0,
alert:"",
     formations:[],
   
    };
  },
   computed:{

role(){
  return this.$route.params.role;
}
  },
watch: {
 
},
 
  mounted() {
      if(this.role!="responsable"){
        this.$router.push("/");
      }
    this.getformations();
  },
  methods: {
    async getformations() {
  
 await  axios
        .get("http://127.0.0.1:8000/api/inscrits/formations")
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