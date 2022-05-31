<template>
<div>
   <b-alert
      :show="dismissCountDown"
      dismissible
      variant="info"
      @dismissed="dismissCountDown=0"
      @dismiss-count-down="countDownChanged"
    >
    <h6 aria-describedby="help-block">  {{alert}}</h6>
      <b-form-text id="help-block">This alert will dismiss after {{ dismissCountDown }} seconds...</b-form-text>
      <b-progress
        variant="info"
        :max="dismissSecs"
        :value="dismissCountDown"
        height="4px"
      ></b-progress>
    </b-alert>
    <certif-list @updatecertif="updatecertif" :certifications="certifications"> </certif-list>

    </div>
</template>
<script>
import CertifList from '@/components/Certification/CertifList'
import axios from 'axios'
export default {
  name:"CertifView",
  components:
   { CertifList,
    },
   data(){
       return{
         certifications:[],
         dismissSecs: 10,
        dismissCountDown: 0,
        alert:'',
       }
   },
    mounted() {
    this.getCertifications();
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
   methods:{
     async getCertifications(){
 if(this.role!="responsable"){
        this.$router.push("/");
      }
      else{
		await axios.get("http://127.0.0.1:8000/api/certif/list")
            .then((response) => {
          this.certifications = response.data;
          ///console.log (this.certifications);
        })
        .catch((error) => console.log(error.response));}
    },

    updatecertif(alert){
      this.getCertifications();
      this.showAlert();
  this.alert=alert;
    },countDownChanged(dismissCountDown) {
        this.dismissCountDown = dismissCountDown
      },
         showAlert() {
        this.dismissCountDown = this.dismissSecs
      },
    }
     


    
        
   
}
</script>