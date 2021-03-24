<template>
    <div id="page-list" class="container">
        <page-header title="Gerenciamento de pacientes." />
        <main>
            <div id="create">
                <router-link :to="{ name: 'app.patient.create' }">
                    Cadastrar
                </router-link>
            </div>
            <article
                v-for="patient in patients"
                :key="patient.id"
                class="item small"
            >
                <header>
                    <div>
                        <strong>{{ patient.name }}</strong>
                        <span> {{ patient.age }} anos </span>
                    </div>
                    <div class="buttons">
                        <router-link
                            :to="{
                                name: 'app.patient.edit',
                                params: { id: patient.id }
                            }"
                            class="edit"
                        >
                            Editar
                        </router-link>
                        <a
                            @click="confirmDestroy(patient)"
                            class="delete"
                            href="javascript:;"
                            >Excluir</a
                        >
                    </div>
                </header>
            </article>
            <article v-if="patients.length === 0" class="item">
                <header>
                    <strong>Nenhum paciente cadastrado.</strong>
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
            fetch: "patient/fetch",
            destroy: "patient/destroy"
        }),

        async confirmDestroy(patient) {
            const response = await Swal.fire({
                title: "Excluir paciente",
                text: `Realmente deseja excluir o paciente ${patient.name} ?`,
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Sim",
                cancelButtonText: "Cancelar"
            });

            if (response.isConfirmed) {
                this.destroy(patient);
            }
        }
    },

    computed: {
        ...mapGetters({
            patients: "patient/data"
        })
    }
};
</script>
