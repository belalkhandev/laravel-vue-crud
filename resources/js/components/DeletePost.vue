<template id="post-delete">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <form v-on:submit.prevent = "deletePost">
                    <button type="submit" class="btn btn-primary">Delete</button>
                    <router-link class="btn btn-warning" v-bind:to="'/'">Cancel</router-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            post: {
                title: '',
                content: ''
            }
        }
    },
    created: function () {
        let uri = 'http://127.0.0.1:8000/posts/'+this.$route.params.id+'/edit';
        Axios.get(uri).then((response) => {
            this.post = response.data;
        });
    },
    methods: {
        deletePost: function() {
            let uri = 'http://127.0.0.1:8000/posts/'+this.$route.params.id;
            Axios.delete(uri, this.post).then((response) => {
                this.$router.push({name: 'ListPosts'})
            });
        }
    }
}
</script>