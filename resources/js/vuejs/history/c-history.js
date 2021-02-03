import historyServices from "./s-history"

let app = new Vue({
    el:"#history",
    data:{
        listHistory:[],
        getIndex:null,
        state:0,
        model:{
            "key_word":"",
        },
        key_word:"",
        id:null,
        title:"Create Modal",
        submit:"Create New"
    },
    mounted(){
        this.onLoadFunction()
    },
    created(){

    },
    methods:{
        onLoadFunction(){
            return this.getHistories()
        },
        async getHistories(){
            let _this = this
            const response = await historyServices.getHistories()
            console.log(response.data)
            _this.listHistory = response.data
        },
        async createOrUpdate(){
            let _this = this
            if(_this.state===2){
                //create new
                _this.model = {
                    "key_word":_this.key_word,
                }
                const response = await historyServices.create(_this.model)
                if(response.success==true){
                    console.log(_this.listHistory)
                    _this.listHistory.push(response.data)
                    _this.state = 0
                    console.log(_this.listHistory)
                }
            }
            else {
                //update
                let item = _this.listHistory[_this.getIndex]
                _this.initModel()
                const response = await historyServices.update(_this.model,item.id)
                console.log(response)
                if(response.success==true){
                    _this.listHistory[_this.getIndex] = response.data
                    _this.state = 0
                    console.log(response.data)
                    console.log(_this.listHistory)
                }
            }
        },
        async deleteItem(){
            let _this = this
            let id = _this.listHistory[_this.getIndex].id
            const response = await historyServices.destroy(id)
            console.log(response)
            if(response.success==true){
                _this.listHistory.splice(_this.getIndex,1)
                console.log(_this.listHistory)
                _this.state = 0
            }
        },
        openModal(state,index){
            let _this = this
            _this.state = state
            _this.getIndex = index
            if(state===2){
                _this.key_word = ""
            }
            else {
                let item = _this.listHistory[index]
                _this.key_word = item.key_word
            }
            
        },
        initModel(){
            let _this = this
            _this.model = {
                "key_word":_this.key_word,
            }
            if(_this.state===1){
                _this.title = "Update History"
                _this.submit = "Update"
            }
            else {
                _this.title = "Create New History"
                _this.submit = "Create"
            }
        }
    },
    computed:{

    }
})