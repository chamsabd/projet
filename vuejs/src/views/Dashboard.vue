<template>
    <div class="dashboard">
        <SideBar/>
        <div class="content">
            <router-view :key="$route.path"/>
        </div>

        <b-button v-if="loggedIn" text key="Logout" @click="logout" class="btn btn-info btn-lg">
          Logout
        </b-button>
       

    </div>
    
</template>

<script>
import SideBar from '../components/SideBar'
import "@/store/index";
export default {
    name: 'HomeView',
    components: {
        SideBar
    },

    computed:{
       
loggedIn() {
            return this.$store.getters.loggedIn;
                }
    },
        methods: {
        logout() {
            this.$store.dispatch("logout").then(() => {
                this.$router.push("/login");
            });
        }
}
}
</script>

<style>
.content::-webkit-scrollbar { width: 0 !important }

.dashboard {
   
    display: grid;
    grid-template-columns: 1fr 5fr;
    background-color: teal;
    height: 100vh;
    width: 100vw;
  
}
.content {
      overflow: -moz-scrollbars-none;
  -ms-overflow-style: none;
   scrollbar-width: none;
  overflow: scroll;
    background-color: white;
    border-radius: 10px;
    margin: 6px 6px 6px 0px;
}
</style>