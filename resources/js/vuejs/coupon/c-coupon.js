import Vue from "vue"
import config from "../../config"
import couponServices from "./s-coupon"

let app = new Vue({
    el:"#coupon",
    data:{
        items:[],
        isLoading:false,
        
    },
    mounted(){
        this.onLoadFunction()
    },
    methods:{
        onLoadFunction(){
            
        }
    }
})