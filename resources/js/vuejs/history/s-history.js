import Axios from "axios"
import config from "../../config"

let url = config.adminURL + "histories"
let getHistories = async ()=>{
    const responese = await Axios.get(url)
    return responese.data
}
let create = async (body)=>{
    const response = await Axios.post(url,body)
    return response.data
}
let update = async (body,id)=>{
    let uri = url + "/"+id
    const response = await Axios.put(uri,body)
    return response.data
}
let destroy = async (id)=>{
    let uri = url + "/"+id
    const response = await Axios.delete(uri)
    return response.data
}
export default {
    getHistories : getHistories,
    create : create,
    update : update,
    destroy : destroy
}