<template>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Boolpress</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li v-for="link, index in menuLinks" :key="index" class="nav-item">
                                <router-link :to="{name: link.name}" class="nav-link">{{link.label}}</router-link>
                            </li>                            
                            
                        </ul>
                        <div class="d-flex">
                            <div>
                                <a class="btn btn-primary" href="/admin">Admin privata</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

        </div>
    </header>
</template>

<script>
import { data } from 'browserslist';

export default {
    name: 'MainHeader',
    data() {
        return {
            menuLinks: [
                {
                    name: 'home',
                    label: 'Home'
                },
                {
                    name: 'about',
                    label: 'About'
                },
                {
                    name: 'blog',
                    label: 'Blog'
                },
            ],
        };
    },
}
</script>