import narrowerServices from "./s-narrower"
let app = new Vue({
    el:"#history",
    data:{
        listnarrower:[],
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
                this.getnarrower()
            ]
        },
        async getnarrower(){
            let _this = this
            const response = await narrowerServices.getnarrowers()
            if(response.success==true){
                _this.listnarrower = response.data
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
                const response = await narrowerServices.create(_this.model)
                if(response.success==true){
                    console.log(_this.listnarrower)
                    _this.listnarrower.push(response.data)
                    _this.state = 0
                    console.log(_this.listnarrower)
                }
            }
            else {
                //update
                let item = _this.listnarrower[_this.getIndex]
                _this.initModel()
                const response = await narrowerServices.update(_this.model,item.id)
                console.log(response)
                if(response.success==true){
                    _this.listnarrower[_this.getIndex] = response.data
                    _this.state = 0
                    console.log(response.data)
                    console.log(_this.listnarrower)
                }
            }

        },
        async deleteItem(){
            let _this = this
            let id = _this.listnarrower[_this.getIndex].id
            const response = await narrowerServices.deleteItem(id)
            console.log(response)
            if(response.success==true){
                _this.listnarrower.splice(_this.getIndex,1)
                console.log(_this.listnarrower)
                _this.state = 0
            }
        },
        openModal(state,index){
            let _this = this
            _this.state = state
            _this.getIndex = index
            let item = _this.listnarrower[index]
            _this.root = item.root
            _this.refer = item.refer
        },
        createnarrower(){
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
                _this.title = "Update narrower in Directionary"
                _this.submit = "Update"
            }
            else {
                _this.model = {
                    "root":"",
                    "refer":""
                }
                _this.title = "Create New narrower in Directionary"
                _this.submit = "Create"
            }
        }
        
    },
    computed:{

    }
})