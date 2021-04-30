const { default: Axios } = require("axios")
import Vue from 'vue'
import myorderServices from "./s-myorderdetail"

let app = new Vue({
    el:"#myorderdetail",
    data:{
        isLoading:false,
        items:[],
        // order:null,
        getIndex:null,
        state:0,
        curency:null,
        id:null
    },
    mounted(){
        this.onLoadFunction()
    },
    methods:{
        onLoadFunction(){
            this.getMyOrderDetail()
        },
        formatDate(date){
            date = date.split('T')
            return `${date[0]} Time: ${date[1]}`
        },
        async getMyOrderDetail(){
            var path = window.location.pathname.split('/')
            var oid = path[path.length-1]
            this.isLoading = true
            const response = await myorderServices.getMyOrderDetail(oid)
            if(response.success==true)this.items = response.data
            this.isLoading = false
        }
    }
})