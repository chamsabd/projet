<template>
    <div class="row d-flex justify-content-center">

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <strong>add</strong> Formation
                    </div>
                    <form ref="my-modal1form" @submit.stop.prevent="onAdd">

                        <div class="card-body card-block">
                            <b-form-group  label="titre formation" :state="advalid_titre">

                                <b-form-input  :state="advalid_titre"  v-model="formation.titre" trim></b-form-input>
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
                                    <b-form-group  label="date debut" label-for="input-2">

                                        <b-form-input id="input-3" type="date"  class="mb-2 mr-sm-2 mb-sm-0" v-model="formation.date_debut" require trim></b-form-input>
  <b-form-invalid-feedback :state="advalid_titre">
                                    titre doit etre 5-15 caractere 
                                </b-form-invalid-feedback>
                                <b-form-valid-feedback :state="advalid_titre">
                                    Looks Good.
                                </b-form-valid-feedback>

                                    </b-form-group>
                                </b-col>
                                <b-col>
                                    <b-form-group  label="date fin" label-for="input-3">
                                        <b-form-input id="input-3" type="date"  class="mb-2 mr-sm-2 mb-sm-0" v-model="formation.date_fin" require trim></b-form-input>

  <b-form-invalid-feedback :state="advalid_titre">
                                    titre doit etre 5-15 caractere 
                                </b-form-invalid-feedback>
                                <b-form-valid-feedback :state="advalid_titre">
                                    Looks Good.
                                </b-form-valid-feedback>
                                    </b-form-group>
                                </b-col>
                            </b-row>

                        

                        </div>
                        <div class="card-footer">
                           

                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                        </div>
                    </form>
                </div>

            </div>




        </div>
</template>
<script>
export default {
   name: 'AddFormation',
}
</script>