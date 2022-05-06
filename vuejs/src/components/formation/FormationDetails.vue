
            <template>
            <div>
              <b-modal  id="my-modal" size="lg"  centered ok-only>

           <div v-if="formation!={} &&formation.responsable" >
                    <b-card :title="formation.titre" class="text-center" :sub-title="'de '+formation.date_debut+' a '+formation.date_fin">
    <b-card-text v-if="formation.description">
      {{formation.description}}
    </b-card-text>

    <b-card-text>responsable: {{formation.responsable.nom}}</b-card-text>
<b-card-text v-if="formation.formateur">formateur: {{formation.formateur.nom}}</b-card-text>
   <b-card-text v-else>formateur externe: {{formation.formateurexterne.nom}}</b-card-text>

    <a href="#" class="card-link">Card link</a>
    <b-link href="#" class="card-link">Another link</b-link>
  </b-card>
              </div>
               <div v-else> <AddFormation/></div> 
        </b-modal>
             </div>
              <!-- <b-collapse   class="w" accordion="my-accordion" :id="'collapse-'+formation.id">
                <b-card :title="formation.titre" :sub-title="'de '+formation.date_debut+' a '+formation.date_fin">
    <b-card-text v-if="formation.description">
      {{formation.description}}
    </b-card-text>

    <b-card-text>responsable: {{formation.responsable.nom}}</b-card-text>
<b-card-text v-if="formation.formateur">formateur: {{formation.formateur.nom}}</b-card-text>
   <b-card-text v-else>formateur externe: {{formation.formateurexterne.nom}}</b-card-text>

    <a href="#" class="card-link">Card link</a>
    <b-link href="#" class="card-link">Another link</b-link>
  </b-card>
              </b-collapse>  -->
           
    
</template>
<script>
import AddFormation from "@/components/formation/AddFormation";
export default {
  name: 'FormationDetails',
  components: {
    //  ArchiverItem,
    AddFormation,
  
  },
  props: {
  formation:Object,
  },
  methods: {
 
  },
}
</script>

<style>

</style>