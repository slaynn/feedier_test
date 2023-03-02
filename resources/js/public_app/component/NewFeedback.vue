<template>
    <h1>New Feedback</h1>
    <div>
        <label for="comment">Comment : </label>
        <textarea v-model="comment" name="comment"></textarea>
    </div>
    <div>
        <label for="rating">Rating : </label>
        <select v-model="rating" name="rating">
            <option v-for="i in 5" :value="i">{{i}}</option>
        </select>
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
            rating: 0,
        }
    },
    methods: {
        submitFeedback() {
            this.axios.post('/api/feedbacks', {
                comment: this.comment,
                rating: this.rating
            })
                .then((response) => {
                    console.log(response);
                    this.message = 'Your feedback has been saved.'
                    this.comment = "";
                    this.rating = 0;
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
