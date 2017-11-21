<template>
    <ul class="nav nav-sidebar">
        <li v-for="(url, section) in sections">
            <router-link :to="url">
                {{ section  }}<span class="sr-only">(current)</span>
            </router-link>
        </li>
    </ul>
</template>

<script>
    export default {
        data () {
            return {
                sections: {
                    Users     : '/users',
                    Articles  : '/articles',
                    Categories: '/categories',
                    Comments  : '/comments'
                }
            }
        }
    }
</script>
