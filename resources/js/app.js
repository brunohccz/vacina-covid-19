import Vue from "vue";
import VueRouter from "vue-router";

import store from "@/store";
import router from "@/router/index";

import plugins from "@/plugins/index";

Vue.config.productionTip = false;

Vue.use(plugins);
Vue.use(VueRouter);

new Vue({
    el: "#app",
    store,
    router
});
