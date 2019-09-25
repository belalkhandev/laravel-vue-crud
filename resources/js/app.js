require('./bootstrap');

window.Vue = require('vue');

window.VueRouter = require('vue-router').default;

window.VueAxios = require('vue-axios').default;

window.Axios = require('axios').default;

import AppLayout from './components/App.vue'
import ListPosts from './components/ListPost'
import AddPost from './components/AddPost'
import EditPost from './components/EditPost'
import ViewPost from './components/ViewPost'
import DeletePost from './components/DeletePost'


//registering modules
Vue.use(VueRouter, VueAxios, axios);

const routes = [
    {
        name: 'ListPosts',
        path: '/',
        component: ListPosts
    },
    {
        name: 'AddPost',
        path: '/add-post',
        component: AddPost
    },
    {
        name: 'EditPost',
        path: '/edit-post/:id',
        component: EditPost
    },
    {
        name: 'DeletePost',
        path: '/post-delete',
        component: DeletePost
    },
    {
        name: 'ViewPost',
        path: '/view/:id',
        component: ViewPost
    }
];


const router = new VueRouter(
    {
        mode: 'history',
        routes: routes
    }
);

export const app = new Vue({
    components: {
        'app-layout': AppLayout, 
        ListPosts, 
        AddPost,
        EditPost,
        DeletePost,
        ViewPost,
    },
    el: '#app',
    router,
});
