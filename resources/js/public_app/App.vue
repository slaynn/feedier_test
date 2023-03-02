<template>
    <h1>Welcome</h1>

    <br/>
    <router-link to="newFeedback">New Feedback</router-link>

    <router-view></router-view>
</template>

<script>

export default {
    name: "App",
}
</script>

<style scoped>

</style>
