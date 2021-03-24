import VaccinateService from "@/services/vaccinate.service";
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
        SET_VACCINATES(state, vaccinates) {
            state.data = vaccinates;
        }
    },

    actions: {
        async fetch({ commit }) {
            const vaccines = await VaccinateService.fetch();

            commit("SET_VACCINATES", vaccines);
        },

        async store({ commit }, form) {
            VaccinateService.store(form).then(() => {
                Swal.fire({
                    title: "Paciente vacinado!",
                    icon: "success"
                });
                form.reset();
                router.push({ name: "app.home" });
            });
        }
    }
};
