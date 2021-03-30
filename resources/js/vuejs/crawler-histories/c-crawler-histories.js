import Vue from "vue"
import config from "../../config"
import crawlerServices from "./s-crawler-histories"

let app = new Vue({
    el:"#crawler-histories",
    data:{
        items:[],
        isLoading:false,
        state:0,
        getIndex:null,
        itemEdit:null,
        domain:null,
        url:null,
        listProduct:null,
        nameProduct:null,
        priceProduct:null,
        imageProduct:null,
        hasTag:null,
        category:null,
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
            this.domain = this.itemEdit.domain
            this.url = this.itemEdit.url
            this.listProduct = this.itemEdit.listProduct
            this.nameProduct = this.itemEdit.nameProduct
            this.priceProduct = this.itemEdit.priceProduct
            this.imageProduct = this.itemEdit.imageProduct
            this.hasTag = this.itemEdit.hasTag
            this.category = this.itemEdit.category
        },
        submitModel(){
            return {
                "domain" : this.domain,
                "url" : this.url,
                "listProduct" : this.listProduct,
                "nameProduct" : this.nameProduct,
                "priceProduct" : this.priceProduct,
                "imageProduct" : this.imageProduct,
                "hasTag" : this.hasTag,
                "category" : this.category
            }
        },
        async getAll(){
            const response = await crawlerServices.getAll()
            this.items = response.data
        },
        async edit(index){
            this.getIndex = index
            var item = this.items[index]
            const response = await crawlerServices.show(item.id)
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
            const response = await crawlerServices.destroy(item.id)
            if(response.success==true){
                this.items.splice(this.getIndex,1)
                return this.state = 0
            }
        },
        async createOrUpdate(){
            var body = this.submitModel(this.itemEdit)
            //Create
            if(this.state==2){
                console.log(body)
                const response = await crawlerServices.store(body)
                if(response.success==true){
                    this.items.push(response.data)
                    return this.state = 0
                }
                
            }
            //Update
            if(this.state==1){
                console.log(body)
                var item = this.items[this.getIndex]
                const response = await crawlerServices.update(body,item.id)
                if(response.success==true){
                    this.items[this.getIndex] = response.data
                    return this.state = 0
                }
                
            }
        },
    }
})