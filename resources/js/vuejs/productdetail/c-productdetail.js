import config from "../../config"
import productdetailServices from "./s-productdetail"
import cartServices from "../category/s-cart"
import wishlistServices from "../category/s-wish-list"
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
                console.log(this.item)
           }
       },
       async addToCart(item){
            var data = {
                "pid":item.id,
                "quantity":1
            }
            const response = await cartServices.store(data)
            if(response.success==true){
                item.isCart = true
            }
        },
        async removeToCart(item){
            console.log(item)
            const response = await cartServices.destroy(item.id)
            if(response.success==true){
                item.isCart = false
            }
        },
        async addToWishList(item){
            const response = await wishlistServices.store(item)
            if(response.success==true){
                item.isWishList = true
            }
        },
        async removeToWishList(item){
            const response = await wishlistServices.destroy(item.id)
            if(response.success==true){
                item.isWishList = false
            }
        },

        
    },
    computed:{

    }
})