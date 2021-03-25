import Vue from "vue"
import config from "../../config"
import rewardServices from "./s-reward"

let app = new Vue({
    el:"#reward",
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