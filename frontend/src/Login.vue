<script setup>
import api from './services/api';
import { ref,onMounted } from 'vue';
import { useRouter } from 'vue-router';
import getCsrfToken from './services/getToken';
const email=ref('');
const password=ref('');
const router=useRouter();
async function login(event) {
    event.preventDefault();
    try{
        const response = await api.post("/api/login",{
            email:email.value,
            password:password.value
        },{
            headers:{
              //  'X-CSRF-TOKEN': await getCsrfToken(),
            }
        })

    // Overwrite the dead pre-login token with the new authenticated token
    //api.defaults.headers.common['X-CSRF-TOKEN'] = response.data.csrf_token;
    
    // Proceed to dashboard
        console.log(response.data);
        console.log(response.config.headers);
        await router.push("/");
    }
    catch(error){
        console.log(error.response?.config.headers);
        console.log(error.response?.data);
    }
}

</script>
<template>
<form class="formArea" id="loginForm" method="POST" @submit.prevent="login">
    <label>Email</label>
    <input type="email" name="email" v-model='email' placeholder="test@gmail.com" autocomplete="on" required>
    <label>Password</label>
    <input type="password" name="password" v-model='password' placeholder="1234" required>
    <button type="submit">Submit</button>
</form>
</template>
<style scoped>
.formArea{
    display:flex;
    flex-direction:column;
}
</style>