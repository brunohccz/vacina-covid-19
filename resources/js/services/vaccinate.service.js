import axios from "axios";

export const fetch = async () => {
    const { data: vaccine } = await axios.get("/api/vaccinates");

    return vaccine;
};

export const store = form => {
    return form.submit("post", "/api/vaccinates");
};

export default { fetch, store };
