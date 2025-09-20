import apiClient from "./client.js";

export const getAddresses = async () => {
    try {
        const response = await apiClient.get("/product/get-user-addresses");
        return response.data;
    } catch (error) {
        console.error('Error fetching addresses:', error);
        throw error;
    }
};

export const addAddress = async (addressData) => {
    try {
        const response = await apiClient.post("/address/store", addressData);
        return response.data;
    } catch (error) {
        console.error('Error adding address:', error);
        throw error;
    }
};

export const deleteAddress = async (addressId) => {
    try {
        const response = await apiClient.delete(`/address/remove/${addressId}`);
        return response.data;
    } catch (error) {
        console.error('Error deleting address:', error);
        throw error;
    }
};

export default { getAddresses, addAddress, deleteAddress };
