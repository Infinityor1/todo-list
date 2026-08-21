import axios from "axios";
import api from "./api";
async function getCsrfToken(){
try {
    let csrf_token;
    const response = await api.get("/api/get-csrf-token");
    csrf_token=response.data.csrf_token;
    console.log(csrf_token);
    return csrf_token;
}catch(err){
    console.log(err.message);
    return false;
}}

export default getCsrfToken;

//not used