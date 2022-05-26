<template>
<certif-list :certifications="certifications"> </certif-list>
</template>
<script>
import CertifList from '@/components/Certification/CertifList'
import axios from 'axios'
export default {
  components:
   { CertifList,
    },
   data(){
       return{
         certifications:[],
       }
   },
    mounted() {
    this.getCertifications();
  },
   methods:{
     async getCertifications(){
		await axios.get("http://127.0.0.1:8000/api/certif/list")
            .then((response) => {
          this.certifications = response.data;
          ///console.log (this.certifications);
        })
        .catch((error) => console.log(error.response));
    },


    }
        
   
}
</script>