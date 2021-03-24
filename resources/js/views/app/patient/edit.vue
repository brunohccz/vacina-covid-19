<template>
    <div id="page-form" class="container">
        <page-header title="Alteração de dados do paciente." />
        <main>
            <form @submit.prevent="onSubmit">
                <fieldset>
                    <legend>Dados pessoais</legend>

                    <div class="input-block">
                        <label for="name">Nome completo</label>
                        <input v-model="form.name" type="text" id="name" />
                        <has-error :form="form" field="name"></has-error>
                    </div>

                    <div class="input-block">
                        <label for="birthday">Nascimento</label>
                        <input
                            v-model="form.birthday"
                            type="date"
                            id="birthday"
                        />
                        <has-error :form="form" field="birthday"></has-error>
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
                        Atualizar
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
            name: "",
            birthday: ""
        })
    }),

    async created() {
        const patient = await this.fetch(this.$route.params.id);

        this.form.fill(patient);
    },

    methods: {
        ...mapActions({
            fetch: "patient/show",
            update: "patient/update"
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
