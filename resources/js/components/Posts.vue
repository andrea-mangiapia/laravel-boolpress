<template>
        <section>
            <div class="container">

                <h2>{{ title }}</h2>

                <div class="row row-cols-3">
                    <!-- single col -->
                    <div v-for="singlePost in posts" :key="singlePost.id" class="col">
                        <PostDetails :post="singlePost" />
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
import PostDetails from './PostDetails.vue';

export default {
    name: "Posts",
    components: { 
        PostDetails
    },
    data() {
        return {
            title: "Tutti i post",
            posts: [],
            currentPaginationPage: 1,
            lastPaginationPage: null
        };
    },
    methods: {
        getPosts(pageNumber) {
            axios.get("/api/posts", {
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
    },
    
}
</script>