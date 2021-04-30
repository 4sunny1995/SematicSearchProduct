import Axios from "axios"
import config from "../../config"

var url = config.shopURL + "myorder"

let getMyOrder = async () => {
    const response = await Axios.get(url)
    return response.data
}

export default {
    getMyOrder:getMyOrder
}