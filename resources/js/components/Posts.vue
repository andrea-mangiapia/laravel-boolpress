<template>
        <section>
            <div class="container">
                <div>
                    <a href="/admin">Admin privata</a>
                </div>


                <h1>Tutti i post</h1>

                <div class="row row-cols-3">
                    <!-- single col -->
                    <div v-for="post in posts" :key="post.id" class="col">
                        <div class="card mt-3" style="width: 18rem;">
                            <!-- <img src="..." class="card-img-top" alt="..."> -->
                            <div class="card-body">
                                <h5 class="card-title">{{post.title}}</h5>
                                <p class="card-text">{{truncateText(post.content)}}</p>
                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
</template>

<script>
import Axios from 'axios';
import { getProcessArgvWithoutBin } from 'yargs/build/lib/process-argv';

export default {
    name: 'Posts',
    data() {
        return {
            posts: []
        };
    },
    methods: {
        truncateText(text) {
            if(text.length > 75) {
                return text.slice(0, 70) + '...';
            }

            return text;
        },
        getPosts() {
            Axios.get('/api/posts')
            .then((response) => {
                // console.log(response.data.results);
                this.posts = response.data.results;
            });
        }
    },
    mounted() {
        this.getPosts();        

    }
}
</script>