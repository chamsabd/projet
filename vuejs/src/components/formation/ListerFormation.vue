<template>
  <div id="app"  class="container">
    

    <datatable
      title="formations"
      :customButtons="customButtons"
      :columns="tableColumns1"
      :rows="formations"
    >
      <th slot="thead-tr">Etat</th>
      <th slot="thead-tr">Actions</th>

      <template slot="tbody-tr" slot-scope="props">
        <td>
        
             <b-badge pill variant="success" v-if="props.row.etat == 0">overte</b-badge>
  <b-badge pill variant="danger" v-else>fermer</b-badge>
          
         
        </td>
        <td>
          <b-button pill variant="outline-info" @click="onRowClick(props.row)">details</b-button>
         <b-button pill variant="outline-warning" v-if="role=='responsable'" :d="d" @click="getDemandeByFormation(props.row.id)">afficher demandes</b-button>

           <b-button v-if="role=='admin' " pill variant="outline-info" @click="modifFormation(props.row)">modif</b-button>
        <b-button pill variant="outline-info" v-if="role=='formateur' && props.row.etat == 0" @click="AjoutCour(props.row)">ajouter cours</b-button>
        <b-button pill variant="outline-info" v-if="role=='formateur' || role=='participant' && props.row.etat == 0 && props.row.accepted==true" @click="ListerCour(props.row)">lister cours</b-button>
       
        </td>
        <td>  
          <add-demande v-if="role=='participant' && props.row.send==true && props.row.etat == 0" @add="Add" :f="props" />
            <b-button pill variant="outline-success" v-if="role=='participant' && props.row.accepted==false && props.row.send==false">demande sended </b-button>
      <b-button pill variant="outline-success" v-if="role=='participant' && props.row.accepted==true">demande accepter </b-button>
      </td>
      
      </template>
    </datatable>
      <b-modal  id="my-modal" size="lg" title="add formation"  centered ok-only>
          <formation-details :formation="formation"/>
       </b-modal>


<add-ressource :formation="formation"  @add="Add"/>
        <add-formation v-if="role=='admin'" @add="Add" :modformation="modformation" />

       
  </div>
</template>

<script>
import axios from "axios";

import DataTable from "vue-materialize-datatable";
import FormationDetails from './FormationDetails.vue';
//import ArchiverItem from "@/components/ArchiverItem";
import AddDemande from "@/components/demande/addDemande.vue";
// import AfficherDemandes from "@/components/demande/afficherDemandes.vue";
import AddFormation from '../../components/formation/AddFormation.vue';

import AddRessource from '../ressource/AddRessource.vue';

export default {
  name: "ListerFormations",
  components: {
    //  ArchiverItem,

 AddFormation,
    datatable: DataTable,
    FormationDetails,
    AddDemande,

    AddRessource,

    // AfficherDemandes,
  },
  props: {
  formations:Array,
  role:String,
  //  d:Object,
  },
  data: function () {
    return {
     d:{},
      //demandes:[],

      tableColumns1: [
        {
          label: "titre de formation",
          field: "titre",
          numeric: false,
          html: false,
        },
        {
          label: "date debut",
          field: "date_debut",
          numeric: true,
          html: false,
        },
        {
          label: "description",
          field: function f(fo) {
            if (fo.description) {
              return fo.description.toString().substring(0, 20) + "…";
            } else {
              return "pas de description";
            }
          },
          numeric: false,
          html: false,
        },
      ],

   
      formation: {},
      modformation:{}
    };
  },
  computed: {
    customButtons() {
      return this.role == 'admin'
        ? [
            {
              hide: false, // Whether to hide the button
              icon: "add", // Materialize icon
              onclick: this.onAddClick, // Click handler
            },
          ]
        : [];
    },
  },
  methods: {
    Add(alert){
      
   this.$emit('add',alert);
  },
  
    modifFormation(row){
     this.modformation=row; 
     console.log(this.formation);
 this.showModal("add-modal");
    },
    onAddClick() {
    this.formation={
        'titre':null,
        'nbr_place':null,
        'description':null,
        'date_debut':null,
        'responsable_id':null,
        'date_fin':null,
        'prix':0,
        'etat':true
      },
      this.showModal("add-modal");
    },
    showModal(id) {
      this.$bvModal.show(id);
      // this.$refs[id].show()
    }, hideModal(id) {
      this.$bvModal.hide(id);
      // this.$refs[id].show()
    },
    onRowClick(row) {
      this.formation = row;
      console.log(this.formation);
      this.showModal("my-modal");
    },
    AjoutCour(row){
this.formation = row;
 this.showModal("ressource-modal");
    },
ListerCour(row){

this.$router.push({ path: `/ressource`,query: { 
            id:row.id,
            role: this.role
        }  });
},
    deleteitm(id) {
      axios
        .delete("http://127.0.0.1:8000/api/formation/" + id)
        .then((response) => {
          if (response.data == true) this.getformations();
        })
        .catch((error) => console.log(error.response));
    },

    getDemandeByFormation(id) {
   
this.$router.push({ path: `/demandes`,query: { 
            id: id,
            role: this.role
        } });
    },
  },
};
</script>

<style>
@import "~material-design-icons-iconfont/dist/material-design-icons";
</style>