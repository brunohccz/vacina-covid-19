import VaccineService from "@/services/vaccine.service";
import router from "@/router";
import Swal from "sweetalert2";

export default {
    namespaced: true,

    state: {
        data: []
    },

    getters: {
        data: state => state.data
    },

    mutations: {
        SET_VACCINES(state, vaccines) {
            state.data = vaccines;
        }
    },

    actions: {
        async fetch({ commit }) {
            const vaccines = await VaccineService.fetch();

            commit("SET_VACCINES", vaccines);
        },

        async create({ commit }, form) {
            VaccineService.create(form).then(() => {
                Swal.fire({
                    title: "Vacina cadastrada.",
                    icon: "success"
                });
                form.reset();
                router.push({ name: "app.vaccine" });
            });
        },

        async show({ commit }, id) {
            return await VaccineService.show(id);
        },

        async update({ commit }, { form, id }) {
            VaccineService.update(form, id).then(() => {
                Swal.fire({
                    title: "Dados alterados.",
                    icon: "success"
                });
                form.reset();
                router.push({ name: "app.vaccine" });
            });
        },

        async destroy({ dispatch }, patient) {
            VaccineService.destroy(patient.id)
                .then(() => {
                    Swal.fire({
                        title: "Vacina excluída.",
                        icon: "success"
                    });
                    dispatch("fetch");
                })
                .catch(() => {
                    Swal.fire({
                        title: "Ocorreu um erro ao excluir a vacina.",
                        icon: "error"
                    });
                });
        }
    }
};
