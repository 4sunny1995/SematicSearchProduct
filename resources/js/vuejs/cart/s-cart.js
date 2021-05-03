import Axios from "axios"
import config from "../../config"

var url = config.shopURL + "mycart"

let getMyCart = async () => {
    const response = await Axios.get(url)
    return response.data
}
let change = async (body) =>{
    const response = await Axios.post(url,body)
    return response.data
}
let removeItems = async (arrayList) => {
    const response = await Axios.post(`${url}/removeItems`,arrayList)
    return response.data
}

export default {
    getMyCart:getMyCart,
    change:change,
    removeItems:removeItems
}