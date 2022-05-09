
            <template>
            <div>
             
                    <b-card :title="formation.titre" class="text-center" :sub-title="'de '+formation.date_debut+' a '+formation.date_fin">
    <b-card-text v-if="formation.description">
      {{formation.description}}
    </b-card-text>

    <b-card-text>responsable: {{formation.responsable.nom}}</b-card-text>
<b-card-text v-if="formation.formateur">formateur: {{formation.formateur.nom}}</b-card-text>
   <b-card-text v-if="formation.formateurexterne">formateur externe: {{formation.formateurexterne.nom}}</b-card-text>

    <a href="#" class="card-link">Card link</a>
    <b-link href="#" class="card-link">Another link</b-link>
  </b-card>
              </div>
               
       
            
           
           
    
</template>
<script>

export default {
  name: 'FormationDetails',
  components: {
 
  
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