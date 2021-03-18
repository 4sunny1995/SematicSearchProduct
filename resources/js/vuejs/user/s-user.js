import Axios from "axios"
import config from "../../config"

let url = config.shopURL + "users"

let getCurrentUser = async () =>{
    const response = await Axios.get(config.shopURL+"getCurrentUser")
    return response.data
}
export default {
    getCurrentUser:getCurrentUser
}