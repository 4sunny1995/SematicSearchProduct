import Axios from "axios"
import config from "../../config"

let url = config.adminURL + "crawler-histories"

let store = async (data) =>{
    const response  = await Axios.post(url,data)
    return response.data
}
let getAll = async () => {
    const response  = await Axios.get(url)
    return response.data
}
let update = async (data,id) => {
    const response  = await Axios.put(url + "/"+id,data)
    return response.data
}
let destroy = async (id) => {
    const response = await Axios.delete(url+"/"+id)
    return response.data
}
let show = async (id) => {
    const response = await Axios.get(url+"/"+id)
    return response.data
}
let crawlAll = async () => {
    const response = await Axios.get(url + "/reSpider")
    return response.data
}
let crawl = async (item) => {
    const response = await Axios.post(url + "/reSpider",item)
    return response.data
}
export default {
    store:store,
    getAll:getAll,
    update:update,
    destroy:destroy,
    show:show,
    crawlAll:crawlAll,
    crawl:crawl

}