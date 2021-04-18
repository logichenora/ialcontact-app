require('../../js/bootstrap');

require('alpinejs');
import Vue from "vue/dist/vue";
import VueResource from "vue-resource"
import Echo from "laravel-echo"
import Pusher from "pusher-js"
console.log(window.Vue)
console.log(Vue)
window.Vue = Vue;
Vue.use(VueResource);
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: false
});
const app = new Vue({
    el: '#app',
    data: {
        chatMessage : [],
        userId : null,
        chats : [],
        chatWindows : [],
        chatStatus : 0,
        chatWindowStatus : [],
        chatCount : []
    },
    created(){
        this.$set(this.chats, 0 , {});
        this.$set(this.chatCount, 0 , 0);
        window.Echo.channel('chat-message'+window.userid)
            .listen('ChatMessage', (e) => {
                console.log(e.user);
                this.userId = e.user.sourceuserid;
                if(this.chats[this.userId]){
                    this.show = 1;
                    this.$set(app.chats[this.userId], this.chatCount[this.userId] ,e.user);
                    this.chatCount[this.userId]++;
                    console.log("pusher");
                    console.log(this.chats[this.userId]);
                }else{
                    this.createChatWindow(e.user.sourceuserid,e.user.name)
                    this.$set(app.chats[this.userId], this.chatCount[this.userId] ,e.user);
                    this.chatCount[this.userId]++;
                }
            });
        window.Echo.channel('chat-message0')
            .listen('ChatMessage', (e) => {
                this.$set(app.chats[0], this.chatCount[0] ,e.user);
                this.chatCount[0]++;
            });
    },
    http: {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    },
    methods: {
        sendMessage(event){
            this.userId = event.target.id;
            var message = this.chatMessage[this.userId];
            this.$http.post('chat',{
                'userid' : this.userId,
                'message' : message
            }).then(response => {
                this.chatMessage[this.userId] = '';
                this.$set(app.chats[this.userId], this.chatCount[this.userId] , {
                    "message": message,
                    "name" : window.username
                });
                this.chatCount[this.userId]++;
                console.log("send");
            }, response => {
                this.error = 1;
                console.log("error");
                console.log(response);
            });
        },
        sendBroadcastMessage(event){
            this.userId = event.target.id;
            var message = this.chatMessage[this.userId];
            this.$http.post('chat',{
                'userid' : this.userId,
                'message' : message
            }).then(response => {
                this.chatMessage[this.userId] = '';
                /*this.$set(app.chats[this.userId], this.chatCount[this.userId] , {
                    "message": message,
                    "name" : window.username
                });
                this.chatCount[this.userId]++;*/
                console.log("send");
            }, response => {
                this.error = 1;
                console.log("error");
                console.log(response);
            });
        },
        getUserId(event){
            this.userId = event.target.id;
            this.createChatWindow(this.userId,event.target.innerHTML);
            console.log(this.userId);
        },
        createChatWindow(userid,username){
            if(!this.chatWindowStatus[userid]){
                this.chatWindowStatus[userid] = 1;
                this.chatMessage[userid] = '';
                this.$set(app.chats, userid , {});
                this.$set(app.chatCount, userid , 0);
                this.chatWindows.push({"senderid" : userid , "name" : username});
            }
        }
    }});
