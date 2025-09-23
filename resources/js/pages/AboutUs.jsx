/**
 * About Us Page Component
 */

import React, { useEffect, useState } from 'react';

const AboutUs = () => {
    const [content, setContent] = useState(null);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        async function loadAboutContent() {
            try {
                const res = await window.axios.get('/about-us-data');
                setContent(res.data);
            } catch (error) {
                console.error('Error loading about content:', error);
                // Set default content if API fails
                setContent({
                    title: "About PortaCourts",
                    description: "Welcome to PortaCourts, where innovation and quality meet to provide you with the best sports flooring solutions."
                });
            } finally {
                setLoading(false);
            }
        }
        loadAboutContent();
    }, []);

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
        <div className="about-us-page">
            <div className="container py-5">
                <div className="row">
                    <div className="col-12">
                        <h1 className="text-center mb-5">{content?.title || "About PortaCourts"}</h1>
                        <div className="row">
                            <div className="col-lg-8 mx-auto">
                                <div 
                                    className="about-content"
                                    dangerouslySetInnerHTML={{ 
                                        __html: content?.description || 
                                        `<p>Welcome to PortaCourts, where innovation and quality meet to provide you with the best sports flooring solutions. Our courts are designed with a professional surface grain that ensures anti-skid safety, allowing for free and dynamic movement on the court. Tailored specifically for pickleball, our floors meet the required friction coefficient standards, ensuring both performance and safety.</p>
                                        <p>At PortaCourts, we pride ourselves on using a leading process that guarantees lasting beauty. Our design layer is integrated within the board to prevent wear and maintain its original color and elegance over time, offering you a maintenance-free, cost-effective solution.</p>`
                                    }}
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default AboutUs;
