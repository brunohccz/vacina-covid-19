<template>
    <div id="page-landing">
        <div id="page-landing-content" class="container">
            <div class="logo-container">
                <img src="/images/logo.png" alt="PRORADIS" />
                <h2>Sistema para controle de vacinação.</h2>
            </div>

            <img
                src="/images/landing.svg"
                alt="Controle de vacinação"
                class="hero-image"
            />

            <div class="buttons-container">
                <router-link :to="{ name: 'app.home' }" class="app">
                    Sistema
                </router-link>

                <router-link :to="{ name: 'vaccinate' }" class="vaccinate">
                    Vacinar
                </router-link>
            </div>

            <span class="total-vaccinate">
                100 pessoas vacinadas.
                <img src="/images/icons/heart.png" alt="Coração" />
            </span>
        </div>
    </div>
</template>
