import PatientService, { update } from "@/services/patient.service";
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
        SET_PATIENTS(state, patients) {
            state.data = patients;
        }
    },

    actions: {
        async fetch({ commit }) {
            const patients = await PatientService.fetch();

            commit("SET_PATIENTS", patients);
        },

        async create({ commit }, form) {
            PatientService.create(form).then(() => {
                Swal.fire({
                    title: "Paciente cadastrado.",
                    icon: "success"
                });
                form.reset();
                router.push({ name: "app.patient" });
            });
        },

        async show({ commit }, id) {
            return await PatientService.show(id);
        },

        async update({ commit }, { form, id }) {
            PatientService.update(form, id).then(() => {
                Swal.fire({
                    title: "Dados alterados.",
                    icon: "success"
                });
                form.reset();
                router.push({ name: "app.patient" });
            });
        },

        async destroy({ dispatch }, patient) {
            PatientService.destroy(patient.id)
                .then(() => {
                    Swal.fire({
                        title: "Paciente excluído.",
                        icon: "success"
                    });
                    dispatch("fetch");
                })
                .catch(() => {
                    Swal.fire({
                        title: "Ocorreu um erro ao excluir o paciente.",
                        icon: "error"
                    });
                });
        }
    }
};
