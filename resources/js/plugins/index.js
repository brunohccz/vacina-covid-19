import "./vendor/axios";

import components from "./components";

export default {
    install(Vue) {
        Vue.use(components);
    }
};
