<script>
import '@fullcalendar/core/vdom' // solves problem with Vite
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin from '@fullcalendar/interaction'
import axios from 'axios'
//import $ from 'jquery'
export default {
  components: {
    FullCalendar // make the <FullCalendar> tag available
  },
  data() {
    return {
        
      calendarOptions: {
        plugins: [ dayGridPlugin, interactionPlugin,timeGridPlugin ],
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events:[],
        initialView: 'dayGridMonth',
       // dateClick: this.handleDateClick,
  //      eventSources: [
  //        {
  //          url: 'http://127.0.0.1:8000/api/participant/formations',
  //          type: 'GET',
  //          async:false,
  //          data:{ 
  //            startDate: date_debut,
  //     endDate:date_fin
                
  //               },
  //          error: function() {
  //             alert('there was an error while fetching events!');
  //             },      
  //         }
        
    
  // ],
     
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
                method: "GET",    //WebMethods will not allow GET
                url: "http://127.0.0.1:8000/api/participant/formations",
                //completely take out 'data:' line if you don't want to pass to webmethod - Important to also change webmethod to not accept any parameters 
                
            }).then(doc => {
                      //javascript event object created here
                    console.log(doc);
                    var obj = doc.data;
                    obj.forEach(formation => {
                      this.calendarOptions.events.push({
                            title: formation.titre,  //your calevent object has identical parameters 'title', 'start', ect, so this will work
                            start:formation.date_debut, // will be parsed into DateTime object    
                            end: formation.date_fin,
                          
                        });
                    });
                                      
                   // if (callback) callback(events);
                    console.log(this.event);  
                   
                })
  },

}
</script>
<template>
  <FullCalendar :options="calendarOptions" />
</template>