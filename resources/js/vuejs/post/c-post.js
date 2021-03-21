import config from "../../config"
import postServices from "./s-post"
let app = new Vue({
    el:"#post",
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
        url:"",
        basicURL:config.basicURL,
        model:{
            "title":"",
            "content":"",
            "image":""
        },
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
        async getAll(){
            let _this = this
            const response = await postServices.getAll()
            if(response.success==true){
                _this.items = response.data
            }
        },
        async createOrUpdate(){
            let _this = this
            console.log(_this.model)
            _this.initModel()
            if(_this.state===2){
                //create 
                const response = await postServices.create(_this.model)
                if(response.success==true){
                    console.log(_this.items)
                    _this.items.push(response.data)
                    _this.state = 0
                    console.log(_this.items)
                }
            }
            else {
                //update
                let item = _this.items[_this.getIndex]
                
                const response = await postServices.update(_this.model,item.id)
                console.log(response)
                if(response.success==true){
                    _this.items[_this.getIndex] = response.data
                    _this.state = 0
                    console.log(response.data)
                    console.log(_this.items)
                }
            }

        },
        async deleteItem(){
            let _this = this
            let id = _this.items[_this.getIndex].id
            const response = await postServices.destroy(id)
            console.log(response)
            if(response.success==true){
                _this.items.splice(_this.getIndex,1)
                console.log(_this.items)
                _this.state = 0
            }
        },
        openModal(state,index){
            let _this = this
            _this.state = state
            _this.getIndex = index
            let item = _this.items[index]
            _this.title = item.title
            _this.content = item.content,
            _this.image = item.image
            _this.titlePost = "Update Post"
            _this.submit = "Update"
        },
        createNew(){
            let _this = this
            //create state
            _this.state = 2
            _this.title = ""
            _this.content = ""
            _this.image = ""
            _this.titlePost = "Create Post"
            _this.submit = "Create"
            
        },
        initModel(){
            let _this = this
            _this.model = {
                "title":_this.title,
                "content":_this.content,
                "image":_this.image
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
        // async recomment(){
        //     var _this = this
        //     const response = await postServices.recomment(_this.url)
        //     _this.recommentList = response.data
        // }
        
    },
    computed:{

    }
})