import Vue from "vue";
import Vuex from "vuex";

import patient from "./modules/patient";
import vaccine from "./modules/vaccine";
import vaccinate from "./modules/vaccinate";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        patient,
        vaccine,
        vaccinate
    }
});
