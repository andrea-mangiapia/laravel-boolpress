<template>
        <section>
            <div class="container">

                <h2>{{ title }}</h2>

                <div class="row row-cols-3">
                    <!-- single col -->
                    <div v-for="post in posts" :key="post.id" class="col">
                        <div class="card mt-3" style="width: 18rem;">
                            <!-- <img src="..." class="card-img-top" alt="..."> -->
                            <div class="card-body">
                                <h5 class="card-title">{{post.title}}</h5>
                                <p class="card-text">{{truncateText(post.content)}}</p>
                                <router-link class="btn btn-primary" :to="{name: 'single-post', params: { slug: post.slug }}">
                                    Leggi
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>

                <nav class="mt-3">
                    <ul class="pagination">
                        <!-- Previous button -->
                        <li class="page-item" :class="{'disabled' : currentPaginationPage == 1}">
                            <a class="page-link" @click="getPosts(currentPaginationPage - 1)" href="#">Previous</a>
                        </li>
                        
                        <!-- Page number buttons -->
                        <li v-for="pageNumber in lastPaginationPage" :key="pageNumber" class="page-item" :class="{'active': pageNumber == currentPaginationPage}">
                            <a @click.prevent="getPosts(pageNumber)" class="page-link" href="#">{{ pageNumber }}</a>
                        </li>

                        <!-- Next button -->
                        <li class="page-item" :class="{'disabled': currentPaginationPage == lastPaginationPage}">
                            <a class="page-link" @click="getPosts(currentPaginationPage + 1)" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
</template>

<script>
// import axios from 'axios';
// import { getProcessArgvWithoutBin } from 'yargs/build/lib/process-argv';

export default {
    name: 'Posts',
    data() {
        return {
            title: 'Tutti i post',
            posts: [],
            currentPaginationPage: 1,
            lastPaginationPage: null
        };
    },
    methods: {
        truncateText(text) {
            if(text.length > 75) {
                return text.slice(0, 75) + '...';
            }

            return text;
        },
        getPosts(pageNumber) {
            axios.get('/api/posts', {
                params: {
                    page: pageNumber
                }
            })
            .then((response) => {
                // console.log(response.data.results);
                this.posts = response.data.results.data;
                this.currentPaginationPage = response.data.results.current_page;
                this.lastPaginationPage = response.data.results.last_page;
            });
        }
    },
    mounted() {
        this.getPosts();        

    }
}
</script>