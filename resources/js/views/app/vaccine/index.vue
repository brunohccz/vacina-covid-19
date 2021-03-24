<template>
    <div id="page-list" class="container">
        <page-header title="Gerenciamento de vacinas." />
        <main>
            <div id="create">
                <router-link :to="{ name: 'app.vaccine.create' }">
                    Cadastrar
                </router-link>
            </div>
            <article
                v-for="vaccine in vaccines"
                :key="vaccine.id"
                class="item small"
            >
                <header>
                    <div>
                        <strong>{{ vaccine.manufacturer }}</strong>
                        <small>
                            Lote: {{ vaccine.batch }} | Validade:
                            {{ vaccine.due | formatDate }}
                        </small>
                    </div>
                    <div class="buttons">
                        <router-link
                            :to="{
                                name: 'app.vaccine.edit',
                                params: { id: vaccine.id }
                            }"
                            class="edit"
                        >
                            Editar
                        </router-link>
                        <a
                            @click="confirmDestroy(vaccine)"
                            class="delete"
                            href="javascript:;"
                            >Excluir</a
                        >
                    </div>
                </header>
            </article>
            <article v-if="vaccines.length === 0" class="item">
                <header>
                    <strong>Nenhuma vacina cadastrada.</strong>
                </header>
            </article>
        </main>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import Swal from "sweetalert2";

export default {
    created() {
        this.fetch();
    },

    methods: {
        ...mapActions({
            fetch: "vaccine/fetch",
            destroy: "vaccine/destroy"
        }),

        async confirmDestroy(vaccine) {
            const response = await Swal.fire({
                title: "Excluir vacina?",
                text: `Realmente deseja excluir a vacina ${vaccine.name} ?`,
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Sim",
                cancelButtonText: "Cancelar"
            });

            if (response.isConfirmed) {
                this.destroy(vaccine);
            }
        }
    },

    computed: {
        ...mapGetters({
            vaccines: "vaccine/data"
        })
    }
};
</script>
