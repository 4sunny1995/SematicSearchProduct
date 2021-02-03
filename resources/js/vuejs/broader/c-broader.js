import broaderServices from "./s-broader"
let app = new Vue({
    el:"#broader",
    data:{
        listBroader:[],
        state:0,
        getIndex:null,
        model:{
            "root":"",
            "refer":""
        },
        title:"Create Modal",
        error:null,
        submit:"Create New",
        root:null,
        refer:null,
        id:null
    },
    mounted(){
        this.onloadFunction()
    },
    created(){

    },
    methods:{
        onloadFunction(){
            return [
                this.getBroader()
            ]
        },
        async getBroader(){
            let _this = this
            const response = await broaderServices.getBroaders()
            if(response.success==true){
                _this.listBroader = response.data
            }
        },
        async createOrUpdate(){
            let _this = this
            if(_this.state===2){
                //create new
                _this.model = {
                    "root":_this.root,
                    "refer":_this.refer
                }
                const response = await broaderServices.create(_this.model)
                if(response.success==true){
                    console.log(_this.listBroader)
                    _this.listBroader.push(response.data)
                    _this.state = 0
                    console.log(_this.listBroader)
                }
            }
            else {
                //update
                let item = _this.listBroader[_this.getIndex]
                _this.initModel()
                const response = await broaderServices.update(_this.model,item.id)
                console.log(response)
                if(response.success==true){
                    _this.listBroader[_this.getIndex] = response.data
                    _this.state = 0
                    console.log(response.data)
                    console.log(_this.listBroader)
                }
            }

        },
        async deleteItem(){
            let _this = this
            let id = _this.listBroader[_this.getIndex].id
            const response = await broaderServices.deleteItem(id)
            console.log(response)
            if(response.success==true){
                _this.listBroader.splice(_this.getIndex,1)
                console.log(_this.listBroader)
                _this.state = 0
            }
        },
        openModal(state,index){
            let _this = this
            _this.state = state
            _this.getIndex = index
            let item = _this.listBroader[index]
            _this.root = item.root
            _this.refer = item.refer
        },
        createBroader(){
            let _this = this
            //create state
            _this.state = 2
            _this.initModel()
            
        },
        initModel(){
            let _this = this
            if(_this.state===1){
                _this.model = {
                    "root":_this.root,
                    "refer":_this.refer
                }
                _this.title = "Update Broader in Directionary"
                _this.submit = "Update"
            }
            else {
                _this.model = {
                    "root":"",
                    "refer":""
                }
                _this.title = "Create New Broader in Directionary"
                _this.submit = "Create"
            }
        }
        
    },
    computed:{

    }
})