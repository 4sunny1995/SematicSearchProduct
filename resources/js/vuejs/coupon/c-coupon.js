import Vue from "vue"
import config from "../../config"
import couponServices from "./s-coupon"

let app = new Vue({
    el:"#coupon",
    data:{
        items:[],
        isLoading:false,
        code:"",
        coupon:null,
        state:0,
        total:0,
        title:"Create",
        submit:"Create",
        itemEdit:null,
        count:0,
        type:1,
        getIndex:null
    },
    mounted(){
        this.onLoadFunction()
    },
    methods:{
        onLoadFunction(){
            this.getAll()
        },
        async getAll(){
            const response = await couponServices.getAll()
            this.items = response.data
        },
        async store(){
            var body = {
                "code":this.coupon
            }
            const response = couponServices.store(body)
            if(response.success==true){
                this.coupon = ""
            }
        },
        openModal(action,index){
            console.log(action)
            console.log(index)
            this.state = action
            this.itemEdit = this.items[index]
            this.getIndex = index
        },
        createNew(){
            this.state = 2
            this.itemEdit = null
            this.title = "Create new"
            this.submit = "Create"
        },
        async edit(index){
            this.getIndex = index
            var item = this.items[index]
            const response = await couponServices.show(item.id)
            if(response.success==true){
                this.title = "Update"
                this.submit = "Update"
                this.itemEdit = response.data
                this.state = 1
                this.initModel()
            }
        },
        initModel(){
                this.code =  this.itemEdit.code,
                this.type =  this.itemEdit.type,
                this.count = this.itemEdit.count,
                this.total = this.itemEdit.total
        },
        async createOrUpdate(){
            var body = this.submitModel(this.itemEdit)
            //Create
            if(this.state==2){
                console.log(body)
                const response = await couponServices.store(body)
                if(response.success==true){
                    this.items.push(response.data)
                    return this.state = 0
                }
                
            }
            //Update
            if(this.state==1){
                console.log(body)
                var item = this.items[this.getIndex]
                const response = await couponServices.update(body,item.id)
                if(response.success==true){
                    this.items[this.getIndex] = response.data
                    return this.state = 0
                }
                
            }
        },
        submitModel(){
            return {
                "code":this.state==1?this.itemEdit.code:"",
                "type":this.type,
                "count":this.count,
                "total":this.total
            }
        },
        async destroy(){
            var item = this.items[this.getIndex]
            const response = await couponServices.destroy(item.id)
            if(response.success==true){
                this.items.splice(this.getIndex,1)
                return this.state = 0
            }
        }
    }
})