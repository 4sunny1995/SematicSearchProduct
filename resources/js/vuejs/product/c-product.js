import config from "../../config"
import postServices from "./s-product"
let app = new Vue({
    el:"#product",
    data:{
        items:[],
        state:0,
        getIndex:null,
        titlePost:"Create Modal",
        error:null,
        submit:"Create New",
        title:null,
        content:null,
        id:null,
        image:null,
        file:"",
        url:null,
        content:null,
        name:null,
        price:null,
        hasTag:null,
        basicURL:config.basicURL,
        recommentList:[]
    },
    mounted(){
        this.onloadFunction()
    },
    created(){

    },
    methods:{
        onloadFunction(){
            return [
                this.getAll()
            ]
        },
        createNew(){
            this.state = 2
            this.itemEdit = null
            this.title = "Create new"
            this.submit = "Create"
        },
        initModel(){
            this.name = this.itemEdit.name
            this.price = this.itemEdit.price,
            this.content = this.itemEdit.content,
            this.image = this.itemEdit.image,
            this.hasTag = this.itemEdit.hasTag
        },
        submitModel(){
            return {
                "name":this.name,
                "price":this.price,
                "content":this.content,
                "image":this.image,
                "hasTag":this.hasTag
            }
        },
        async getAll(){
            let _this = this
            const response = await postServices.getAll()
            if(response.success==true){
                _this.items = response.data
            }
        },
        async edit(index){
            this.getIndex = index
            var item = this.items[index]
            const response = await postServices.show(item.id)
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
            const response = await postServices.destroy(item.id)
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
                const response = await postServices.store(body)
                if(response.success==true){
                    this.items.push(response.data)
                    return this.state = 0
                }
                
            }
            //Update
            if(this.state==1){
                console.log(body)
                var item = this.items[this.getIndex]
                const response = await postServices.update(body,item.id)
                if(response.success==true){
                    this.items[this.getIndex] = response.data
                    return this.state = 0
                }
                
            }
        },
        async upload(){
            var _this = this
            _this.file = _this.$refs.file.files[0];
            let formData = new FormData();
            formData.append('file', _this.file);
            const response = await postServices.upload(formData)
            _this.image = response.data
            _this.basicURL = config.basicURL;
        },
        openModal(action,index){
            this.state = action
            this.itemEdit = this.items[index]
            this.getIndex = index
        },
        // async recomment(){
        //     var _this = this
        //     const response = await postServices.recomment(_this.url)
        //     _this.recommentList = response.data
        // }
        
    },
    computed:{

    }
})