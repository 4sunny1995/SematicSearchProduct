import Vue from "vue"
import config from "../../config"
import rewardServices from "./s-reward-history"

let app = new Vue({
    el:"#reward-history",
    data:{
        items:[],
        isLoading:false,
        state:0,
        getIndex:null,
        itemEdit:null,
        value:0,
        type:0,
        description:null,
        title:"Create",
        submit:"Create",
        user_id:null
        
    },
    mounted(){
        this.onLoadFunction()
    },
    methods:{
        onLoadFunction(){
            this.getAll()
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
        },
        initModel(){
            this.user_id = this.itemEdit.user_id
            this.value = this.itemEdit.value,
            this.type = this.itemEdit.type,
            this.description = this.itemEdit.description
        },
        submitModel(){
            return {
                "user_id":this.user_id,
                "type":this.type,
                "value":this.value,
                "description":this.description
            }
        },
        async getAll(){
            const response = await rewardServices.getAll()
            this.items = response.data
        },
        async edit(index){
            this.getIndex = index
            var item = this.items[index]
            const response = await rewardServices.show(item.id)
            if(response.success==true){
                this.title = "Update"
                this.submit = "Update"
                this.itemEdit = response.data
                this.state = 1
                this.initModel()
            }
        },
        async destroy(){
            var item = this.items[this.getIndex]
            const response = await rewardServices.destroy(item.id)
            if(response.success==true){
                this.items.splice(this.getIndex,1)
                return this.state = 0
            }
        },
        async createOrUpdate(){
            var body = this.submitModel()
            //Create
            if(this.state==2){
                console.log(body)
                const response = await rewardServices.store(body)
                if(response.success==true){
                    this.items.push(response.data)
                    return this.state = 0
                }
                
            }
            //Update
            if(this.state==1){
                console.log(body)
                var item = this.items[this.getIndex]
                const response = await rewardServices.update(body,item.id)
                if(response.success==true){
                    this.items[this.getIndex] = response.data
                    return this.state = 0
                }
                
            }
        },
    }
})