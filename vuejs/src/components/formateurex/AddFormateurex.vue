<template>
 <div id="app"  class="container">
    <form  @submit.stop.prevent="addformateurex">
     <input type=" number" v-model="formateurex.ncin" />
     <input type="email" v-model="formateurex.email" />
     <input type=" text" v-model="formateurex.nom" />
     <input type=" text" v-model="formateurex.prenom" />
     <input type=" text" v-model="formateurex.specialite" />
     <div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
     </form >
    

    <div>
        <h1>hello </h1>
    </div>
 </div>

</template>
<script>
import axios from 'axios';


export default{
     name: "AddFormateurex",
     data: function(){
         return{
             formateurex:{
                 ncin:"",
                 email:"",
                 nom:"",
                 prenom:"",
                 specialite:""

             }
         }
     },
     methods:{
         addformateurex(){
             if(this.formateurex.nom == ''){
                 return;
             }
             axios.post('http://127.0.0.1:8000/api/formateurex/store',{
                 formateurex: this.formateurex
             })
             .then(response=>{
                 if(response.status == 201){
                     this.formateurex.nom == "";
                 }

             })
             .catch(error=>{
                 console.log(error);

             })
         }

     }

}
</script>
