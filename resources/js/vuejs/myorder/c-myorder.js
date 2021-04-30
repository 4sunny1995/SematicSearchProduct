const { default: Axios } = require("axios")
import Vue from 'vue'
import myorderServices from "./s-myorder"

let app = new Vue({
    el:"#myorder",
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
            this.getMyOrder()
        },
        formatDate(date){
            date = date.split('T')
            return `${date[0]} Time: ${date[1]}`
        },
        openOrderDetail(index){
            this.getIndex=index
            var id = this.items[index].id
            console.log(id)
            window.location.href = "/shop/orderdetail/"+id
        },
        async getMyOrder(){
            this.isLoading = true
            const response = await myorderServices.getMyOrder()
            if(response.success==true)this.items = response.data
            this.isLoading = false
        }
    }
})