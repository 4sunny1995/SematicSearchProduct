import Vue from "vue"
import config from "../../config"
import categoryServices from "./s-category"
import productServices from "./s-product"

let app = new Vue({
    el:"#category",
    data:{
        categories:[],
        isLoading:false,
        products:[],
        mediaURL:config.mediaURL,
        page:1,
        currency:null,
        locale:null,
    },
    mounted(){
        this.onLoadFunction()
        
    },
    methods:{
        onLoadFunction(){
            this.show()
            this.getAll()
            this.getLocale()
        },
        async getAll(){
            var id = window.location.pathname
            id = id.split('/')
            id = id[id.length-1]
            console.log(id)
            const response = await productServices.getByCategoryParent(id,this.page)
            if(response.success == true){
                this.products = response.data
            }
        },
        async show(){
            var path = window.location.pathname.split('/')
            console.log(path)
            path = path[path.length-1]
            const response = await categoryServices.show(path)
            if(response.success==true){
                this.categories = response.data
            }
            console.log(path)
        },
        async getLocale(){
            const response = await categoryServices.getLocale()
            if(response.success == true){
                this.locale = response.data
            }
        },
        format(price){
            var _this = this
            // Create our number formatter.
            var formatter = new Intl.NumberFormat(_this.locale.code, {
                style: 'currency',
                currency: _this.locale.currency,
            });
            return formatter.format(price);
        }
    }
})