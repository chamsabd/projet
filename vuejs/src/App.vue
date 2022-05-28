<template>
  <div id="app">

    
    <router-view/>
  </div>
</template>
<script>
import "@/store/index";
  export default {
    name: 'App',

  
  computed:{
    loggedIn() {
      return this.$store.getters.loggedIn;
    }
  }
  }
</script>

<style>

#app {
  font-family: 'Roboto', sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
body {
  margin: 0px;
  padding: 0px;
  box-sizing: border-box;
}
</style>
