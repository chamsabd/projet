<template>
<b-modal  id="my-modaldelete" size="lg"  centered ok-only >
 <form ref="my-modal2form" @submit.stop.prevent="submitEditeforex">   
     <div>
    
  </div>
  <div>
    <button type="submit" class="btn btn-primary">edite</button>
  </div>

</form>
</b-modal>
    
</template>
<script>
import axios from "axios";
export default {
      name: 'EditeFormateurex',
        data(){
                
                return{
                         
                        
                          formateurexT:{},
                         
                }
        },
         props: {
  formateurex:Object,
  },
  methods:{

    async submitEditeforex (){
      console.log("ediiit")
      axios({
       method: 'put',
       url: 'http://127.0.0.1:8000/api/formateurex/'+this.formateurex.id,
       data: this.formateurexT
       })
      .then((resp) => {
          console.log(resp);
       })
      .catch((e) => console.log(e.response));


    }
  }, 
 
  
}
</script>
