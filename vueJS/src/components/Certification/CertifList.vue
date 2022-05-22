<template>
  <div id="app"  class="container">
    
<h1>Liste des certifications </h1>
    <datatable
      title="Certifications"
    :columns="tableColumns1"
      :rows="certifications"
         >
    </datatable>
  </div>
     </template>
   
   <script>
    import DataTable from "vue-materialize-datatable";


    export default {
        
       components: {
 
    datatable: DataTable,
   
  },
 props: {
  certifications:Array,
  },
     data: function () {
    return {

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
			}
		],

    }
    },

  
   }
   
   
   
   
   </script>