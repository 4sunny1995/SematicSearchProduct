import Axios from "axios"
import config from "../../config"

var url = config.shopURL + "mywishlist"

let getMyWishList = async () => {
    const response = await Axios.get(url)
    return response.data
}
let change = async (body) =>{
    const response = await Axios.post(url,body)
    return response.data
}

export default {
    getMyWishList:getMyWishList,
    change:change
}