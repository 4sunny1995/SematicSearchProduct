
import Vue from "vue"
import config from "../../config"
import wishlistServices from "./s-wishlist"
import cartServices from "../category/s-cart"

let app = new Vue({
    el :"#mywishlist",
    data:{
        items : [],
        isLoading:false,
        state:0,
        count:0
    },
    mounted(){
        this.onLoadFunction()
    },
    methods:{
        onLoadFunction(){
            this.getAll()
        },
        async getAll(){
            var _this = this
            _this.isLoading = true
            const response = await wishlistServices.getMyWishList()
            if(response.success==true){
                _this.items = response.data
                _this.isLoading = false
                _this.count = response.count
            }
        },
        formatPrice(value) {
            let val = (value/1).toFixed(2).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        },
        async change(index,count){
            var _this = this
            var item = _this.items[index]
            var body = {
                "quantity":count,
                "product_id":item.id
            }
            const response = await wishlistServices.change(body)
            if(response.success==true){
                _this.items = response.data
                _this.isLoading = false
                _this.total = response.total
                _this.count = response.count
            }
        },
        async addToCart(index){
            var item = this.items[index]
            var data = {
                "pid":item.id,
                "quantity":1
            }
            const response = await cartServices.store(data)
            if(response.success==true){
                item.isCart = true
            }
        }
    }
})