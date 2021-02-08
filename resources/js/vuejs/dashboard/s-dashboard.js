import Axios from "axios"
import config from "../../config"
let url = config.adminURL
let getBroader = async (limit)=>{
   let uri = url+'getBroader?limit='+limit
   const response = await Axios.get(uri)
   return response.data 
}
let getNarrower = async (limit)=>{
    let uri = url+'getNarrower?limit='+limit
    const response = await Axios.get(uri)
    return response.data 
 }
 let getHistory = async (limit)=>{
    let uri = url+'getHistory?limit='+limit
    const response = await Axios.get(uri)
    return response.data 
 }
 export default {
    getBroader:getBroader,
    getNarrower:getNarrower,
    getHistory:getHistory
 }