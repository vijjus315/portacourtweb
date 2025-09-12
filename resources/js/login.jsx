import React, { useState } from 'react';
import { createRoot } from 'react-dom/client';
import './bootstrap';

function csrfToken() {
    const el = document.querySelector('meta[name="csrf-token"]');
    return el ? el.getAttribute('content') : '';
}

const Login = ({ action, passwordResetUrl }) => {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [remember, setRemember] = useState(false);
    const [errors, setErrors] = useState({});
    const [submitting, setSubmitting] = useState(false);

    const handleSubmit = async (e) => {
        e.preventDefault();
        setSubmitting(true);
        setErrors({});
        try {
            const response = await window.axios.post(
                action,
                { email, password, remember },
                { headers: { 'X-CSRF-TOKEN': csrfToken(), Accept: 'application/json' } }
            );
            if (response.status === 200 || response.status === 204) {
                window.location.href = '/';
            } else {
                window.location.reload();
            }
        } catch (err) {
            if (err.response && err.response.status === 422) {
                setErrors(err.response.data.errors || {});
            } else {
                // fallback to server-rendered validation by reloading on unknown errors
                window.location.reload();
            }
        } finally {
            setSubmitting(false);
        }
    };

    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Login</div>
                        <div className="card-body">
                            <form onSubmit={handleSubmit}>
                                <div className="row mb-3">
                                    <label htmlFor="email" className="col-md-4 col-form-label text-md-end">Email Address</label>
                                    <div className="col-md-6">
                                        <input id="email" type="email" className={`form-control ${errors.email ? 'is-invalid' : ''}`} value={email} onChange={(e) => setEmail(e.target.value)} required autoComplete="email" autoFocus />
                                        {errors.email && (
                                            <span className="invalid-feedback" role="alert">
                                                <strong>{errors.email[0]}</strong>
                                            </span>
                                        )}
                                    </div>
                                </div>

                                <div className="row mb-3">
                                    <label htmlFor="password" className="col-md-4 col-form-label text-md-end">Password</label>
                                    <div className="col-md-6">
                                        <input id="password" type="password" className={`form-control ${errors.password ? 'is-invalid' : ''}`} value={password} onChange={(e) => setPassword(e.target.value)} required autoComplete="current-password" />
                                        {errors.password && (
                                            <span className="invalid-feedback" role="alert">
                                                <strong>{errors.password[0]}</strong>
                                            </span>
                                        )}
                                    </div>
                                </div>

                                <div className="row mb-3">
                                    <div className="col-md-6 offset-md-4">
                                        <div className="form-check">
                                            <input className="form-check-input" type="checkbox" id="remember" checked={remember} onChange={(e) => setRemember(e.target.checked)} />
                                            <label className="form-check-label" htmlFor="remember">Remember Me</label>
                                        </div>
                                    </div>
                                </div>

                                <div className="row mb-0">
                                    <div className="col-md-8 offset-md-4">
                                        <button type="submit" className="btn btn-primary" disabled={submitting}>
                                            {submitting ? 'Logging in…' : 'Login'}
                                        </button>
                                        {passwordResetUrl && (
                                            <a className="btn btn-link" href={passwordResetUrl}>Forgot Your Password?</a>
                                        )}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

const mountEl = document.getElementById('react-login-root');
if (mountEl) {
    const props = {
        action: mountEl.dataset.action,
        passwordResetUrl: mountEl.dataset.passwordResetUrl || ''
    };
    const root = createRoot(mountEl);
    root.render(<Login {...props} />);
}


