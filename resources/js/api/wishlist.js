import apiClient from "./client.js";

/**
 * Get wishlist items for the current user
 */
export const getWishlistItems = async () => {
    try {
        console.log('🔍 API: Fetching wishlist items');
        const response = await apiClient.get('/wishlist/get-wishlist');
        console.log('✅ API: Wishlist items fetched successfully', response.data);
        return response.data;
    } catch (error) {
        console.error('❌ API: Error fetching wishlist items:', error);
        throw error;
    }
};

/**
 * Add product to wishlist
 * @param {number} productId - The ID of the product to add
 */
export const addToWishlist = async (productId) => {
    try {
        console.log('🔍 API: Adding product to wishlist', { product_id: productId });
        const response = await apiClient.get(`/product/fav-unfav-product?product_id=${productId}`);
        console.log('✅ API: Product added to wishlist successfully', response.data);
        return response.data;
    } catch (error) {
        console.error('❌ API: Error adding product to wishlist:', error);
        throw error;
    }
};

/**
 * Remove product from wishlist
 * @param {number} productId - The ID of the product to remove
 */
export const removeFromWishlist = async (productId) => {
    try {
        console.log('🔍 API: Removing product from wishlist', { product_id: productId });
        const response = await apiClient.get(`/product/fav-unfav-product?product_id=${productId}`);
        console.log('✅ API: Product removed from wishlist successfully', response.data);
        return response.data;
    } catch (error) {
        console.error('❌ API: Error removing product from wishlist:', error);
        throw error;
    }
};

export default {
    getWishlistItems,
    addToWishlist,
    removeFromWishlist
};
