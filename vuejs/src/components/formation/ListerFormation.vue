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
           
  <td><!--@click="consulterSeances(props.row)"-->
          <b-button pill variant="outline-info" 
          
           :to="{name:'ContainerSeances' ,
                params:{id:props.row.id , name:props.row.titre} }"
                >Gérer Seances
          </b-button>
        </td>
      
        <td>
          <b-button pill variant="outline-info" @click="onRowClick(props.row)">details</b-button>
         <b-button pill variant="outline-warning" v-if="role=='responsable'" :d="d" @click="getDemandeByFormation(props.row.id)">afficher demandes</b-button>

           <b-button v-if="role=='admin' " pill variant="outline-info" @click="modifFormation(props.row)">modif</b-button>
        

        </td>
        <td>  
             
          <add-demande v-if="role=='participant' && props.row.send==true && props.row.etat == 0" @add="Add" :f="props" />
            <b-button pill variant="outline-success" v-if="role=='participant' && props.row.send==false">demande sended </b-button></td>

             <b-button v-if="role.participant" pill variant="outline-warning">send demande</b-button>
          <add-demande :f="props" /></td>
        
      

      </template>
    </datatable>
      <b-modal  id="my-modal" size="lg" title="add formation"  centered ok-only>
          <formation-details :formation="formation"/>
       </b-modal>



        <add-formation v-if="role=='admin'" @add="Add" :modformation="modformation" />

      <!-- <liste-seances />-->
      
       

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

//import containerSeances from "@/views/Seance/containerSeances.vue";
//import ListeSeances from '../seances/ListeSeances.vue';
//import AfficherDetailsSeance from '../seances/AfficherDetailsSeance.vue';


export default {
  name: "ListerFormations",
  components: {
    //  ArchiverItem,

 AddFormation,
    datatable: DataTable,
    FormationDetails,
    AddDemande,

    // AfficherDemandes,

  //  ListeSeances,
  //  containerSeances
   // AddSeance

  },
  props: {
  formations:Array,
  role:String,
  //  d:Object,
  },
  data () {
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

    deleteitm(id) {
      axios
        .delete("http://127.0.0.1:8000/api/formation/" + id)
        .then((response) => {
          if (response.data == true) this.getformations();
        })
        .catch((error) => console.log(error.response));
    },


    getDemandeByFormation(id) {
      console.log(id);

    consulterSeances(id){
      console.log(id);

    }

    // getDemande(id){

    // var demande={};
    //     demande.formation_id=this.d.row.id;
        
    //   axios(
    //   {   url: 'http://127.0.0.1:8000/api/demandes/'+id,
    //         method: 'get',
    //         data: demande,
    //       })
    //   .then((response) => {
    //     console.log(response);
          
    //     })
     axios.get("http://127.0.0.1:8000/api/demandes/formation/" +id)
    .then((response) => {
      this.d = response.data;
      console.log(this.d);
      window.location.href = '/demande';
    })
    .catch((error) => console.log(error.response));
    },
  },
};
</script>

<style>
@import "~material-design-icons-iconfont/dist/material-design-icons";
</style>