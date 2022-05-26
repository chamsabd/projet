<template>
  <div id="app"  class="container">
    
<h1>Liste des certifications </h1>
    <datatable
      title="Certifications"
    :columns="tableColumns1"
      :rows="certifications"
         >
	<th slot="thead-tr">Actions</th>
	
		<template slot="tbody-tr" slot-scope="props">
		<td>
	<b-button v-b-modal.modal-prevent-closing variant="outline-success" @click="ClickRow(props.row)">Mettre à jour </b-button>
	</td>
		</template>
	
    </datatable>
<update-certif></update-certif>


  </div>
     </template>
   
   <script>
    import DataTable from "vue-materialize-datatable";
	import UpdateCertif from '@/components/Certification/UpdateCertif'

    export default {
        
       components: {
	UpdateCertif,
    datatable: DataTable
   
  },
 props: {
  certifications:Array,
  row:{}
  },
     data: function () {
    return {
  certification:{},

        tableColumns1: [
			{
				label: "Nom de la certification",
				field: "nom",
				numeric: false,
				html: false
			},
      {
				label: "Score",
				field: "score",
				numeric: true,
				html: false
			},
      {
				label: "Date de La certification",
				field: "updated_at",
				numeric: true,
				html: false
			},
			{
				label: "Nom de la Formation",
				field: "formation.titre",
				numeric: false,
				html: false
			},
			
            {
				label: "Utilisateur",
				field: "user.nom",
				numeric: true,
				html: false
			},
			
		],

    }
    },
	methods:{
		showModalUpdate(id){
			this.$bvModal.show(id)
		},
		hideModalUpdate(id){
this.$bvModal.hide(id)
		},
	ClickRow(row){
	this.certification = row;
	console.log(row.nom);
	this.showModalUpdate('modal-prevent-closing');
    },
	
	}

  
   }
   
   
   
   
   </script>
   
<style>
@import "~material-design-icons-iconfont/dist/material-design-icons";


</style>