import broaderServices from "./s-broader"
let app = new Vue({
    el:"#broader",
    data:{
        listBroader:null,
        state:0,
        getIndex:null,
        model:{
            "root":"",
            "refer":""
        },
        title:"Create Modal",
        error:null,
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
            const response = await broaderServices.getBroaders('broaders')
            console.log(response)
            _this.listBroader = response
        },
        openModal(state,index){
            let _this = this
            _this.state = state
            _this.getIndex = index
        },
        createBroader(){
            let _this = this
            //create state
            _this.state = 2
            _this.model = {
                "root":"",
                "refer":""
            }
            _this.title = "Create New Broader in Directionary"

        },
        initModel(){
            let _this = this
            let state = _this.state
            switch (state) {
                case 1:
                    //edit state
                    _this.model = _this.listBroader[_this.getIndex]
                    break;
                case -1:
                    
                    break;
            
                default:
                    break;
            }
        }
    },
    computed:{

    }
})