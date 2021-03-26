import Vue from "vue"
import config from "../../config"
import couponServices from "./s-coupon-history"

let app = new Vue({
    el:"#coupon-history",
    data:{
        items:[],
        isLoading:false,
        code:null,
        user_id:null,
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
        openModal(action,index){
            this.state = action
            this.itemEdit = this.items[index]
            this.getIndex = index
        },
        createNew(){
            this.state = 2
            this.itemEdit = null
            this.title = "Create new"
            this.submit = "Create"
            this.initModel()
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
                this.user_id =  this.itemEdit.user_id
        },
        async createOrUpdate(){
            
            var body = this.submitModel()
            console.log(body)
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
                "code":this.code,
                "user_id":this.user_id
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