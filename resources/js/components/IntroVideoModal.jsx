import React, { useState, useEffect, useRef } from 'react';
import '../bootstrap';

const IntroVideoModal = () => {
    const [isMinimized, setIsMinimized] = useState(false);
    const videoRef = useRef(null);

    useEffect(() => {
        const modal = document.getElementById('introVideoModal');
        const video = videoRef.current;

        if (modal && video) {
            const handleShow = () => {
                // Play video when modal opens
                video.play().catch(err => {
                    console.log('Video autoplay failed:', err);
                });
            };

            const handleHide = () => {
                // Pause video when modal closes
                video.pause();
            };

            modal.addEventListener('shown.bs.modal', handleShow);
            modal.addEventListener('hidden.bs.modal', handleHide);

            return () => {
                modal.removeEventListener('shown.bs.modal', handleShow);
                modal.removeEventListener('hidden.bs.modal', handleHide);
            };
        }
    }, []);

    const handleClose = () => {
        const modal = document.getElementById('introVideoModal');
        if (modal) {
            const bootstrapModal = window.bootstrap.Modal.getInstance(modal);
            if (bootstrapModal) {
                bootstrapModal.hide();
            }
        }
    };

    const handleMinimize = () => {
        setIsMinimized(true);
        const modal = document.getElementById('introVideoModal');
        if (modal) {
            const bootstrapModal = window.bootstrap.Modal.getInstance(modal);
            if (bootstrapModal) {
                bootstrapModal.hide();
            }
        }
    };

    const handleRestore = () => {
        setIsMinimized(false);
        const modal = document.getElementById('introVideoModal');
        if (modal) {
            const bootstrapModal = new window.bootstrap.Modal(modal);
            bootstrapModal.show();
        }
    };

    return (
        <>
            {/* Main Video Modal */}
            <div 
                className="modal fade" 
                id="introVideoModal" 
                tabIndex="-1" 
                role="dialog" 
                aria-labelledby="introVideoModalLabel" 
                aria-hidden="true"
            >
                <div className="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div className="modal-content bg-transparent">
                        <div className="modal-body p-0 position-relative">
                            <button 
                                type="button" 
                                className="btn-closed border-0 bg-transparent cross" 
                                data-bs-dismiss="modal" 
                                aria-label="Close"
                                onClick={handleClose}
                            >
                                <img src={`${window.location.origin}/webassets/img/cross.svg`} alt="Close" />
                            </button>
                            <video 
                                ref={videoRef}
                                id="introVideo" 
                                width="100%" 
                                height="100%" 
                                muted 
                                autoPlay 
                                controls
                                onClick={handleMinimize}
                                style={{ cursor: 'pointer' }}
                            >
                                <source src={`${window.location.origin}/webassets/img/Introvideo.mp4`} type="video/mp4" />
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </div>

            {/* Minimized Video */}
            {isMinimized && (
                <div 
                    id="minimized-video" 
                    style={{ 
                        position: 'fixed', 
                        bottom: '20px', 
                        right: '20px', 
                        width: '300px', 
                        height: '200px', 
                        zIndex: 9999,
                        backgroundColor: '#000',
                        borderRadius: '8px',
                        overflow: 'hidden',
                        boxShadow: '0 4px 12px rgba(0,0,0,0.3)'
                    }}
                >
                    <button 
                        className="close-btn border-0 bg-transparent"
                        onClick={() => setIsMinimized(false)}
                        style={{
                            position: 'absolute',
                            top: '5px',
                            right: '5px',
                            zIndex: 10000,
                            width: '20px',
                            height: '20px',
                            background: 'rgba(0,0,0,0.5)',
                            borderRadius: '50%',
                            display: 'flex',
                            alignItems: 'center',
                            justifyContent: 'center'
                        }}
                    >
                        <img 
                            src={`${window.location.origin}/webassets/img/cross.svg`} 
                            className="w-100 h-100"
                            alt="Close"
                            style={{ width: '12px', height: '12px' }}
                        />
                    </button>
                    <video 
                        muted 
                        loop 
                        autoPlay
                        onClick={handleRestore}
                        style={{ 
                            width: '100%', 
                            height: '100%', 
                            objectFit: 'cover',
                            cursor: 'pointer'
                        }}
                    >
                        <source src={`${window.location.origin}/webassets/img/Introvideo.mp4`} type="video/mp4" />
                        Your browser does not support the video tag.
                    </video>
                </div>
            )}
        </>
    );
};

export default IntroVideoModal;
