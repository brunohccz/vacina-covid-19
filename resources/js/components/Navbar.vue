<template>
    <div class="menu-wrap">
        <input type="checkbox" class="toggler" v-model="toggler" />
        <div class="hamburguer">
            <div></div>
        </div>
        <div class="menu">
            <div class="">
                <div class="">
                    <ul>
                        <li>
                            <router-link
                                :to="{ name: 'app.home' }"
                                class="router"
                            >
                                Inicio
                            </router-link>
                        </li>
                        <li>
                            <router-link
                                :to="{ name: 'app.patient' }"
                                class="router"
                            >
                                Pacientes
                            </router-link>
                        </li>
                        <li>
                            <router-link
                                :to="{ name: 'app.vaccine' }"
                                class="router"
                            >
                                Vacinas
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
        toggler: false
    }),

    mounted() {
        const routes = document.getElementsByClassName("router");

        Array.from(routes).forEach(router => {
            router.addEventListener("click", () => (this.toggler = false));
        });
    }
};
</script>
