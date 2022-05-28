<template>
<b-modal  id="my-modaldelete" size="lg"  centered ok-only >
 <form ref="my-modal2form" @submit.stop.prevent="submitEditeforex">   
     <div>
         <b-form-group id="input-group-2" label="email:" label-for="input-2">
         <b-form-input
          id="input-1"
          v-model="formateurexes.email"
          type="email"
          required
        ></b-form-input>
        </b-form-group>
         <b-form-group id="input-group-2" label="nom:" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="formateurexes.nom"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="prenom:" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="formateurexes.prenom"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="specialite:" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="formateurexes.specialite"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="ncin:" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="formateurexes.ncin"
          required
        ></b-form-input>
      </b-form-group>
    
  </div>
  <div>
    <button type="submit" class="btn btn-primary" data-dismiss="modal">edite</button>
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
                         
                        
                          formateurexes:{},
                         
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
       data: this.formateurexes
       })
      .then((resp) => {
          console.log(resp);
       })
      .catch((e) => console.log(e.response));


    }
  }, 
 
  
}
</script>
