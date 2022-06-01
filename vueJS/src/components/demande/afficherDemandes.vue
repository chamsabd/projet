<template>
  <div id="app" class="container">
    <h1 class="text-center">demandes</h1>

      <datatable
      title="Basic table"
      :columns="tableColumns1"
      :rows="d"
      >
   <th slot="thead-tr">refuse</th>
   <th slot="thead-tr">accept</th>
<!--  -->
      <template slot="tbody-tr" slot-scope="props">
        <td v-if="props.row.pivot.accepted==false">
          <b-button variant="danger" @click="showMsgBoxTwo(props.row.pivot.id,'refuse')"> refuse <b-iconstack >
      <b-icon stacked icon="square"></b-icon>
      <b-icon stacked icon="x"></b-icon>
    </b-iconstack></b-button>
</td> <td v-if="props.row.pivot.accepted==false">

  <b-button variant="success"  @click="showMsgBoxTwo(props.row.pivot.id,'accept')">accept <b-iconstack >
      <b-icon stacked icon="square"></b-icon>
      <b-icon stacked icon="check"></b-icon>
    </b-iconstack></b-button>     
         </td>
         <td></td>
         <td v-if="props.row.pivot.accepted==true">
       accepter        
         </td>
          </template>

    </datatable>
  </div>
</template>
<script>
import axios from "axios";
import DataTable from "vue-materialize-datatable";
// import addDemande from './addDemande.vue';
export default {
  // components: { 
  //   addDemande },
  name: 'afficherDemande',
    components: {
    datatable: DataTable,

  },
  props: {
    d:Array
  },
 data: function () {
    return {
 
      tableColumns1: [
       {
          label: "email utilisateur",
          field: "email",
          numeric: false,
          html: false,
        },
        {
          label: "date demande",
          field: "pivot.created_at",
          numeric: true,
          html: false,
        },
       
      ],

    
      //demande: {},
    };
  },
 
  methods: {
refuse(id){
  //delet demande
  //send email
       axios
        .get("http://127.0.0.1:8000/api/demandes/refuse/" + id)
        .then((response) => {
        this.$emit('respon',response.data);
        })
        .catch((error) => console.log(error.response));
  console.log(id);
 
      // axios
      //   .put("http://127.0.0.1:8000/api/demandes/refuse" + id)
      //   .then((response) => {
      //     if (response.data == true) 
       
      //   })
      //   .catch((error) => console.log(error.response));
    
},
accept(id){
  //add demande to inscrit 
  //change nbr place -1
  //send email
  //delet demande
    axios
        .get("http://127.0.0.1:8000/api/demandes/accepte/" + id)
        .then((response) => {
         
              this.$emit('respon',response.data);
          
       
        })
        .catch((error) => console.log(error.response));
  
console.log(id);
},
 showMsgBoxTwo(id,action) {
       
        this.$bvModal.msgBoxConfirm('Please confirm that you want to '+action+' this demande.', {
          title: 'Please Confirm',
          size: 'sm',
          buttonSize: 'sm',
          okVariant: 'danger',
          okTitle: 'YES',
          cancelTitle: 'NO',
          footerClass: 'p-2',
          hideHeaderClose: false,
          centered: true
        })
          .then(value => {
            // console.log("value ",value);
          if(value==true){
            if(action=="accept")
            this.accept(id);
            else
            this.refuse(id);
          }
          })
          .catch(err => {
            console.log(err);
            // An error occurred
          });
        
          
      },
  },
};
</script>