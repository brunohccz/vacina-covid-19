import axios from "axios";

export const fetch = async () => {
    const { data: vaccine } = await axios.get("/api/vaccines");

    return vaccine;
};

export const create = form => {
    return form.submit("post", "/api/vaccines");
};

export const show = async id => {
    const { data: patient } = await axios.get(`/api/vaccines/${id}`);

    return patient;
};

export const update = (form, id) => {
    return form.submit("put", `/api/vaccines/${id}`);
};

export const destroy = async id => {
    return await axios.delete(`/api/vaccines/${id}`);
};

export default { fetch, create, show, update, destroy };
