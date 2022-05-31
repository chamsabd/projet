<template>
<!-- @addSeance="addSeance" -->
    <div>
        
        <div>
           &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
           <b-button @click="toogleModale" 
      pill
      variant="outline-success"
      class=" float-end"
      ><i class="bi bi-plus-circle my-3"></i
    ></b-button>
    <add-seance :revele="revele"
         :toogleModale="toogleModale"
         :to="{name:'AddSeance' ,params:{id:this.$route.params.id}}"
        ></add-seance>
    
     </div>
    </div>
</template>
<script>
import axios from 'axios' ;
import AddSeance from './AddSeance.vue'
export default {
    name:'conetnue-c',
    data(){
            return{
                revele: false,
                seances: {},
            }
        },
    components:{
        'add-seance':AddSeance,
        
    }, created(){
      // var vm=this;
       axios.get('http://127.0.0.1:8000/api/seances')
      .then(response =>this.seances=response.data)
      .catch(error => console.log(error));

},
    methods:{
        toogleModale(){
            this.revele= !this.revele
        } ,
       
    },
  /*  addSeance(a){
console.log(a)
    }*/
    
}




</script>