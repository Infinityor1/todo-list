import { createApp } from 'vue'
import App from './App.vue'
import List from './List.vue'
import Login from './Login.vue'
import { createMemoryHistory, createRouter } from 'vue-router'
import Register from './Register.vue'
import api from './services/api.js'
const routes =[{"path":"/","component":List,"meta":{"auth":true}},{"path":"/register","component":Register},{"path":"/login","component":Login},]
const router = createRouter({
    history: createMemoryHistory(),
    routes,
})
router.beforeEach(async(to)=>{
    if(!to.meta.auth)return true;
    try{
        console.log('try get user');
        await api.get('/api/user')
        return true
    }
    catch(error){
        if(error.response?.status===401){
           await router.push("/login");
        }
        console.log(error);
        return false
    }
})
createApp(App).use(router).mount('#app')
