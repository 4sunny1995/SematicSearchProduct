import Axios from "axios"
import config from "../../config"

let uri = config.adminURL + "sendEmail"
let sendEmail = async (body) =>{
    const response = await Axios.post(uri,body)
    return response.data
}
export default {
    sendEmail : sendEmail,
    
}