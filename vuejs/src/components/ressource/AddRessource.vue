<template>
<b-modal  id="ressource-modal" size="lg"  centered @hidden="resetModal" @cancel="resetModal" @ok="handleOk" >
 
  <div class="row d-flex justify-content-center">
    <div class="col-lg-9">
      <div class="card">
        <div class="card-header"><strong>support de cours</strong></div>
        <form ref="my-modal1form" enctype=multipart/form-data @submit.stop.prevent="AddRessource">
           
          <div class="card-body card-block">
            <b-form-group label="titre de support" :state="advalid_titre">
              <b-form-input
                :state="advalid_titre"
                v-model="support.titre"
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
<b-form-group id="fieldset-1" label="support:" :state="advalid_url"  label-for="input-1">
<b-form-file 
      v-model="support.url"
:state="advalid_url"
      placeholder="Choose a file or drop it here..."
      drop-placeholder="Drop file here..."
    ></b-form-file>
    <b-form-invalid-feedback :state="advalid_url">
    Please upload a file  smaller than 20MB
    </b-form-invalid-feedback>
    <b-form-valid-feedback :state="advalid_url">
        Looks Good.
    </b-form-valid-feedback>
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
  name: "AddRessource",
  data: function () {
   
    return {
     support:{},
     val3:false,
    };
  },
  props: {
  formation:Object,

  },
 
  mounted() {
   
  },
  methods: {
  async  AddRessource() {
       if(!this.advalid_titre || !this.advalid_url )
       return ;
this.support.formation_id=this.formation.id;
console.log(this.support.url);
         var f = new FormData()
              
                f.append('titre', this.support.titre)
                f.append('url',this.support.url)
                f.append('formation_id',this.formation.id)
       await  axios({
            url: 'http://127.0.0.1:8000/api/ressource/store',
            method: 'post',
            data: f,
 header:{
     'Content-Type' : 'multipart/form-data'
    }
          })
        .then(re => {
          console.log(re);
          this.$bvModal.hide('ressource-modal')
     var alert="support de cours"+re.data.titre+" a ete ajouter avec success"
  this.$emit('add',alert);
          })
          .catch(err => {
            console.log(err);
            this.errors=err.response.data.errors;
         //   console.log("erreurs chams",this.errors);
          })
    },
  
     resetModal() {
      this.support= {
      };
      this.val3=false;
      this.$emit('add',"none");
      },
      handleOk(bvModalEvent) {
        // Prevent modal from closing
        bvModalEvent.preventDefault()
        // Trigger submit handler
        this.AddRessource();
      
      },
 async  ur(){
       
              var f = new FormData()
 
                f.append('url', this.support.url)
          await axios.post('http://127.0.0.1:8000/api/ressource/url', f, {
    header:{
     'Content-Type' : 'multipart/form-data'
    }
   })
                    .then(() => {
                 
 this.val3=true;
                    }) .catch(() => {
           this.val3=false;
         //   console.log("erreurs chams",this.errors);
          })
        
      },
  },
  computed:{
    
   
 
    advalid_titre() {
      if (this.support.titre != undefined  && this.support.titre != "")
        return (
          this.support.titre.length >= 5 && this.support.titre.length <= 15
        );
      return false;
    },

      advalid_url(){
         
       if (this.support.url != null && this.support.url != ""){
       // console.log("support url "+this.support.url);
           this.ur()
  return  this.val3;
       }
      return false;
    },
  },
};
</script>