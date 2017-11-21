<template>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created at</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users">
                <td>{{user.id}}</td>
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
                <td>{{user.created_at}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                users:[]
            }
        },

        methods: {
            remove(id, index) {
                axios.delete('/api/users/' + id)
                     .then(() => {
                         Vue.delete(this.users, index);
                     });
            }
        },

        mounted() {
            axios.get('/api/users')
                 .then(response => this.users = response.data.data);

        },

    }
</script>

