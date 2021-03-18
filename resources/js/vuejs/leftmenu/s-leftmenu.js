import Axios from "axios"
import config from "../../config"


let url = config.shopURL + "categoryParents"

let getCategoryParent = async () =>{
    const response = await Axios.get(url)
    return response.data
}

export default {
    getCategoryParent : getCategoryParent
}