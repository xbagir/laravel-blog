<template>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Content</th>
                <th>Created at</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="comment in comments">
                <td>{{comment.id}}</td>
                <td>{{comment.content}}</td>
                <td>{{comment.created_at}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                comments:[]
            }
        },

        mounted() {
            axios.get('/api/comments')
                 .then(response => this.comments = response.data.data);

        }

    }
</script>

