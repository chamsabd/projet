<script>
import '@fullcalendar/core/vdom' // solves problem with Vite
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin from '@fullcalendar/interaction'
import bootstrapPlugin from '@fullcalendar/bootstrap';
import '@fortawesome/fontawesome-free/css/all.css'; // needs additional webpack config!
import axios from 'axios'
//import $ from 'jquery'
export default {
  components: {
    FullCalendar // make the <FullCalendar> tag available
  },
  data() {
    return {
        
      calendarOptions: {
        

  themeSystem: 'bootstrap',
        plugins: [bootstrapPlugin , dayGridPlugin, interactionPlugin,timeGridPlugin ],
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events:[],
        initialView: 'dayGridMonth',
       
     
        weekends: true,
        eventClick: this.handleEventClick,
      }
    }
  },
  methods: {
    handleEventClick(clickInfo) {
         alert('event click! ' + clickInfo.event.title)
      
    },
  },
   mounted() {
 
            axios({
                method: "GET",   
                url: "http://127.0.0.1:8000/api/participant/formations",
                  
            }).then(doc => {
                     var obj = doc.data;
                    obj.forEach(formation => {
                      this.calendarOptions.events.push({
                            title: formation.titre,  
                            start:formation.date_debut,    
                            end: formation.date_fin,
                          
                        });
                    });
                                      
                   // if (callback) callback(events);
                   
                   
                })
  },

}
</script>
<template>
  <FullCalendar :options="calendarOptions" />
</template>