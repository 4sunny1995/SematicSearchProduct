import leftmenuServices from "./s-leftmenu"
var app = new Vue({
  el:"#leftmenu",
  data:{
    categoryParents:[],
    categories:[],
    isLoading : true
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
    },
    async getCategoryParent(){
      const response = await leftmenuServices.getCategoryParent()
      this.categoryParents = response.data
      this.isLoading = false
    }
  }
})