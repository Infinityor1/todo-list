<script setup>
import { onMounted } from 'vue';
import api from './services/api';
import getCsrfToken from './services/getToken';
import { useRouter } from 'vue-router';
const router = useRouter();
async function logout() {
    console.log("logging out...");
    try{
        const response = await api.post("/api/logout",
        {
            headers:{
               // 'X-CSRF-TOKEN': await getCsrfToken(),
            }
        }).then(response => {
      // Manually set the new CSRF token for future requests
      //axios.defaults.headers.common['X-CSRF-TOKEN'] = response.data.csrf_token;
      console.log('redirecting to login')
      // Proceed with redirecting to the login page
      router.push('/login');
  });
}
catch(err){
    console.log(err.response?.data);
    console.log(err.message);
}}

</script>
<template>
    <div>
        TODOLIST
    </div>
    <button @click="logout">Logout</button>
</template>