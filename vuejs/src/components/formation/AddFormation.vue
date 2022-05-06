<template>
  <div class="row d-flex justify-content-center">
    <div class="col-lg-9">
      <div class="card">
        <div class="card-header"><strong>add</strong> Formation</div>
        <form ref="my-modal1form" @submit.stop.prevent="onAdd">
          <div class="card-body card-block">
            <b-form-group label="titre formation" :state="advalid_titre">
              <b-form-input
                :state="advalid_titre"
                v-model="formation.titre"
                trim
              ></b-form-input>
              <!-- list="input-list" <b-form-datalist id="input-list" :options="options"></b-form-datalist> -->
              <b-form-invalid-feedback :state="advalid_titre">
                titre doit etre 5-15 caractere
              </b-form-invalid-feedback>
              <b-form-valid-feedback :state="advalid_titre">
                Looks Good.
              </b-form-valid-feedback>
            </b-form-group>

            <b-row>
              <b-col>
                <b-form-group label="date debut"  label-for="input-2">
                  <b-form-datepicker :min="mind" :max="maxd"
                    id="input-2"
                     reset-button
                    class="mb-2 mr-sm-2 mb-sm-0"
                    v-model="formation.date_debut"
                    
                    require
                    trim
                  ></b-form-datepicker>
                  <b-form-invalid-feedback >
                    titre doit etre 5-15 caractere
                  </b-form-invalid-feedback>
                  <b-form-valid-feedback >
                    Looks Good.
                  </b-form-valid-feedback>
                </b-form-group>
              </b-col>
              <b-col>
                <b-form-group label="date fin" label-for="input-3">
                  <b-form-datepicker
                  :min="minf"
                    id="input-3"
                   reset-button
                    class="mb-2 mr-sm-2 mb-sm-0"
                    v-model="formation.date_fin"
                    require
                    trim
                  ></b-form-datepicker>

                  <b-form-invalid-feedback >
                    titre doit etre 5-15 caractere
                  </b-form-invalid-feedback>
                  <b-form-valid-feedback >
                    Looks Good.
                  </b-form-valid-feedback>
                </b-form-group>
              </b-col>
            </b-row>
            <b-form-group label="titre formation" >
              <b-form-input
             
                v-model="formation.responsable_id"
                trim
              ></b-form-input>
              <!-- list="input-list" <b-form-datalist id="input-list" :options="options"></b-form-datalist> -->
              <b-form-invalid-feedback >
                titre doit etre 5-15 caractere
              </b-form-invalid-feedback>
              <b-form-valid-feedback >
                Looks Good.
              </b-form-valid-feedback>
            </b-form-group>
             <!-- <b-row>
              <b-col>
                <b-form-group v-if="formation.responsable.nom" label="date debut" label-for="input-2">
                  <b-form-input
                    id="input-3"
                   v-if="formation.responsable.nom"
                    class="mb-2 mr-sm-2 mb-sm-0"
                    v-model="formation.responsable.nom"
                    disabled="disabled"
                    require
                    trim
                  ></b-form-input>
              
                </b-form-group>
              </b-col>
              <b-col>
                <b-form-group v-if="formation.responsable.prenom" label="date fin" label-for="input-3">
                  <b-form-input
                    id="input-3"
                   v-if="formation.responsable.prenom"
                    class="mb-2 mr-sm-2 mb-sm-0"
                    v-model="formation.responsable.prenom"
                    disabled="disabled"
                    require
                    trim
                  ></b-form-input>

             
                </b-form-group>
              </b-col>
            </b-row> -->
            <b-form-group label="nombre de place" >
              <b-form-input
               
                v-model="formation.nbr_place"
                trim
              ></b-form-input>
              <!-- list="input-list" <b-form-datalist id="input-list" :options="options"></b-form-datalist> -->
              <b-form-invalid-feedback>
                titre doit etre 5-15 caractere
              </b-form-invalid-feedback>
              <b-form-valid-feedback >
                Looks Good.
              </b-form-valid-feedback>
            </b-form-group>
          </div>
          <div class="card-footer">
         <b-button type="submit" variant="primary">Submit</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "AddFormation",
   data: function () {
    const  now=new Date()
    return {

        today : new Date(now.getFullYear(), now.getMonth(), now.getDate()),
     
       
formation:{}
    }},
     methods: {

     },
   computed: {
       minf(){
           const min =new Date(this.formation.date_debut);
           if (this.formation.date_debut) 
           min.setDate(min.getDate() )
           return this.formation.date_debut?min:undefined
       },
        mind(){
              const min= new Date(this.today);
              min.setMonth(min.getMonth() + 1)
           return min
       },
       maxd(){
          const max=new Date(this.formation.date_fin);
           if (this.formation.date_fin) 
          max.setDate(max.getDate() - 1)
           return this.formation.date_fin?max:undefined
       },
advalid_titre(){
    if(this.formation.titre!=undefined)
    return this.formation.titre.length >=5 && this.formation.titre.length <=15
return false
    

}
   }
};
</script>