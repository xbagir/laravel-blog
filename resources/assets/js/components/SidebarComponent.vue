<template>
    <ul class="nav nav-sidebar">
        <li v-for="section in sections" :class="{ active: isActive(section) }">
            <a href="javascript:;" @click="selectSection(section)">
                {{ section  }} <span class="sr-only" v-if="isActive(section)">(current)</span>
            </a>
        </li>
    </ul>
</template>

<script>
    export default {
        data () {
            return {
                selected: 'Articles',
                sections: [
                    'Articles',
                    'Discussion',
                    'Comments',
                    'Users'
                ]
            }
        },

        methods: {
            isActive(section){
                return section === this.selected;
            },
            selectSection(section){
                this.selected = section;
                this.$router.push('/' + section.toLowerCase() + '/list');
            }
        }

    }
</script>
