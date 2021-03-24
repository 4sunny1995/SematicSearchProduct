var host = window.location.host
var protocol = window.location.protocol
console.log(host)
export default {
    "apiURL": protocol + "//" + host + "/api/",
    "mediaURL":protocol + "//" + host + "/imgs/",
    "basicURL":protocol + "//" + host +"/",
    "adminURL":protocol + "//" + host + "/admin/api/",
    "shopURL": protocol + "//" + host + "/shop/api/"
}