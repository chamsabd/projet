<template>
  <div>

    <div class="mt-3">
      
    </div>

    <b-modal
      id="modal-prevent-closing"
      ref="modal"
      title="mettre a jour"
      @show="resetModal"
      @hidden="resetModal"
      @ok="handleOk"
     
    >
      <form ref="form" @submit.stop.prevent="update">

      

          
<b-form-group
  label="Score de la certification"
          label-for="score-input"
          invalid-feedback="Le champs doit etre remplie">
           <b-form-input
            label="Score de la certification"
            id="score-input"
            v-model="certif.score"
            :state="isValidScore"
            required
          ></b-form-input>
        </b-form-group>
      </form>
    </b-modal>
  </div>
</template>

<script>
import axios from 'axios'
  export default {
   props:{
        certification:Object

   },
    data() {
      return {
        certif:{
         
          score:'',
        },
       
      
      }
    },
    methods: {

      resetModal() {
       // this.name = '',
        this.score= 0
      },
       handleOk(bvModalEvent) {
        // Prevent modal from closing
        bvModalEvent.preventDefault()
        // Trigger submit handler
        this.update();
      },
    
async update(){
         if (!this.isValidScore) {
          return 
         }

  console.log("ezqgbhhhdcuchnewuhoubi");
          axios({
            method:'put',
            url:'http://localhost:8000/api/certif/'+this.certification.id,
            data:this.certif
          })
         .then((resp) => {

          console.log(resp);
              this.$bvModal.hide('modal-prevent-closing');
                this.$emit('updatecertif',"La mise a jour est faite !");



       }).catch((e) => console.log(e.response));
  

      
       },
        
  
      },
      computed:{
        isValidScore(){
         if (this.certif.score!=undefined)
    return this.certif.score>=0&&this.certif.score<=100;
  else
  return false
           
   },
 
     }
    

  }
</script>