import Axios from "axios"
import config from "../../config"
let getBroaders = async (url)=>{
    let uri = config.adminURL + url
    const response = await Axios.get(uri)
    return response.data
}
export default {
    getBroaders : getBroaders
}