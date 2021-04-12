import config from "../../config"
import productdetailServices from "./s-productdetail"
let app = new Vue({
    el:"#productdetail",
    data:{
        item:null,
        content:null,
        id:null,
        image:null,
        file:"",
        url:null,
        content:null,
        name:null,
        price:null,
        hasTag:null,
        basicURL:config.basicURL,
        recommentList:[],
        isLoading:false
    },
    mounted(){
        this.onloadFunction()
    },
    created(){

    },
    methods:{
        onloadFunction(){
            return [
                this.show()
            ]
        },
       async show(){
           var id = window.location.pathname
           id = id.split('/')
           id = id[id.length-1]
           
           const response = await productdetailServices.show(id)
           if(response.success == true){
                this.item = response.data
           }
       }

        
    },
    computed:{

    }
})