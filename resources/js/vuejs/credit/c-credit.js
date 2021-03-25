import Vue from "vue"
import config from "../../config"
import creditServices from "./s-credit"

let app = new Vue({
    el:"#credit",
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