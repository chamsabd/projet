<template>
    <div>
       <li class="list-group-item" v-for="seance in seances " :key="seance.id">{{seance.nom_seance}} </li> 
    </div>
</template>
<script>
import axios from 'axios'

export default{
    
data(){
    return{
     seances:{}
    }
} ,
created(){
    
    axios.get('http://127.0.0.1:8000/api/seances')
          .then(response =>this.seances=console.log(response.data))
        //.response(response => this.seances=response)
        .catch(error => console.log(error));
}

}
</script>