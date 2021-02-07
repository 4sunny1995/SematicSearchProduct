import config from "../../config"

let app = new Vue({
    el:"#spider",
    data:{
        listProductCrawler:[],
        url:null,
        nameSelector:null,
        priceSelector:null,
        imageSelector:null,
        hasTag:null
    }
})