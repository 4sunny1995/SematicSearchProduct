import Vue from "vue"
import config from "../../config"
import userServices from "./s-user"
let app = new Vue({
    el:"#profile",
    data:{
        user:null,
        id:null,
        email:'',
        name:'',
        state:0,
        description:"",
        address:"",
        avatar:null,
        dateOfBirth:'',
        gender:0,
        phone:'',
        isAction:0,
        isLoading:false,
        imgURL:config.basicURL,
        break:0
    },
    mounted(){
        this.onLoadFuntion()
    },
    methods:{
        async onLoadFuntion(){
            if(this.break==0){
                this.id=window.localStorage.getItem('user_id')
                this.getProfile()
                this.break=1
            } 
        },
        editProfile(){
            this.isAction = 1
            this.initModel()
        },
        async getProfile(){
            var _this = this
            console.log(_this.id)
            _this.isLoading = true
            const response = await userServices.getUserById(_this.id)
            _this.user = response.data
            _this.initModel()
            _this.isLoading = false
            if(response.data.avatar)_this.avatar = response.data.avatar.avatar

        },
        async updateInformation(){
            var _this = this
            _this.isLoading = true
            var body = {
                "address":_this.address,
                "phone":_this.phone,
                "gender":_this.gender,
                "dateOfBirth":_this.dateOfBirth,
                "description":_this.description
            }
            const response = await userServices.update(body,_this.id)
            _this.user = response.data
            _this.initModel()
            console.log(_this.user)
            _this.isAction = 0
            _this.isLoading = false
        },
        initModel(){
            var _this = this
            _this.phone = _this.user.information.phone
            _this.address = _this.user.information.address
            _this.gender = _this.user.information.gender
            _this.dateOfBirth = _this.user.information.dateOfBirth
            _this.description = _this.user.information.description
        },
        backHistory(){
            window.history.back()
        }
    }
})
