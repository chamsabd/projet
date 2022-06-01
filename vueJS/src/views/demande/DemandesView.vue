<template>
<div>
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
    <AfficherDemande :d="demandes" @respon="respon"/>
</div>
</template>

<script>
//import axios from "axios";

import axios from "axios";
//import DataTable from "vue-materialize-datatable";
//import ArchiverItem from "@/components/ArchiverItem";
import AfficherDemande from '../../components/demande/afficherDemandes.vue';
export default {
  name: "DemandesView",
  components: {
 AfficherDemande,
  },
  data: function () {
    return {     
      demandes:[],
       dismissSecs: 10,
        dismissCountDown: 0,
        alert:"",

    };
  }, 
   computed:{
form_id(){
  console.log(this.$route.query);
  return this.$route.query.id;
},
role(){
  return this.$route.query.role;
}
  },
  
  mounted() {
   this.getdemandes();
  },
watch: {
 form_id:function () {
  this.getdemandes();
 }
},
    methods: {
       countDownChanged(dismissCountDown) {
        this.dismissCountDown = dismissCountDown
      },
      showAlert() {
        this.dismissCountDown = this.dismissSecs
      },
       respon(alert){
        if(alert!='none'){
    this.alert=alert;
this.showAlert();}
    this.getdemandes();
  },
    async getdemandes() {
      if(this.role!="responsable"){
        this.$router.push("/");
      }
      else{
 await  axios
        .get("http://127.0.0.1:8000/api/demandes/formation/"+this.form_id)
        .then((response) => {
        if (response.data.length==0) {
            this.alert="il n'y a pas de demandes";
this.showAlert();
          }
          else
          this.demandes = response.data;
        })
        .catch((error) => console.log(error.response));
    }}}
};
</script>

<style>
@import "~material-design-icons-iconfont/dist/material-design-icons";

</style>