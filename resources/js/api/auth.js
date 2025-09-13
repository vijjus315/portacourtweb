import apiClient from "./client.js";

export const login = (payload) => {
    return apiClient.post("/auth/login", payload).then((r) => r.data);
};

export const signup = (payload) => {
    return apiClient.post("/auth/signup", payload).then((r) => r.data);
};

export const verifyOtp = (payload) => {
    return apiClient.post("/auth/verify-otp", payload).then((r) => r.data);
};

export const resendOtp = (payload) => {
    return apiClient.post("/auth/resend-otp", payload).then((r) => r.data);
};

export const forgotPassword = (payload) => {
    return apiClient.post("/auth/forgot-password", payload).then((r) => r.data);
};

export const resetPassword = (payload) => {
    return apiClient.post("/auth/reset-password", payload).then((r) => r.data);
};

export const logout = () => {
    return apiClient.post("/auth/logout").then((r) => r.data);
};

// Utility functions for authentication state management
export const getAuthToken = () => {
    return localStorage.getItem('auth_token');
};

export const getUserData = () => {
    const userData = localStorage.getItem('user_data');
    return userData ? JSON.parse(userData) : null;
};

export const isAuthenticated = () => {
    return !!getAuthToken();
};

export const clearAuthData = () => {
    localStorage.removeItem('auth_token');
    localStorage.removeItem('user_data');
};

export default { login, signup, verifyOtp, resendOtp, forgotPassword, resetPassword, logout, getAuthToken, getUserData, isAuthenticated, clearAuthData };
