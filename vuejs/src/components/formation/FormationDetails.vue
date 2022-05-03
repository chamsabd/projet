
            <template>
           
              <b-collapse   class="w" accordion="my-accordion" :id="'collapse-'+formation.id">
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
              </b-collapse> 
           
    
</template>
<script>

export default {
  name: 'FormationDetails',
  props: {
  formation:Object,
  },
  methods: {
 
  },
}
</script>

<style>

</style>