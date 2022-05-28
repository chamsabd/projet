<template>
    <div id="app"  class="container">
      <datatable
      title="formateurexes"
      :columns="tableColumns1"
      :rows="formateurexes"
     
    >
      <th slot="thead-tr">Action</th>
      <template slot="tbody-tr" slot-scope="props">
        
        <td>  
         <b-button pill variant="outline-info" @click="fonctionDetails(props.row)">details</b-button>
        </td>

        <td>  
         <b-button pill variant="outline-warning" @click="editeFormateurex(props.row)">edite</b-button>
        </td>

        <td>  
         <b-button pill variant="outline-danger" @click="SuppFormateurex(props.row.id)">supprimer</b-button>
        </td>

      </template>
    </datatable>
    <DetailsFormateurex :formateurex="formateurex"/>
    <EditeFormateurex :formateurex="formateurex"/>


    </div>
</template>
<script>

//import axios from "axios";
import DataTable from "vue-materialize-datatable";
import DetailsFormateurex from "@/components/formateurex/DetailsFormateurex";
import EditeFormateurex from "@/components/formateurex/EditeFormateurex";
import axios from 'axios';


export default {
    name: "ListerFormateurex",
     components: {
 
    datatable: DataTable,
    DetailsFormateurex,
    EditeFormateurex,

  },
  props: {
  formateurexes:Array,
  },
  data: function () {
    return {
      tableColumns1: [
        {
          label: "nom de formateur",
          field: "nom",
          numeric: false,
          html: false,
        },
        {
          label: "specialite",
          field: "specialite",
          numeric: true,
          html: false,
        },
       
      ],
    
     formateurex: {},
    };
  },
  methods: {
      showModal(id) {
      this.$bvModal.show(id);
    },
    fonctionDetails(row) {
      this.formateurex = row;
      console.log(this.formateurex);
      this.showModal("my-modalDetails");
    },
    editeFormateurex(formateurex){
      console.log(formateurex);
      this.formateurex=formateurex;
      this.showModal("my-modaldelete");
    },
    SuppFormateurex(id){ 
if(!window.confirm('Supprimer ce formateur')) return;
      axios.delete( 'http://127.0.0.1:8000/api/formateurex/'+id)

             .then(response=>this.formateurex=response)

             .catch(error=>console.log(error))
      
     /* axios.delete('http://127.0.0.1:8000/api/formateurex/'+this.formateurex.id)
      .then((response) => {
        if(response.data==1){
          console.log("id",id)
          document.location.reload(true);
        }
      })
      .catch((error)=> console.log(error.response))
     /* axios.delete('http://127.0.0.1:8000/api/formateurex/'+this.formateurexes.id)
      .then(reponse => {
        if(reponse.status == 200){
          this.formateurex
          console.log(id)
        }
      })
      .catch(error =>{
        console.log(error);
      })
      /*axios({
       method: 'put',
       url: 'http://127.0.0.1:8000/api/formateurex/'+this.formateurexes.id,
       data: this.formateurex
       })
      .then((resp) => {
          console.log(resp);
       })
      .catch((e) => console.log(e.response));
      axios.delete('http://127.0.0.1:8000/api/formateurex/' + this.formateurexes.id)
      .then(response =>{
        if(response.status == 200){
          this.row
        }
      })
      .catch(error =>{
        console.log(error)
      })
      axios.delete('http://127.0.0.1:8000/api/formateurex/{$id}').then(response =>{
        if(response.status == 200){
                    let i=this.formateurex.map(data=>data.id).indexOf(id);
                    this.formateurex.splice(i, 1)}
                });

                axios.delete('http://127.0.0.1:8000/api/formateurex/' + this.formateurexes.id)
                .then(response => this.formateurex = response)
                .catch(error => console.log(error))
                 axios
        .delete("http://127.0.0.1:8000/api/formateurex/" + this.id)
        .then((response) => {
          if (response.data == true) this.getformateurex();
        })
        .catch((error) => console.log(error.response));*/
    }
  }
}
</script>
<style scoped>
@import "~material-design-icons-iconfont/dist/material-design-icons";
</style>