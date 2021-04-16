import Vue from "vue"
import config from "../../config"
import categoryServices from "./s-category"
import productServices from "./s-product"
import cartServices from "./s-cart"

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
        async onLoadFunction(){
            await this.show()
            this.getProducts()
            this.getLocale()
        },
        async getProducts(){
            this.isLoading = true
            var path = window.location.pathname.split('/')
            path = path[path.length-1]
            // var id = this.categories[0].id
            console.log(path)
            const response = await productServices.getByCategory(path,this.page)
            if(response.success == true){
                this.products = response.data
                this.isLoading = false
            }
        },
        
        async show(){
            var path = window.location.pathname.split('/')
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
        },
        async addToCart(index){
            var item = this.products[index]
            var data = {
                "pid":item.id,
                "quantity":1
            }
            const response = await cartServices.store(data)
            if(response.success==true){
                item.isCart = true
            }
        },
        async removeToCart(index){
            var item = this.products[index]
            console.log(item)
            const response = await cartServices.destroy(item.id)
            if(response.success==true){
                item.isCart = false
            }
        },
        async showProduct(index){
            this.isLoading = true
            const response = await productServices.getByCategoryId(this.categories[index].id,this.page)
            if(response.success == true){
                this.products = response.data
                this.isLoading = false
            }
        }
    }
})