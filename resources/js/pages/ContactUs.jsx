/**
 * Contact Us Page Component
 */

import React, { useEffect, useState } from 'react';

const ContactUs = () => {
    const [formData, setFormData] = useState({
        name: '',
        email: '',
        phone: '',
        subject: '',
        message: ''
    });
    const [loading, setLoading] = useState(false);
    const [submitted, setSubmitted] = useState(false);

    const handleChange = (e) => {
        setFormData({
            ...formData,
            [e.target.name]: e.target.value
        });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setLoading(true);
        
        try {
            const res = await window.axios.post('/contact', formData);
            if (res.data.success) {
                setSubmitted(true);
                setFormData({
                    name: '',
                    email: '',
                    phone: '',
                    subject: '',
                    message: ''
                });
                window.toastr.success('Message sent successfully!');
            }
        } catch (error) {
            console.error('Error sending message:', error);
            window.toastr.error('Error sending message. Please try again.');
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="contact-us-page">
            <div className="container py-5">
                <div className="row">
                    <div className="col-12">
                        <h1 className="text-center mb-5">Contact Us</h1>
                    </div>
                </div>
                <div className="row">
                    <div className="col-lg-8 mx-auto">
                        {submitted ? (
                            <div className="alert alert-success text-center">
                                <h4>Thank you for contacting us!</h4>
                                <p>We'll get back to you as soon as possible.</p>
                            </div>
                        ) : (
                            <div className="card">
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
                                                <label htmlFor="email" className="form-label">Email *</label>
                                                <input
                                                    type="email"
                                                    className="form-control"
                                                    id="email"
                                                    name="email"
                                                    value={formData.email}
                                                    onChange={handleChange}
                                                    required
                                                />
                                            </div>
                                        </div>
                                        <div className="row">
                                            <div className="col-md-6 mb-3">
                                                <label htmlFor="phone" className="form-label">Phone</label>
                                                <input
                                                    type="tel"
                                                    className="form-control"
                                                    id="phone"
                                                    name="phone"
                                                    value={formData.phone}
                                                    onChange={handleChange}
                                                />
                                            </div>
                                            <div className="col-md-6 mb-3">
                                                <label htmlFor="subject" className="form-label">Subject *</label>
                                                <input
                                                    type="text"
                                                    className="form-control"
                                                    id="subject"
                                                    name="subject"
                                                    value={formData.subject}
                                                    onChange={handleChange}
                                                    required
                                                />
                                            </div>
                                        </div>
                                        <div className="mb-3">
                                            <label htmlFor="message" className="form-label">Message *</label>
                                            <textarea
                                                className="form-control"
                                                id="message"
                                                name="message"
                                                rows="5"
                                                value={formData.message}
                                                onChange={handleChange}
                                                required
                                            ></textarea>
                                        </div>
                                        <div className="text-center">
                                            <button
                                                type="submit"
                                                className="btn btn-primary btn-lg"
                                                disabled={loading}
                                            >
                                                {loading ? (
                                                    <>
                                                        <span className="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                                        Sending...
                                                    </>
                                                ) : (
                                                    'Send Message'
                                                )}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        )}
                    </div>
                </div>
            </div>
        </div>
    );
};

export default ContactUs;
