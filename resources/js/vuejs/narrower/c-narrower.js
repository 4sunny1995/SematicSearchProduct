import narrowerServices from "./s-narrower"
let app = new Vue({
    el:"#narrower",
    data:{
        listNarrower:[],
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
                this.getNarrower()
            ]
        },
        async getNarrower(){
            let _this = this
            const response = await narrowerServices.getNarrowers()
            if(response.success==true){
                _this.listNarrower = response.data
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
                    console.log(_this.listNarrower)
                    _this.listNarrower.push(response.data)
                    _this.state = 0
                    console.log(_this.listNarrower)
                }
            }
            else {
                //update
                let item = _this.listNarrower[_this.getIndex]
                _this.initModel()
                const response = await narrowerServices.update(_this.model,item.id)
                console.log(response)
                if(response.success==true){
                    _this.listNarrower[_this.getIndex] = response.data
                    _this.state = 0
                    console.log(response.data)
                    console.log(_this.listNarrower)
                }
            }

        },
        async deleteItem(){
            let _this = this
            let id = _this.listNarrower[_this.getIndex].id
            const response = await narrowerServices.destroy(id)
            console.log(response)
            if(response.success==true){
                _this.listNarrower.splice(_this.getIndex,1)
                console.log(_this.listNarrower)
                _this.state = 0
            }
        },
        openModal(state,index){
            let _this = this
            _this.state = state
            _this.getIndex = index
            let item = _this.listNarrower[index]
            _this.root = item.root
            _this.refer = item.refer
        },
        createNarrower(){
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
                _this.title = "Update Narrower in Directionary"
                _this.submit = "Update"
            }
            else {
                _this.model = {
                    "root":"",
                    "refer":""
                }
                _this.title = "Create New Narrower in Directionary"
                _this.submit = "Create"
            }
        }
        
    },
    computed:{

    }
})