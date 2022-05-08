<template>
  <div id="app"  class="container ">
    
   <lister-formation :formations="formations" :role="role"/>
 <b-modal  id="add-modal" size="lg"  centered ok-only><add-formation /> </b-modal>

  </div>
</template>

<script>
import axios from "axios";

import ListerFormation from '../../components/formation/ListerFormation.vue';
import AddFormation from '../../components/formation/AddFormation.vue';
//import ArchiverItem from "@/components/ArchiverItem";



export default {
  name: "FormationsView",
  components: {
    //  ArchiverItem,

   
 
    ListerFormation,
   AddFormation,

  },
  data: function () {
    return {
   


      formations: [],
   
    };
  },
  computed:{
role(){
  return this.$route.params.role;
}  },
 
  mounted() {
    this.getformations();
  },
  methods: {
  
    onAddClick() {
      this.formation = {};
      console.log(this.formation);
      this.showModal("my-modal");
    },
    showModal(id) {
      this.$bvModal.show(id);
      // this.$refs[id].show()
    }, hideModal(id) {
      this.$bvModal.hide(id);
      // this.$refs[id].show()
    },
  
    async getformations() {
 await  axios
        .get("http://127.0.0.1:8000/api/formations")
        .then((response) => {
          this.formations = response.data;
        })
        .catch((error) => console.log(error.response));
    },
    deleteitm(id) {
      axios
        .delete("http://127.0.0.1:8000/api/formation/" + id)
        .then((response) => {
          if (response.data == true) this.getformations();
        })
        .catch((error) => console.log(error.response));
    },
  },
};
</script>

<style>
@import "~material-design-icons-iconfont/dist/material-design-icons";

.formation {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
    font-size: 40px;
    color: rgb(167, 167, 167);
    font-weight: 600;
}

</style>