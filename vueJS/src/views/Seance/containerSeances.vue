<template>
  <div class="containerSeances">
    l'id passé est{{this.$route.params.id}}
    <div style="color: blueviolet" class="heading">
      <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css"
      />
      <h2>Seances de la formation : {{this.$route.params.name}}</h2>
    </div>
    <div > 
    <cont-add-modal @cont-add-modal="contAddModal"   ></cont-add-modal> </div>
    <center>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID Seance</th>
            <th scope="col">Nom De La Seance</th>
            <th scope="col">Actions possibles sur la Seance</th>
          </tr>
        </thead>

        <tbody class="table-group-divider">
          <tr>
            <th scope="row"> </th>
          <td><liste-seances  ></liste-seances></td>
          <!--    <td>
             <Details-Seance> <b-button pill variant="outline-primary"><i class="bi bi-info-circle"></i></b-button></Details-Seance>
               
              <delete-Seance>
                <b-button pill variant="outline-danger"
                  ><i class="bi bi-trash3"></i>
                </b-button> </delete-Seance>
               &nbsp;&nbsp;
              <edit-Seance
                ><b-button pill variant="outline-warning"
                  ><i class="bi bi-pen"></i></b-button
              ></edit-Seance> 
            </td>-->
          </tr>
        </tbody>
      </table>
    </center>
  </div>
</template>
<script>
import AddSeance from "@/components/seances/AddSeance";
import ListeSeances from "@/components/seances/ListeSeances.vue";
//import deleteSeance from "@/components/seances/deleteSeance";
//import detailsSeance from "@/components/seances/detailsSeance";
//import editSeance from "@/components/seances/editSeance";
import contAddModal from '../../components/seances/contAddModal.vue';
export default {
  components: { contAddModal,
  },
  componenets: {
    AddSeance,
    ListeSeances,
   // deleteSeance,
    //detailsSeance,
    //editSeance,
    contAddModal
  },
  methods:{
      contAddModal(seance){
    this.nom_seance=seance.nom_seance;
          console.log(seance);

  }
  }
};
</script>
<style scoped>
.containerSeances {
  margin: 50px;
  background-color: aliceblue;
}
.heading {
  padding: 10px;
}
</style>