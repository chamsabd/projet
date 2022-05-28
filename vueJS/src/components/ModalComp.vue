
            <template>
            <div>
              <b-modal  id="my-modal" size="lg"  centered ok-only>

           <div v-if="object!={} && object.responsable!=undefined" >
              <FormationDetails :formation="object" />
              </div>
               <div v-else>
                    <AddFormation/></div> 
        </b-modal>
             </div>
        
           
    
</template>
<script>
import AddFormation from "@/components/formation/AddFormation";
import FormationDetails from "@/components/formation/FormationDetails";
export default {
  name: 'ModalComp',
  components: {
    //  ArchiverItem,
    AddFormation,
    FormationDetails,
  },
  props: {
  object:Object,
  },
 
}
</script>

<style>

</style>