import "./vendor/axios";

import filters from "./filters";
import components from "./components";

export default {
    install(Vue) {
        Vue.use(filters);
        Vue.use(components);
    }
};
