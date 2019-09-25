<template id="post-list">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header text-right">
                    <router-link class="btn btn-primary" :to="{path: '/add-post'}">
                        Add New
                    </router-link>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Post title</th>
                            <th>Post Content</th>
                            <th style="width:200px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(post, index) in filteredPosts">
                            <td>{{ index + 1 }}</td>
                            <td>{{ post.title }}</td>
                            <td>{{ post.content }}</td>
                            <td>
                                <router-link class="btn btn-sm btn-info"
                                    :to="{name: 'ViewPost', params: {id: post.id}}">Show</router-link>
                                <router-link class="btn btn-sm btn-warning"
                                    :to="{name: 'EditPost', params: {id: post.id}}">Edit</router-link>
                                <router-link class="btn btn-sm btn-danger"
                                    :to="{name: 'DeletePost', params: {id: post.id}}">Delete</router-link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data: function () {
            return {
                posts: ''
            };
        },
        created: function () {
            let uri = 'http://127.0.0.1:8000/posts/';
            Axios.get(uri).then((response) => {
                this.posts = response.data;
            });
        },
        computed: {
            filteredPosts: function () {
                if (this.posts.length) {
                    return this.posts;
                }
            }
        }

    }

</script>
