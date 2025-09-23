/**
 * Address Page Component
 */

import React, { useEffect, useState } from 'react';

const Address = () => {
    const [addresses, setAddresses] = useState([]);
    const [loading, setLoading] = useState(true);
    const [showForm, setShowForm] = useState(false);
    const [editingAddress, setEditingAddress] = useState(null);
    const [formData, setFormData] = useState({
        name: '',
        phone: '',
        address: '',
        city: '',
        state: '',
        zip_code: '',
        country: '',
        is_default: false
    });

    useEffect(() => {
        loadAddresses();
    }, []);

    const loadAddresses = async () => {
        try {
            const res = await window.axios.get('/user-addresses');
            setAddresses(res.data.addresses || []);
        } catch (error) {
            console.error('Error loading addresses:', error);
        } finally {
            setLoading(false);
        }
    };

    const handleChange = (e) => {
        setFormData({
            ...formData,
            [e.target.name]: e.target.type === 'checkbox' ? e.target.checked : e.target.value
        });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            const url = editingAddress ? `/addresses/${editingAddress.id}` : '/addresses';
            const method = editingAddress ? 'put' : 'post';
            
            const res = await window.axios[method](url, formData);
            if (res.data.success) {
                window.toastr.success(editingAddress ? 'Address updated successfully' : 'Address added successfully');
                setShowForm(false);
                setEditingAddress(null);
                setFormData({
                    name: '',
                    phone: '',
                    address: '',
                    city: '',
                    state: '',
                    zip_code: '',
                    country: '',
                    is_default: false
                });
                loadAddresses();
            }
        } catch (error) {
            console.error('Error saving address:', error);
            window.toastr.error('Error saving address');
        }
    };

    const handleEdit = (address) => {
        setEditingAddress(address);
        setFormData(address);
        setShowForm(true);
    };

    const handleDelete = async (addressId) => {
        if (window.confirm('Are you sure you want to delete this address?')) {
            try {
                const res = await window.axios.delete(`/addresses/${addressId}`);
                if (res.data.success) {
                    window.toastr.success('Address deleted successfully');
                    loadAddresses();
                }
            } catch (error) {
                console.error('Error deleting address:', error);
                window.toastr.error('Error deleting address');
            }
        }
    };

    const handleCancel = () => {
        setShowForm(false);
        setEditingAddress(null);
        setFormData({
            name: '',
            phone: '',
            address: '',
            city: '',
            state: '',
            zip_code: '',
            country: '',
            is_default: false
        });
    };

    if (loading) {
        return (
            <div className="container py-5">
                <div className="text-center">
                    <div className="spinner-border" role="status">
                        <span className="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        );
    }

    return (
        <div className="address-page">
            <div className="container py-5">
                <div className="row">
                    <div className="col-12">
                        <div className="d-flex justify-content-between align-items-center mb-5">
                            <h1>My Addresses</h1>
                            <button 
                                className="btn btn-primary"
                                onClick={() => setShowForm(true)}
                            >
                                Add New Address
                            </button>
                        </div>
                    </div>
                </div>

                {showForm && (
                    <div className="row mb-5">
                        <div className="col-lg-8 mx-auto">
                            <div className="card">
                                <div className="card-header">
                                    <h5 className="mb-0">
                                        {editingAddress ? 'Edit Address' : 'Add New Address'}
                                    </h5>
                                </div>
                                <div className="card-body">
                                    <form onSubmit={handleSubmit}>
                                        <div className="row">
                                            <div className="col-md-6 mb-3">
                                                <label htmlFor="name" className="form-label">Name *</label>
                                                <input
                                                    type="text"
                                                    className="form-control"
                                                    id="name"
                                                    name="name"
                                                    value={formData.name}
                                                    onChange={handleChange}
                                                    required
                                                />
                                            </div>
                                            <div className="col-md-6 mb-3">
                                                <label htmlFor="phone" className="form-label">Phone *</label>
                                                <input
                                                    type="tel"
                                                    className="form-control"
                                                    id="phone"
                                                    name="phone"
                                                    value={formData.phone}
                                                    onChange={handleChange}
                                                    required
                                                />
                                            </div>
                                        </div>
                                        <div className="mb-3">
                                            <label htmlFor="address" className="form-label">Address *</label>
                                            <textarea
                                                className="form-control"
                                                id="address"
                                                name="address"
                                                rows="3"
                                                value={formData.address}
                                                onChange={handleChange}
                                                required
                                            ></textarea>
                                        </div>
                                        <div className="row">
                                            <div className="col-md-4 mb-3">
                                                <label htmlFor="city" className="form-label">City *</label>
                                                <input
                                                    type="text"
                                                    className="form-control"
                                                    id="city"
                                                    name="city"
                                                    value={formData.city}
                                                    onChange={handleChange}
                                                    required
                                                />
                                            </div>
                                            <div className="col-md-4 mb-3">
                                                <label htmlFor="state" className="form-label">State *</label>
                                                <input
                                                    type="text"
                                                    className="form-control"
                                                    id="state"
                                                    name="state"
                                                    value={formData.state}
                                                    onChange={handleChange}
                                                    required
                                                />
                                            </div>
                                            <div className="col-md-4 mb-3">
                                                <label htmlFor="zip_code" className="form-label">ZIP Code *</label>
                                                <input
                                                    type="text"
                                                    className="form-control"
                                                    id="zip_code"
                                                    name="zip_code"
                                                    value={formData.zip_code}
                                                    onChange={handleChange}
                                                    required
                                                />
                                            </div>
                                        </div>
                                        <div className="mb-3">
                                            <label htmlFor="country" className="form-label">Country *</label>
                                            <input
                                                type="text"
                                                className="form-control"
                                                id="country"
                                                name="country"
                                                value={formData.country}
                                                onChange={handleChange}
                                                required
                                            />
                                        </div>
                                        <div className="mb-3 form-check">
                                            <input
                                                type="checkbox"
                                                className="form-check-input"
                                                id="is_default"
                                                name="is_default"
                                                checked={formData.is_default}
                                                onChange={handleChange}
                                            />
                                            <label className="form-check-label" htmlFor="is_default">
                                                Set as default address
                                            </label>
                                        </div>
                                        <div className="d-flex gap-2">
                                            <button type="submit" className="btn btn-primary">
                                                {editingAddress ? 'Update Address' : 'Add Address'}
                                            </button>
                                            <button type="button" className="btn btn-secondary" onClick={handleCancel}>
                                                Cancel
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                )}

                <div className="row">
                    {addresses.map(address => (
                        <div key={address.id} className="col-lg-6 mb-4">
                            <div className="card h-100">
                                <div className="card-header d-flex justify-content-between align-items-center">
                                    <h6 className="mb-0">{address.name}</h6>
                                    {address.is_default && (
                                        <span className="badge bg-primary">Default</span>
                                    )}
                                </div>
                                <div className="card-body">
                                    <p className="mb-2">{address.address}</p>
                                    <p className="mb-2">{address.city}, {address.state} {address.zip_code}</p>
                                    <p className="mb-2">{address.country}</p>
                                    <p className="mb-0"><strong>Phone:</strong> {address.phone}</p>
                                </div>
                                <div className="card-footer">
                                    <div className="d-flex gap-2">
                                        <button 
                                            className="btn btn-outline-primary btn-sm"
                                            onClick={() => handleEdit(address)}
                                        >
                                            Edit
                                        </button>
                                        <button 
                                            className="btn btn-outline-danger btn-sm"
                                            onClick={() => handleDelete(address.id)}
                                        >
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ))}
                </div>

                {addresses.length === 0 && !showForm && (
                    <div className="text-center py-5">
                        <h3>No addresses found</h3>
                        <p>Add your first address to get started!</p>
                        <button 
                            className="btn btn-primary"
                            onClick={() => setShowForm(true)}
                        >
                            Add Address
                        </button>
                    </div>
                )}
            </div>
        </div>
    );
};

export default Address;
