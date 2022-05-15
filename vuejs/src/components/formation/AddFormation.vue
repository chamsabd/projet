<template>
<b-modal  id="add-modal" size="lg"  centered @cancel="resetModal" @ok="handleOk" >
 
  <div class="row d-flex justify-content-center">
    <div class="col-lg-9">
      <div class="card">
        <div class="card-header"><strong>add</strong> Formation</div>
        <form ref="my-modal1form" @submit.stop.prevent="AddFormation">
           <b-form-input class="d-none"
                v-model="formation.id"
                trim
              ></b-form-input>
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
    <b-form-group label="description formation" :state="advalid_desc">
              <b-form-textarea
              type="text"
               :state="advalid_desc"
                placeholder="merci d'expliquer un peu la formation..."
                v-model="formation.description"
                trim
              ></b-form-textarea>
              <!-- list="input-list" <b-form-datalist id="input-list" :options="options"></b-form-datalist> -->
              <b-form-invalid-feedback :state="advalid_desc">
                desc doit etre inferieur a  100 caractere
              </b-form-invalid-feedback>
              <b-form-valid-feedback :state="advalid_desc">
                Looks Good.
              </b-form-valid-feedback>
            </b-form-group>
            <b-row>
              <b-col>
                <b-form-group
                  label="date debut"
                  :state="advalid_dated"
                  label-for="input-2" >
                  <b-form-datepicker
                    :min="mind"
                    :max="maxd"
                    id="input-2"
                    reset-button
                    class="mb-2 mr-sm-2 mb-sm-0"
                    v-model="formation.date_debut"
                    :state="advalid_dated"
                    require
                    trim
                  ></b-form-datepicker>
                  <b-form-invalid-feedback :state="advalid_dated">
                    please enter a date
                  </b-form-invalid-feedback>
                  <b-form-valid-feedback :state="advalid_dated">
                    Looks Good.
                  </b-form-valid-feedback>
                </b-form-group>
              </b-col>
              <b-col>
                <b-form-group
                  :state="advalid_datef"
                  label="date fin"
                  label-for="input-3"
                >
                  <b-form-datepicker
                    :min="minf"
                    id="input-3"
                    reset-button
                    :state="advalid_datef"
                    class="mb-2 mr-sm-2 mb-sm-0"
                    v-model="formation.date_fin"
                    require
                    trim
                  ></b-form-datepicker>

                  <b-form-invalid-feedback :state="advalid_datef">
                    please enter a validate date
                  </b-form-invalid-feedback>
                  <b-form-valid-feedback :state="advalid_datef">
                    Looks Good.
                  </b-form-valid-feedback>
                </b-form-group>
              </b-col>
            </b-row>
            <b-form-group label="responsable " :state="advalid_responsable">
              <b-form-select :state="advalid_responsable" 
                v-model="formation.responsable_id"
                :options="options"
              ><template #first>
    <b-form-select-option  :value="null" >ncin/   nom   /prenom</b-form-select-option>
  </template></b-form-select>
   <b-form-invalid-feedback :state="advalid_responsable">
                merci de choisir un responsable
              </b-form-invalid-feedback>
              <b-form-valid-feedback :state="advalid_responsable">
                Looks Good.
              </b-form-valid-feedback>
            </b-form-group>
         
            <b-form-group label="nombre de place" :state="advalid_nbr">
              <b-form-input type="number" v-model="formation.nbr_place" trim :state="advalid_nbr"></b-form-input>
              <b-form-invalid-feedback :state="errors['nbr_place']">
                {{errors['nbr_place']}}
              </b-form-invalid-feedback >
              <b-form-invalid-feedback :state="advalid_nbr">
                nbr de place doit etre entre 10 et 30 
              </b-form-invalid-feedback >
              <b-form-valid-feedback :state="advalid_nbr"> Looks Good. </b-form-valid-feedback>
            </b-form-group>
          </div>
         
        </form>
      </div>
    </div>
  </div>
</b-modal>
</template>
<script>
import axios from "axios";
export default {
  name: "AddFormation",
  data: function () {
    const now = new Date();
    return {
      today: new Date(now.getFullYear(), now.getMonth(), now.getDate()),
      users: [],
errors:[],
     
    };
  },
  props: {
  modformation:Object,

  },
  
  mounted() {
    this.getutilisateurs();
  },
  methods: {
    AddFormation() {
       if(!this.advalid_titre || !this.advalid_desc || !this.advalid_dated || !this.advalid_datef || !this.advalid_responsable || !this.advalid_nbr)
       return ;
      console.log("add");
      var ur='';
          var met='';
           if(this.formation.id){
             ur='http://127.0.0.1:8000/api/formation/'+this.formation.id;
             met='put'
           }
           else{
           ur='http://127.0.0.1:8000/api/formation/store';
           met='post'}
        //  console.log("in");
          axios({
            url: ur,
            method: met,
            data: this.formation
          })
          .then(re => {
          console.log(re);
          this.$bvModal.hide('add-modal')
     
  this.$emit('add-formation',re);
          })
          .catch(err => {
            this.errors=err.response.data.errors;
         //   console.log("erreurs chams",this.errors);
          })
    },
    async getutilisateurs() {
      await axios
        .get("http://127.0.0.1:8000/api/users")
        .then((response) => {
          this.users = response.data;
        })
        .catch((error) => console.log(error.response));
    },
     resetModal() {
      this.formation= {
        'titre':null,
        'nbr_place':null,
        'description':null,
        'date_debut':null,
        'responsable_id':null,
        'date_fin':null,
      };
      },
      handleOk(bvModalEvent) {
        // Prevent modal from closing
        bvModalEvent.preventDefault()
        // Trigger submit handler
        this.AddFormation();
      },
  },
  computed: {
     formation(){
       return this.modformation;},
    options() {
      var val = this.users;

      var option = val.map(function (utilisateur) {
        return {
          text:
            utilisateur.ncin +
            " / " +
            utilisateur.nom +
            " / " +
            utilisateur.prenom,
          value: utilisateur.id,
          disabled: false,
        };
      });
      return option;
    },
    minf() {
      const min = new Date(this.formation.date_debut);
      if (this.formation.date_debut) min.setDate(min.getDate());
      return this.formation.date_debut ? min : undefined;
    },
    mind() {
      const min = new Date(this.today);
      min.setMonth(min.getMonth() + 1);
      return min;
    },
    maxd() {
      const max = new Date(this.formation.date_fin);
      if (this.formation.date_fin) max.setDate(max.getDate() );
      return this.formation.date_fin ? max : undefined;
    },
    advalid_titre() {
      if (this.formation.titre != undefined  && this.formation.titre != "")
        return (
          this.formation.titre.length >= 5 && this.formation.titre.length <= 15
        );
      return false;
    },
    advalid_desc(){
       if (this.formation.description != undefined )
        return (
          this.formation.description.length <=100
        );
      return true;
    },
    advalid_datef() {
      if (this.formation.date_fin != undefined && this.formation.date_fin != "")
        return true;
      return false;
    },
    advalid_dated() {
      if (this.formation.date_debut != undefined && this.formation.date_debut != "")
        return true;
      return false;
    },
    advalid_responsable() {
      if (this.formation.responsable_id != undefined )
       return this.formation.responsable_id!=null;
      return false;
    },
    advalid_nbr(){
  if (this.formation.nbr_place != undefined)
  return this.formation.nbr_place>=10 &&this.formation.nbr_place<=30
  return false
    },
  },
};
</script>