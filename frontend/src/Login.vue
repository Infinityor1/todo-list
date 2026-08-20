<script setup>
import api from './services/api';
async function login() {
    try{
        const response = await api.post("/api/login",{
            email:email.value,
            password:password.value
        })
        console.log(response.data);
    }
    catch(error){
        console.log(error.response?.data);
    }
}
</script>
<template>
<form class="formArea" method="POST" action="/login">
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