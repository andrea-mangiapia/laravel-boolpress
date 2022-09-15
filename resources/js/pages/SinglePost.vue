<template>
    <div class="container">
        <div v-if="post">
            <h1>{{ post.title }}</h1>
            <div>
                <div v-if="post.tags.length > 0">
                    <span v-for="tag in post.tags" :key="tag.id" class="badge bg-info text-light mr-1">{{ tag.name }}</span>
                </div>

                <div v-if="post.category">
                    Categoria: {{ post.category.name }}
                </div>
            </div>

            <p>{{post.content}}</p>
        </div>
        <div v-else>Loading..</div>
        
        <!-- {{$route.params.slug}} -->

    </div>
</template>


// import Axios from 'axios';

<script>
    export default {
        name: 'SinglePost',
        data() {
            return {
                post: null
            };
        },
        mounted() {
            axios.get('/api/posts/' + this.$route.params.slug)
            .then((response) => {
                // Se abbiamo trovato un post ok popoliamo thi.post e lo stampiamo
                if(response.data.success) {
                    this.post = response.data.results;
                }
                else {
                    // Altrimenti se il post non è stato trovato reindirizziamo l'utente a 404
                    this.$router.push({name: 'not-found'});
                }
            });
        }
    }
    </script>