import axios from "axios";

export const fetch = async () => {
    const { data: patients } = await axios.get("/api/patients");

    return patients;
};

export const create = form => {
    return form.submit("post", "/api/patients");
};

export const show = async id => {
    const { data: patient } = await axios.get(`/api/patients/${id}`);

    return patient;
};

export const update = (form, id) => {
    return form.submit("put", `/api/patients/${id}`);
};

export const destroy = async id => {
    return await axios.delete(`/api/patients/${id}`);
};

export default { fetch, create, show, update, destroy };
