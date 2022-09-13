<template>
    <div class="container">
        <h2 class="mt-3">
            Contenuto non trovato
        </h2>

        <div>
            <p>Visita il nostro <router-link :to="{name: 'blog'}">Blog</router-link></p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'NotFound'
}
</script>