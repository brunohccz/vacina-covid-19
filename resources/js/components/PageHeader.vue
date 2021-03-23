<template>
    <header class="page-header">
        <div class="top-bar-container">
            <router-link :to="{ name: 'landing' }">
                <img src="/images/back.svg" alt="Voltar" />
            </router-link>
            <navbar />
        </div>

        <div class="header-content">
            <strong>{{ title }}</strong>
            <p v-if="description">{{ description }}</p>
        </div>
    </header>
</template>

<script>
import Navbar from "./Navbar.vue";

export default {
    name: "PageHeader",
    props: {
        title: String,
        description: String
    },
    components: { Navbar }
};
</script>
