import emailServices from "./s-email"
let app = new Vue({
    el:"#sendEmail",
    data:{
        subject:null,
        to:null,
        content:null
    },
    mounted(){
        this.onloadFunction()
    },
    created(){

    },
    methods:{
        
        async sendEmail(){
            var body = {
                "to":this.to,
                "subject":this.subject,
                "content":this.content
            }
            const response = await emailServices.sendEmail(body)
            console.log(response)
            if(response.success==true){
                console.log("OK")
            }
            
        },
        clear(){
            this.to = null
            this.subject = null
            this.content = null
        }
        
        
    },
    computed:{

    }
})