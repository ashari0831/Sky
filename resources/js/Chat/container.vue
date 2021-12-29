<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component hanika
                        <!-- <div v-for="chat in chatRoom" :key="chat.id">
                            <button @click="getMessages()">
                                {{ chat }}:dsfds
                            </button>
                        </div> -->

                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import MessageContainer from './messageContainer.vue'
import InputMessage from './inputMessage.vue'
    export default {
       components:{
           MessageContainer,
           InputMessage,

       },
       data:function (){
           return{
               chatRoom:[],
               currentRoom: [],
               messages: [],
               instance: 232
           }
       },
       methods:{
           getRooms(){
               axios.get('/admin')
               .then( response =>{
                   this.chatRoom = response.data;
                   console.log(this.chatRoom);
                   this.setRoom(response.data[0]);
               })
               .catch(error => {
                   console.log(error);
               })
           },
           setRoom(room){
               this.currentRoom = room;
               //this.getMessages();
           },
           getMessages($data){
               alert($data);
           }
       },
       
       //this method run initially
       created(){
           this.getRooms();
       }
        
    }
</script>
