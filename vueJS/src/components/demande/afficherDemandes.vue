<template>
  <div id="app" class="container">
    <h1 class="text-center">Datatable with Vue</h1>

    <table id="myTable" class="table table-bordered mt-5">
      <thead>
        <tr>
          <th>date demande</th>
          <th>titre formation</th>
          <th>nom utilisateur</th>  
          <th>action</th>
        </tr>
      </thead>
       <tbody>
      <tr v-for="demande in demandes" :key="demande.id">
        <td>{{demande.date_demande}}</td>
        <td>{{formation.titre}}</td>
        <td>{{utilisateur.nom}}</td>
       <!-- <td> 

          <b-button pill variant="outline-info">detail</b-button>
  <b-button pill variant="outline-success">modifier</b-button>
   <ArchiverItem :id="formation.id"/> 
   </td>-->

      </tr>

    </tbody>
    </table>
  </div>
</template>