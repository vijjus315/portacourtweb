import apiClient from "./client.js";

export const login = (payload) => {
    return apiClient.post("/auth/login", payload).then((r) => r.data);
};

export const signup = (payload) => {
    return apiClient.post("/auth/signup", payload).then((r) => r.data);
};

export default { login, signup };
