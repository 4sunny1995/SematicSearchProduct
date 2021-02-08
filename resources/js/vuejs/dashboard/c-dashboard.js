import dashboardServices from './s-dashboard'
let app = new Vue({
    el:"#dashboard",
    data:{
        broader:[],
        narrower:[],
        history:[],
        limit : 10
    },
    mounted(){
        this.onLoadFunction()
    },
    created(){

    },
    methods:{
        onLoadFunction(){
            return [
                this.getBroader(),
                this.getNarrower(),
                this.getHistory(),
            ]
        },
        async getBroader(){
            let _this = this
            const response = await dashboardServices.getBroader(_this.limit)
            _this.broader = response.data
        },
        async getNarrower(){
            let _this = this
            const response = await dashboardServices.getNarrower(_this.limit)
            _this.narrower = response.data
        },
        async getHistory(){
            let _this = this
            const response = await dashboardServices.getHistory(_this.limit)
            _this.history = response.data
        },
    }
})