<template>
    <div id="page-form" class="container">
        <page-header title="Cadastro de paciente." />
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
                        Cadastrar
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

    methods: {
        ...mapActions({
            create: "patient/create"
        }),

        onSubmit() {
            this.create(this.form);
        }
    },

    components: {
        HasError
    }
};
</script>
