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
	<b-button v-b-modal.modal-prevent-closing variant="outline-success" @click="update(props.row)">Mettre à jour </b-button>
	</td>
		</template>
	
    </datatable>
<update-certif @updatecertif="getCertif" :certification="certification"></update-certif>


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
	row:Object,
  },
     data: function () {
    return {
  certification:{},
	
        tableColumns1: [
			
      {
				label: "Score",
				field: "score",
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
	update(row){
	this.certification = row;
	console.log(row.id);
	this.showModalUpdate('modal-prevent-closing');
    },
	getCertif(alert){
	this.$emit("updatecertif",alert);
                    this.$emit('updatecertif',"La mise a jour est faite !");

	}
	}
	}

  
   
   
   
   
   
   </script>
   
<style>
@import "~material-design-icons-iconfont/dist/material-design-icons";


</style>