<template>
    <div class="sidebar">
        <div class="title">
           welcomme
        </div> 
        <b-container>
        <b-row>
        <div class="col-xs-2">  <b-form-select v-model="role" size="sm" >
      
      <b-form-select-option value="responsable">responsable</b-form-select-option>
      <b-form-select-option value="admin" >admin</b-form-select-option>
      <b-form-select-option value="participant" >participant</b-form-select-option>
      <b-form-select-option value="formateur" >formateur</b-form-select-option>
    </b-form-select></div></b-row>
        </b-container> 
        <div class="menu-items">
         
            <router-link to="/" active-class="active" tag="button" exact class="side-btn">
                <div class="link-container">
                   home
                </div>
            </router-link>

             <router-link  :to="{ name: 'FormationsView', params: { role: role }}" active-class="active" tag="button" exact class="side-btn">
                <div class="link-container">
                   formations
                </div>
            </router-link>
  <router-link v-if="role=='admin'" :to="{ name: 'FormateurexView', params: { role: role }}" active-class="active" tag="button" exact class="side-btn">
                <div class="link-container">
                   les formateur externe
                </div>
            </router-link>
            <router-link v-if="role=='responsable'" :to="{ name: 'InscritsView', params: { role: role }}" active-class="active" tag="button" exact class="side-btn">
                <div class="link-container">
                   les participants
                </div>
            </router-link>
             <router-link v-if="role=='responsable'" :to="{ name: 'Certifview', params: { role: role }}" active-class="active" tag="button" exact class="side-btn">
                <div class="link-container">
                   les certifications
                </div>
            </router-link>
      <!-- <router-link disabled to="#" class=" side-btn-haschildren" tag="button" exact >
                 <div class="link-container">admin</div></router-link>
             <router-link :to="`/formations/${'admin'}`" active-class="active" tag="button" exact class="side-btn">
                <div class="link-container">
                   formations
                </div>
            </router-link>   <router-link disabled to="#" class=" side-btn-haschildren" tag="button" exact >
                 <div class="link-container">participant</div></router-link>
             <router-link :to="`/formations/${'participant'}`" active-class="active" tag="button" exact class="side-btn">
                <div class="link-container">
                   formations
                </div>
            </router-link> -->
  
        </div>
    </div>
</template>

<script>
export default {
     name: "SideBar",
      data: function () {
    return {
        role:this.$route.params.role?this.$route.params.role:this.$route.query.role?this.$route.query.role:"participant",
    }},
     computed: {
        
     }
     ,watch: {
 role:function () {
     var r=this.$route.path;
  
    
      if (this.$route.params.role!=undefined) {
           r= r.replace(this.$route.params.role, this.role);
     console.log(r);
 this.$router.push(r);
      }
      else {
         if (this.$route.path != '/') {
    this.$router.push("/");
}
           
      }
   
 
 }},

}
</script>

<style scoped>
.sidebar::-webkit-scrollbar { width: 0 !important }
.sidebar{
    overflow: -moz-scrollbars-none;
  -ms-overflow-style: none;
   scrollbar-width: none;
  overflow: scroll;
}
.title {
    color: white;
    font-size: 24px;
    margin-top: 10px;
}
.menu-items {
    display: flex;
     
    flex-direction: column;
    margin-top: 40px;
    margin-left: 6px;
}
.menu-items > * {
    margin-top: 60px;
}
.side-btn {
    border: none;
    padding: 15px 0px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 500;
    color: white;
    background-color: transparent;
}
.side-btn-haschildren {
    border: none;
    padding: 16px 0px;
    margin-left: -100px;
    cursor: pointer;
    font-size: 20px;
    font-weight: 500;
    color: rgb(36, 22, 22);
    background-color: transparent;
}
.side-btn:focus {
    outline: none;
}
.side-btn.active {
    position: relative;
    background-color: white;
    color: teal;
    font-weight: 600;
    margin-left: 10px;
    border-radius: 30px 0 0 30px;
}
.side-btn.active::before {
    top: -30px;
}
.side-btn.active::after {
    bottom: -30px;
}
.side-btn.active::before, .side-btn.active::after {
    position: absolute;
    content: "";
    right: 0;
    height: 30px;
    width: 30px;
    background-color: white;
}
.side-btn.active .link-container::before {
    top: -60px;
}
.side-btn.active .link-container::after {
    bottom: -60px;
    z-index: 99;
}
.side-btn.active .link-container::before, .side-btn.active .link-container::after {
    position: absolute;
    content: "";
    right: 0px;
    height: 60px;
    width: 60px;
    border-radius: 50%;
    background-color: teal;
}
</style>