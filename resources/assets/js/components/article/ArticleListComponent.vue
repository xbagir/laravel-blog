<template>
    <div class="table-responsive">
        <router-link to="/articles/create" class="btn btn-success">Create article</router-link>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Content</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(article, index) in articles">
                <td>{{article.id}}</td>
                <td>{{article.title}}</td>
                <td>{{article.created_at}}</td>
                <td>
                    <a href="javascript:;" @click="remove(article.id, index)">delete</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                articles:[]
            }
        },

        methods: {
            remove(id, index) {
                axios.delete('/api/articles/' + id)
                     .then(() => {
                         Vue.delete(this.articles, index);
                     });
            }
        },

        mounted() {
            axios.get('/api/articles')
                 .then(response => this.articles = response.data.data);

        },

    }
</script>

