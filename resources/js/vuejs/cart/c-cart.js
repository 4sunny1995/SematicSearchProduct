
import { isBuffer } from "lodash"
import Vue from "vue"
import config from "../../config"
import cartServices from "./s-cart"

let app = new Vue({
    el :"#cart",
    data:{
        items : [],
        isLoading:false,
        state:0,
        total:0.0,
        count:0,
        destroyList:[],
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
            const response = await cartServices.getMyCart()
            if(response.success==true){
                _this.items = response.data
                _this.isLoading = false
                _this.total = response.total
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
            const response = await cartServices.change(body)
            if(response.success==true){
                _this.items = response.data
                _this.isLoading = false
                _this.total = response.total
                _this.count = response.count
            }
        },
        gotoCheckout(){
            window.location.href = "/shop/checkout"
        },
        pushOrpop(index){
            var item = this.items[index]
            var id  = item.id
            var check = this.destroyList.indexOf(id)
            // console.log(check)
            if(check==-1){
                this.destroyList.push(id)
            }
            else {
                this.destroyList.splice(check,1)
            }
            console.log(this.destroyList)
        },
        setState(value){
            this.state = value
        },
        async removeItems(){
            const response = await cartServices.removeItems(this.destroyList)
            if(response.success==true){
                this.state = 0;
               
                this.items = response.data
                window.location.reload()
                // this.total-= parseFloat(response.sum)
            }
        }
    }
})