import Axios from "axios"
import config from "../../config"

let uri = config.adminURL + "narrowers"
let getNarrowers = async ()=>{
    const response = await Axios.get(uri)
    return response.data
}
let create = async (body)=>{
    const response = await Axios.post(uri,body)
    return response.data
}
let update = async (body,index)=>{
    const response = await Axios.put(uri+"/"+index,body)
    return response.data
}
let destroy = async (id)=>{
    const response = await Axios.delete(uri+"/"+id)
    return response.data
}
export default {
    getNarrowers : getNarrowers,
    create : create,
    update : update,
    destroy : destroy
}