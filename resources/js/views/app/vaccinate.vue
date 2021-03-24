<template>
    <div id="page-form" class="container">
        <page-header
            title="Vacinação"
            description="Oba! mais um paciente será vacinado."
        />
        <main>
            <form @submit.prevent="onSubmit">
                <fieldset>
                    <legend>Vacinação</legend>

                    <div class="select-block">
                        <label for="patient">Paciente</label>
                        <select v-model="form.patient_id" id="patient">
                            <option value="" disabled selected>
                                Selecione
                            </option>
                            <option
                                v-for="patient in patients"
                                :key="patient.id"
                                :value="patient.id"
                            >
                                {{ patient.name }}
                            </option>
                        </select>
                        <has-error :form="form" field="patient_id"></has-error>
                        <has-error :form="form" field="vaccinate"></has-error>
                    </div>

                    <div class="select-block">
                        <label for="vaccine">Vacina</label>
                        <select v-model="form.vaccine_id" id="vaccine">
                            <option value="" disabled selected>
                                Selecione
                            </option>
                            <option
                                v-for="vaccine in vaccines"
                                :key="vaccine.id"
                                :value="vaccine.id"
                            >
                                {{ vaccine.manufacturer }}
                            </option>
                        </select>
                        <has-error :form="form" field="vaccine_id"></has-error>
                    </div>
                </fieldset>
                <footer>
                    <div></div>
                    <button type="submit">
                        Vacinar
                    </button>
                </footer>
            </form>
        </main>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import { Form, HasError } from "vform";

export default {
    data: () => ({
        form: new Form({
            patient_id: "",
            vaccine_id: ""
        })
    }),

    created() {
        if (this.$route.params.patient) {
            this.form.patient_id = this.$route.params.patient;
        }

        this.fetchPatients();
        this.fetchVaccines();
    },

    methods: {
        ...mapActions({
            fetchPatients: "patient/fetch",
            fetchVaccines: "vaccine/fetch",
            vaccinate: "vaccinate/store"
        }),

        onSubmit() {
            this.vaccinate(this.form);
        }
    },

    computed: {
        ...mapGetters({
            patients: "patient/data",
            vaccines: "vaccine/data"
        })
    },

    components: {
        HasError
    }
};
</script>
