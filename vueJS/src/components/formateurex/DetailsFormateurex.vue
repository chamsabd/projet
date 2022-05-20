<template>
<b-modal  id="my-modalDetails" size="lg"  centered ok-only >
    <div>  
                   
        <b-card :nom="formateurex.nom" class="text-center">
    <b-card-text> nom formateur :
      {{formateurex.nom}}
    </b-card-text>

    <b-card-text>email : {{formateurex.email}}</b-card-text>
<b-card-text >specialite: {{formateurex.specialite}}</b-card-text>
  <b-card-text >ncin {{formateurex.ncin}}</b-card-text>
 
  </b-card>
    </div>
</b-modal>
    
</template>
<script>


export default {
    name: 'DetailsFormateurex',
     props: {
  formateurex:Object,
  },
   
}
</script>

