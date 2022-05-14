<template>
  <div>
    <b-form @submit="onSubmit">
      <b-form-group
        id="input-group-1"
        label="Email address:"
        label-for="input-1"
        description="We'll never share your email with anyone else."
      >
    
        <b-form-input
          id="input-1"
          v-model="form.email"
          type="email"
          placeholder="Enter email"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-2" label="Your Name:" label-for="input-2">
        <b-form-input
          type="password"
          v-model="form.password"
          placeholder="Enter password"
          required
        ></b-form-input>
      </b-form-group>

      <b-button type="submit" variant="primary">Submit</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
    </b-form>
   
  </div>
</template>

<script>
import axios from "axios";

  export default {
    
    data() {
      return {
        form: {
          email: '',
          password: '',
        },
       
      }
    },
    methods: {
      onSubmit() {
     
     //   alert(JSON.stringify(this.form))
        //console.log(this.form.email);
       // console.log(this.form.password);
       axios.get('/sanctum/csrf-cookie').then(response=>{
         console.log(response);
         axios({
         url:"http://127.0.0.1:8000/api/login",
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