export default [

    { path: '/users', component: require('./components/user/UserComponent.vue'),
        children: [
            {
                path: '/',
                component: require('./components/user/UserListComponent.vue')
            },
        ]
    },

    { path: '/articles', component: require('./components/article/ArticleComponent.vue'),
        children: [
            {
                path: '/',
                component: require('./components/article/ArticleListComponent.vue')
            },
            {
                path: 'create',
                component: require('./components/article/ArticleCreateComponent.vue')
            }
        ]
    },

    { path: '/categories', component: require('./components/category/CategoryComponent.vue'),
        children: [
            {
                path: '/',
                component: require('./components/category/CategoryListComponent.vue')
            },
        ]
    },

    { path: '/comments', component: require('./components/comment/CommentComponent.vue'),
        children: [
            {
                path: '/',
                component: require('./components/comment/CommentListComponent.vue')
            },
        ]
    }

]


