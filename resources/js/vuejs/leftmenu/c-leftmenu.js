import leftmenuServices from "./s-leftmenu"
import userServices from "../user/s-user"
var app = new Vue({
  el:"#leftmenu",
  data:{
    categoryParents:[],
    categories:[],
    isLoading : true,
    currentUser : null
  },
  mounted(){
    this.onLoadFunction()
  },
  computed:{

  },
  created(){

  },
  methods:{
    onLoadFunction(){
      this.getCategoryParent()
      this.getCurrentUser()
    },
    async getCategoryParent(){
      const response = await leftmenuServices.getCategoryParent()
      this.categoryParents = response.data
      this.isLoading = false
    },
    async getCurrentUser(){
      const response = await userServices.getCurrentUser()
      this.currentUser = response.data
      window.localStorage.setItem('user_id',response.data.id)
    },
    gotoReward(){
      window.location.href = '/shopping/reward'
    },
    gotoCredit(){
      window.location.href = '/shopping/credit'
    },
    gotoCoupon(){
      window.location.href = '/shopping/coupon'
    }
  }
})