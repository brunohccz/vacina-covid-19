<template>
    <div id="page-form" class="container">
        <page-header title="Alteração de dados da vacina." />
        <main>
            <form @submit.prevent="onSubmit">
                <fieldset>
                    <legend>Dados</legend>

                    <div class="input-block">
                        <label for="manufacturer">Fabricante</label>
                        <input
                            v-model="form.manufacturer"
                            type="text"
                            id="manufacturer"
                        />
                        <has-error
                            :form="form"
                            field="manufacturer"
                        ></has-error>
                    </div>

                    <div class="input-block">
                        <label for="batch">Lote</label>
                        <input v-model="form.batch" type="text" id="batch" />
                        <has-error :form="form" field="batch"></has-error>
                    </div>

                    <div class="input-block">
                        <label for="due">Data de validade</label>
                        <input v-model="form.due" type="date" id="due" />
                        <has-error :form="form" field="due"></has-error>
                    </div>

                    <div class="input-block">
                        <label for="doses">Doses</label>
                        <input v-model="form.doses" type="number" id="doses" />
                        <has-error :form="form" field="doses"></has-error>
                    </div>

                    <div class="input-block">
                        <label for="interval"
                            >Intervalo mínimo entre doses</label
                        >
                        <input
                            v-model="form.interval"
                            type="number"
                            id="interval"
                        />
                        <has-error :form="form" field="interval"></has-error>
                    </div>
                </fieldset>
                <footer>
                    <p>
                        <img
                            src="/images/icons/warning.svg"
                            alt="Aviso importante"
                        />
                        Importante! <br />
                        Preencha todos os dados
                    </p>
                    <button type="submit">
                        Alterar
                    </button>
                </footer>
            </form>
        </main>
    </div>
</template>

<script>
import { mapActions } from "vuex";
import { Form, HasError } from "vform";

export default {
    data: () => ({
        form: new Form({
            manufacturer: "",
            batch: "",
            doses: "",
            due: "",
            interval: ""
        })
    }),

    async created() {
        const vaccine = await this.fetch(this.$route.params.id);

        this.form.fill(vaccine);
    },

    methods: {
        ...mapActions({
            fetch: "vaccine/show",
            update: "vaccine/update"
        }),

        onSubmit() {
            this.update({
                id: this.$route.params.id,
                form: this.form
            });
        }
    },

    components: {
        HasError
    }
};
</script>
