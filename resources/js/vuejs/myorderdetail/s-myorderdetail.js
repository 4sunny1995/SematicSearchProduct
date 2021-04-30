import Axios from "axios"
import config from "../../config"

var url = config.shopURL + "myorderdetail"

let getMyOrderDetail = async (id) => {
    const response = await Axios.get(url+'/'+id)
    return response.data
}

export default {
    getMyOrderDetail:getMyOrderDetail
}