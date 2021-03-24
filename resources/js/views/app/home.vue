<template>
    <div id="page-list" class="container">
        <page-header title="Relatório de vacinação." />
        <main>
            <article
                v-for="vaccinate in vaccinates"
                :key="vaccinate.id"
                class="item"
            >
                <header>
                    <div>
                        <strong>{{ vaccinate.patient.name }}</strong>
                        <span> {{ vaccinate.patient.age }} anos </span>
                    </div>
                </header>

                <p>
                    Vacina:
                    <strong>{{ vaccinate.vaccine.manufacturer }}</strong>
                </p>
                <p>
                    Vacinado {{ vaccinate.vaccinated_at | formatDateDistance }}
                </p>

                <footer v-if="vaccinate.next">
                    <p>
                        Próxima dose
                        <strong>{{ vaccinate.next | formatDate }}</strong>
                    </p>
                    <router-link
                        v-if="canVaccinate(vaccinate.next)"
                        :to="{
                            name: 'vaccinate',
                            params: { patient: vaccinate.patient.id }
                        }"
                    >
                        Vacinar
                    </router-link>
                </footer>

                <footer v-else>
                    <p>Paciente tomou todas doses.</p>
                </footer>
            </article>
            <article v-if="vaccinates.length === 0" class="item">
                <header>
                    <strong>Nenhum paciente vacinado :(</strong>
                </header>
            </article>
        </main>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import { isToday, isPast } from "date-fns";

export default {
    created() {
        this.fetch();
    },

    methods: {
        ...mapActions({
            fetch: "vaccinate/fetch",
            store: "vaccinate/store"
        }),

        canVaccinate(datestring) {
            const date = new Date(datestring);

            return isToday(date) || isPast(date);
        }
    },

    computed: {
        ...mapGetters({
            vaccinates: "vaccinate/data"
        })
    }
};
</script>
