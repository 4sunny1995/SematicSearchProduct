import Axios from "axios"
import config from "../../config"

let url = config.shopURL + "users"

let getCurrentUser = async () =>{
    const response = await Axios.get(config.shopURL+"getCurrentUser")
    return response.data
}
let getUserById = async (id) =>{
    const response = await Axios.get(config.shopURL + "getUserById/" + id)
    return response.data
}
let update = async(body,id) => {
    const response = await Axios.put(url + "/"+id,body)
    return response.data
}
export default {
    getCurrentUser:getCurrentUser,
    getUserById:getUserById,
    update:update
}