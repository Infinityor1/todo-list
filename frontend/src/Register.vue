<script setup>
</script>
<template>
<form class="formArea" method="POST" action="/register">
    <label>Name</label>
    <input type="text" name="name" v-model='name'  placeholder="Test" autocomplete="on">
    <label>Email</label>
    <input type="email" name="email" v-model='email' placeholder="test@gmail.com" autocomplete="on">
    <label>Password</label>
    <input type="password" name="password" v-model='password'placeholder="1234">
    <label>Confirm Password</label>
    <input type="password" name="password_confirmation" v-model='password_confirmation' placeholder="1234">
    <button type="submit">Submit</button>
</form>
</template>
<style scoped>
.formArea{
    display:flex;
    flex-direction:column;
}
</style>