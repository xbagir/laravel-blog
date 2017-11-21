<template>
    <form @submit.prevent="create">
        <div class="form-group">
            <label>Category</label>
            <select name="categoryId" class="form-control"
                    v-model="article.categoryId"
                    v-validate="'required'">
                <option value="">-</option>
                <option v-for="category in categories" :value="category.id">{{category.name}}</option>
            </select>

            <span v-show="errors.has('categoryId')" class="help is-danger">{{ errors.first('categoryId') }}</span>
        </div>
        <div class="form-group">
            <label>Title</label>
            <input name="title" type="text" class="form-control" placeholder="title"
                   v-model="article.title"
                   v-validate="'required'">

            <span v-show="errors.has('title')" class="help is-danger">{{ errors.first('title') }}</span>
        </div>
        <div class="form-group">
            <label>Subtitle</label>
            <input name="subtitle" type="text" class="form-control" placeholder="subtitle"
                   v-model="article.subtitle"
                   v-validate="'required'">

            <span v-show="errors.has('subtitle')" class="help is-danger">{{ errors.first('subtitle') }}</span>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="3"
                      v-model="article.content"
                      v-validate="'required'"></textarea>

            <span v-show="errors.has('content')" class="help is-danger">{{ errors.first('content') }}</span>
        </div>
        <div class="form-group">
            <label>Image url</label>
            <input name="image" type="text" class="form-control" placeholder="http://"
                   v-model="article.image"
                   v-validate="'url:{require_protocol}'">

            <span v-show="errors.has('image')" class="help is-danger">{{ errors.first('image') }}</span>
        </div>
        <div class="form-group">
            <label>Tags</label>
            <input name="tags" type="text" class="form-control" placeholder="tags"
                   v-model="article.tags"
                   v-validate="'required'">

            <span v-show="errors.has('tags')" class="help is-danger">{{ errors.first('tags') }}</span>
        </div>

        <button type="submit" class="btn btn-primary">Save ...</button>

        <router-link to="/articles/list" class="btn btn-info">Go Back</router-link>
    </form>
</template>
<script>
    export default {
        data() {
            return {
                article  : {},
                categories: {}
            }
        },
        mounted() {

            axios.get('/api/categories')
                 .then(response => this.categories = response.data.data);

        },
        methods: {

            goList(){
                this.$router.push('/articles/list');
            },

            create() {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        axios.post('/api/articles', this.article)
                             .then(() => {
                                 this.article = {};
                                 this.goList();
                             });
                    }
                });
            }

        }
    }
</script>
