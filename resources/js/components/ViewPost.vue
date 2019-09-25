<template id="post-view">
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="post">
                <div class="post-title">
                    <h2>{{ post.title }}</h2>
                </div>
                <div class="post-body">
                    <p>{{ post.content }}</p>
                </div>
                <div class="post-footer">
                    <router-link :to="'/'" class="btn btn-success">Back to Home page</router-link>
                </div>
            </div>
        </div>
        
    </div>
</div>
    
</template>

<script>
export default {
    data:function() {
        return {
            post: {title: '', content: ''}
        };
    },
    created: function() {
        let uri = 'http://127.0.0.1:8000/posts/'+this.$route.params.id;
        Axios.get(uri).then((response) => {
            this.post = response.data;
        });
    }

}
</script>