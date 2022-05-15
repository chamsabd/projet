<template>
  <div id="app"  class="container ">
    <h1 class="text-center">formation</h1>
    <b-alert
      :show="dismissCountDown"
      dismissible
      variant="info"
      @dismissed="dismissCountDown=0"
      @dismiss-count-down="countDownChanged">
    <h6 aria-describedby="help-block"> le formation  est ajouter avec success a la fin de table</h6>
      <b-form-text id="help-block">This alert will dismiss after {{ dismissCountDown }} seconds...</b-form-text>
      <b-progress
        variant="info"
        :max="dismissSecs"
        :value="dismissCountDown"
        height="4px"
      ></b-progress>
    </b-alert>
<div  class="accordion" role="tablist">
    <b-card no-body class="mb-1" v-for="formation in formations" :key="formation.id">
      <b-card-header v-if="formation.inscrits" header-tag="header" class="p-1" role="tab">
          <b-container class="bv-example-row" block v-b-toggle.formation.id>
  <b-row>
    <b-col>{{formation.titre}}</b-col>
    <b-col>{{formation.date_debut}}</b-col>
  </b-row>
</b-container>
          </b-card-header>
      <b-collapse :id="formation.id"  accordion="my-accordion" role="tabpanel">
        <b-card-body>
          <b-card-text>I start opened because <code>visible</code> is <code>true</code></b-card-text>
        </b-card-body>
      </b-collapse>
    </b-card>  
  </div>
  </div>
</template>

<script>
import axios from "axios";

//import ArchiverItem from "@/components/ArchiverItem";








export default {
  name: "InscritsView",
  components: {
    //  ArchiverItem,

     

  },
  data: function () {
    return {
   
 dismissSecs: 10,
        dismissCountDown: 0,

     formations:[],
   
    };
  },
  computed:{

  },
watch: {
 
},
 
  mounted() {
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