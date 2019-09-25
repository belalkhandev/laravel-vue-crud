<template id="add-post">
    <div>
        <h3>Update Post</h3>
        <form v-on:submit.prevent = "updatePost">
            <div class="form-group">
                <label for="add-title">Title</label>
                <input type="text" id="add-title" v-model="post.title" class="form-control">
            </div>
            <div class="form-group">
                <label for="add-content">Content</label>
                <textarea id="add-content" class="form-control" v-model="post.content" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
            <router-link class="btn btn-warning" v-bind:to="'/'">Cancel</router-link>
        </form>
    </div>
</template>

<script>
export default {

    data () {
        return {
            post: {title: '', body:''}
        }
    },
    created: function () {
        let uri = 'http://127.0.0.1:8000/posts/'+this.$route.params.id+'/edit';
        Axios.get(uri).then((response) => {
            this.post = response.data;
        });
    },
    methods: {
        updatePost: function() {
            let uri = 'http://127.0.0.1:8000/posts/'+this.$route.params.id;
            Axios.patch(uri, this.post).then((response) => {
                this.$router.push({name: 'ListPosts'})
            });
        }
    }
    
}
</script>