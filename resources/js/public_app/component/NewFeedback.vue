<template>
    <h1>New Feedback</h1>
    <div>
        <label for="comment">Comment : </label>
        <textarea v-model="comment" name="comment"></textarea>
    </div>

    <input type="submit" value="submit" v-on:click="submitFeedback">

    <div v-if="message">
        {{ message }}
    </div>
</template>

<script>
export default {
    name: "NewFeedback",
    data() {
        return {
            message: "",
            comment: "",
        }
    },
    methods: {
        submitFeedback() {
            this.axios.post('/api/feedbacks', {
                comment: this.comment,
            })
                .then((response) => {
                    console.log(response);
                    this.message = 'Your feedback has been saved.'
                    this.comment = "";
                })
                .catch((error) => {
                    //console.log('erreur : ' + error.response.data.message);
                    this.message = error.response.data.message
                });

        }
    }
}
</script>

<style scoped>

</style>
