<template>
  <div role="group">
    <form @submit.prevent="submit">
    <label for="input-live">Nom:</label>

    <b-form-input
      id="input-live"
      v-model="user.nom"
      :state="nameState"
      aria-describedby="input-live-help input-live-feedback"
      placeholder="Enter your name"
      required
      trim
    ></b-form-input>
     <label for="input-live">Prenom:</label>
    <b-form-input
      id="input-live"
      v-model="user.prenom"
      aria-describedby="input-live-help input-live-feedback"
      placeholder="Enter your name"
      trim
      required
    ></b-form-input>
 <label for="input-live">Numero de Carte d'identite :</label>
    <b-form-input
      id="input-live"
      v-model="user.cin"
      :state="nameState"
      aria-describedby="input-live-help input-live-feedback"
      placeholder="Enter your name"
      trim
      required
    ></b-form-input>

     <label for="input-live">Email :</label>
    <b-form-input
      id="input-live"
      v-model="user.email"
      type="email"
      :state="nameState"
      aria-describedby="input-live-help input-live-feedback"
      placeholder="Enter your name"
      required
      trim
    ></b-form-input>
         <label for="input-live">Vous etes  :</label>
<b-form-select v-model="selected" :options="options" class="mb-3">
      <!-- This slot appears above the options from 'options' prop -->
      <!-- These options will appear after the ones from 'options' prop -->
      <b-form-select-option value="e">Etudiant </b-form-select-option>
      <b-form-select-option value="f">Formateur</b-form-select-option>
      <b-form-select-option value="r">Responsable</b-form-select-option>
    </b-form-select>

    <div class="mt-3">Selected: <strong>{{ selected }}</strong></div>
    <!-- This will only be shown if the preceding input has an invalid state -->
 <label for="input-live">Entrez un mot de passe :</label>
    <b-form-input
      id="input-live"
      v-model="user.password"
      :state="nameState"
      aria-describedby="input-live-help input-live-feedback"
      placeholder="Enter your password"
      type="password"
      trim
      required
    ></b-form-input>
    <br>
    <br>

      <b-button type="submit" variant="primary">Submit</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
    <!-- This is a form text block (formerly known as help block) -->
    </form>
      </div>

</template>

<script>
import axios from 'axios'
  export default {
    computed: {
      nameState() {
        return this.user.nom.length > 2 ? true : false
      }
    },
    data() {
      return {
        selected:null,
        options: [
          { value: 'e', text:'etudiant' },
          { value: 'f', text: 'formateur' },
          { value: 'r', text: 'responsable' }
        ],
        user:{
    nom: '',
        cin: '',
        password:"",
        prenom:'',
        email:'',
        }
      
      }
    },
    methods:{
      submit(){
        console.log(this.user);
         axios.get('/sanctum/csrf-cookie').then(response=>{
         console.log(response);
         axios({
         url:"http://127.0.0.1:8000/api/register",
         method:"post",
         data:this.form
       }).then (reponse=>{
        console.log(reponse);
      })
       })
      }
    }
  }
</script>