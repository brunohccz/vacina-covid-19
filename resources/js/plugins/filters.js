import formatDate from "@/filters/formatDate";
import formatDateDistance from "@/filters/formatDateDistance";

export default {
    install(Vue) {
        Vue.filter("formatDate", formatDate);
        Vue.filter("formatDateDistance", formatDateDistance);
    }
};
