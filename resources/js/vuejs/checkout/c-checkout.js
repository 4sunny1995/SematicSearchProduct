const { default: Axios } = require("axios")
import { forEach } from 'lodash';
import config from "../../config"
// import numeral from 'numeral'

var app= new Vue({
    el:'#checkout',
    data: {
        items:null,
        isLoading:true,
        state:0,
        curency:{"curency":"$","rate":1},
        delivery:true,
        cash:false,
        momo:false,
        picked:0,
        hasError:null,
        total:null,
        count:0
      },
      mounted() {
        
        this.loadItems
      },
      computed:{
          loadItems(){
              return [
                  this.getOrderCheckout(),
                  this.getCurency()
              ]
          }
      },
      methods:{
            getOrderCheckout(){
            var _this = this
            Axios
                .get(config.shopURL +'customer/orderCheckout')
                .then(response => {
                    _this.items = response.data.data
                    _this.isLoading = false
                    _this.total = response.data.total
                    _this.count = response.data.count
                    
                });
            },
            setState(value){
                this.state= value
            },
            getCurency(){
                Axios.get(config.shopURL+'getCurency')
                .then(response=>{
                    this.curency=response.data,
                    console.log(this.curency)
                })
            },
            change(index,value){
                var item = this.items.data[index]
                var id = item.id
                this.getIndex = index
                if(item.quantity+value===0)return
                else
                {
                    item.quantity+=value
                    console.log(item.quantity)
                    this.items.total += item.product.promo?item.product.promo*value:item.product.price*value
                    console.log(item)
                    Axios.put(config.apiURL+"cart/update/"+id,item)
                    .then(response =>{
                        console.log(response.data.data)
                    })
                }
            },
            // numberal(value){
            //     return numeral(value).format("0,0")
            // },
            payment(){
                var type ='delivery'
                if(this.picked===1)type="delivery"
                if(this.picked===2)type="cash"
                if(this.picked===3)type="momo"
                var body = {
                    "items":this.items,
                    "total":this.total,
                }
                Axios.post(config.shopURL+"payment/"+type,body)
                .then(response => {
                    this.state = 0
                    if(response.data.success==true)
                    window.location.href = "/shop/checkout-result"
                })
            }
        }
    })