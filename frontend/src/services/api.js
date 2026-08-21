import axios from 'axios'
const api = axios.create({
    baseURL:'http://localhost:8000',
    withCredentials:true,
    withXSRFToken:true, //essential to allow cross site
},{
    headers:{
        'accept':'application/json',
        'x-requested-with':"XMLHttpRequest"
    }
})
export default api