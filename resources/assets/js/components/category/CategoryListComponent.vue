<template>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="category in categories">
                <td>{{category.id}}</td>
                <td>{{category.name}}</td>
                <td>{{category.description}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                categories:[]
            }
        },

        mounted() {
            axios.get('/api/categories')
                 .then(response => this.categories = response.data.data);

        },
    }
</script>

