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
      @ok="update"
    >
      <form ref="form" @submit.prevent="update">

        <b-form-group
          label="Nom de la certification"
          label-for="name-input"
          invalid-feedback="Le champs doit etre remplie"
        >
        <br>

          <b-form-input
          label="Nom de la certification"
            id="name-input"
            v-model="certif.name"
            required
          ></b-form-input>
          <br>
           <b-form-input
            label="Score de la certification"
            id="score-input"
            v-model="certif.score"
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
     row:Object
   },
    data() {
      return {
        certif:{
        name: '',
        score:0,
        }
      
      }
    },
    methods: {

      resetModal() {
        this.name = '',
        this.score= 0
      },
     update(){
       axios.put('/http://127.0.0.1:8000/api/certif/update'+this.row.id,this.certif)
        .then(response => {
          console.log(response.data)
          this.$emit('update')
        })
     }
    
    }
  }
</script>