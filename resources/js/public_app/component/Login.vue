<template>
    <h1>Login</h1>
    <div>
        <label>
            Email:
            <input type="email" name="email" v-model="this.email">
        </label>
    </div>
    <div>
        <label>
            Password:
            <input type="password" name="password" v-model="this.password">
        </label>
    </div>
    <input type="submit" value="Connect" v-on:click="login()"/>

    <div v-if="message">
        {{ message }}
    </div>
</template>

<script>


export default {
    name: "Login",
    data() {
        return {
            email: "",
            password: "",
            message: ""
        }
    },
    methods:{
        login() {
            this.axios.post('/api/login', {
                email: this.email,
                password: this.password
            })
                .then((response) => {
                    console.log(response);
                    localStorage.setItem('token', response.data.token);
                    this.message = 'redirecting.'
                    this.$router.push( '/newFeedback')
                })
                .catch((error) => {
                    this.message = "Wrong credentials"
                });
        }
    }
}
</script>

<style scoped>

</style>
