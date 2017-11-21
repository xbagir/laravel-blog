export default [
    { path: '/articles', component: require('./components/article/ArticleComponent.vue'),
        children: [
            {
                path: '/',
                redirect: '/articles/list'
            },
            {
                path: 'list',
                component: require('./components/article/ArticleListComponent.vue')
            },
            {
                path: 'create',
                component: require('./components/article/ArticleCreateComponent.vue')
            }
        ]
    }
]


