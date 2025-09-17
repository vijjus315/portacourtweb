import React, { useState } from "react";
import { signup } from "../api/auth.js";
import { checkAndOpenOTPVerification } from "../utils/otpVerification.js";

function getCsrf() {
    // Look for a <meta> tag in the HTML with name="csrf-token"
    const el = document.querySelector('meta[name="csrf-token"]');
    
    // If the element exists, return the value of its "content" attribute
    // Otherwise, return an empty string
    return el ? el.getAttribute('content') : '';
}

const SignupModal = () => {
  const [inputName, setInputName] = useState("");
  const [email, setEmail] = useState("");
  const [phoneNumber, setPhoneNumber] = useState("");
  const [password, setPassword] = useState("");
  const [confirmPassword, setConfirmPassword] = useState("");
  const [submitting, setSubmitting] = useState(false);
  const [errors, setErrors] = useState({});
  const [showPassword, setShowPassword] = useState(false);
  const [showConfirmPassword, setShowConfirmPassword] = useState(false);

  const handleSubmit = async (e) => {
    e.preventDefault();
    setSubmitting(true);
    setErrors({});

    // Validation
    const newErrors = {};
    if (!inputName.trim()) {
      newErrors.name = 'Name is required';
    }
    if (!email.trim()) {
      newErrors.email = 'Email is required';
    } else if (!/\S+@\S+\.\S+/.test(email)) {
      newErrors.email = 'Please enter a valid email';
    }
    if (!phoneNumber.trim()) {
      newErrors.phoneNumber = 'Phone number is required';
    }
    if (!password) {
      newErrors.password = 'Password is required';
    } else if (password.length < 8) {
      newErrors.password = 'Password must be at least 8 characters';
    }
    if (!confirmPassword) {
      newErrors.confirmPassword = 'Please confirm your password';
    } else if (password !== confirmPassword) {
      newErrors.confirmPassword = 'Passwords do not match';
    }

    // Check terms and conditions
    const termsCheckbox = document.getElementById('signup-terms');
    if (!termsCheckbox.checked) {
      newErrors.terms = 'Please accept the terms and conditions';
    }

    if (Object.keys(newErrors).length > 0) {
      setErrors(newErrors);
      setSubmitting(false);
      return;
    }

    try {
      const response = await signup({
        name: inputName,
        email: email,
        phoneNumber: phoneNumber,
        password: password,
        password_confirmation: confirmPassword,
        _token: getCsrf()
      });

      if (response.success) {
        // Store user data and token
        localStorage.setItem('auth_token', response.body.token);
        localStorage.setItem('user_data', JSON.stringify(response.body.user));
        
        // Close signup modal
        const signupModal = document.getElementById('signupmodal');
        if (signupModal) {
          const bootstrapModal = window.bootstrap.Modal.getInstance(signupModal);
          if (bootstrapModal) {
            bootstrapModal.hide();
          }
        }

        // Always show VerifyEmailModal after signup since is_otp_verified is always 0
        console.log('🔄 Signup successful, checking OTP verification status');
        
        // Use utility function to check and open OTP verification
        const needsOTPVerification = checkAndOpenOTPVerification(response.body.user, email);
        
        if (needsOTPVerification) {
          console.log('✅ VerifyEmailModal opened successfully');
        } else {
          console.log('⚠️ VerifyEmailModal could not be opened');
        }
      } else {
        if (response.errors) {
          setErrors(response.errors);
        } else {
          setErrors({ general: response.message || 'Signup failed. Please try again.' });
        }
      }
    } catch (error) {
      console.error('Signup error:', error);
      setErrors({ general: 'Signup failed. Please try again.' });
    } finally {
      setSubmitting(false);
    }
  };

  return (
    <div
      className="modal fade"
      id="signupmodal"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabIndex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div className="modal-dialog modal-dialog-centered">
        <div className="modal-content modal-content-width">
          <div className="modal-header border-0">
            <h5 className="modal-title font-Yantramanav" id="staticBackdropLabel">
              Welcome to Portacourts
            </h5>
            <button
              type="button"
              className="btn-closed border-0 bg-transparent"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              <img
                src={`${window.location.origin}/webassets/img/cross.svg`}
                alt="close"
              />
            </button>
          </div>
          <div className="modal-body pt-0">
            <h1 className="font-oswald pb-4">Sign Up</h1>
            <form id="signupForm" onSubmit={handleSubmit}>
              <input type="hidden" name="_token" value={getCsrf()} />

              <div className="row">
                <div className="col-lg-6">
                  <div className="form-group mb-4">
                    <label className="pb-2">Name</label>
                    <input
                      type="text"
                      className="form-control common-input"
                      id="signupName"
                      placeholder="Enter Name"
                      name="name"
                      value={inputName}
                      onChange={(e) => setInputName(e.target.value)}
                    />
                    <span className="text-danger error-message" id="signup-error-name">
                      {errors.name}
                    </span>
                  </div>
                </div>

                <div className="col-lg-6">
                  <div className="form-group mb-4">
                    <label className="pb-2">Email</label>
                    <input
                      type="email"
                      className="form-control common-input"
                      id="signupEmail"
                      placeholder="Email address"
                      name="email"
                      value={email}
                      onChange={(e) => setEmail(e.target.value)}
                    />
                    <span className="text-danger error-message" id="signup-error-email">
                      {errors.email}
                    </span>
                  </div>
                </div>
              </div>

              <div className="form-group mb-4">
                <label className="pb-2">Phone Number</label>
                <input
                  type="text"
                  className="form-control common-input"
                  id="signupPhoneNumber"
                  placeholder="Enter Phone Number"
                  name="phoneNumber"
                  value={phoneNumber}
                  onChange={(e) => setPhoneNumber(e.target.value)}
                />
                <span className="text-danger error-message" id="signup-error-phone">
                  {errors.phoneNumber}
                </span>
              </div>

              <div className="form-group mb-4">
                <label className="pb-2">Password</label>
                <div className="position-relative">
                  <input
                    type={showPassword ? "text" : "password"}
                    className="form-control common-input password-field"
                    id="signupPassword"
                    placeholder="Password"
                    name="password"
                    value={password}
                    onChange={(e) => setPassword(e.target.value)}
                  />
                  <div
                    className="icon-eye"
                    onClick={() => setShowPassword(!showPassword)}
                    style={{ cursor: "pointer" }}
                  >
                    <i className="fa fa-eye toggle-password" aria-hidden="true"></i>
                  </div>
                  <span
                    className="text-danger error-message"
                    id="signup-error-password"
                  >
                    {errors.password}
                  </span>
                </div>
              </div>

              <div className="form-group mb-3">
                <label className="pb-2">Confirm Password</label>
                <div className="position-relative">
                  <input
                    type={showConfirmPassword ? "text" : "password"}
                    className="form-control common-input password-field"
                    id="signupConfirmPassword"
                    placeholder="Confirm Password"
                    name="password_confirmation"
                    value={confirmPassword}
                    onChange={(e) => setConfirmPassword(e.target.value)}
                  />
                  <div
                    className="icon-eye"
                    onClick={() => setShowConfirmPassword(!showConfirmPassword)}
                    style={{ cursor: "pointer" }}
                  >
                    <i className="fa fa-eye toggle-password" aria-hidden="true"></i>
                  </div>
                  <span
                    className="text-danger error-message"
                    id="signup-error-confirmPassword"
                  >
                    {errors.confirmPassword}
                  </span>
                </div>
              </div>

              <div className="checkbox">
                <label
                  className="checkbox-inline d-flex gap-2 align-items-center"
                  htmlFor="signup-terms"
                >
                  <input
                    name="terms"
                    id="signup-terms"
                    type="checkbox"
                    className="check_form"
                  />
                  I accept the{" "}
                  <a
                    href="https://www.portacourts.com/term-conditions"
                    className="text-decoration-underline"
                  >
                    Terms and Conditions
                  </a>
                </label>
                {errors.terms && (
                  <div className="text-danger error-message mt-1">{errors.terms}</div>
                )}
              </div>

              {errors.general && (
                <div className="text-danger text-center mb-3">{errors.general}</div>
              )}

              <div className="pt-4 pb-3">
                <button
                  type="submit"
                  className="btn green-btn w-100 box-shadow"
                  disabled={submitting}
                >
                  {submitting ? (
                    <>
                      <div className="spinner-border spinner-border-sm me-2" role="status">
                        <span className="visually-hidden">Loading...</span>
                      </div>
                      Submitting...
                    </>
                  ) : (
                    "Sign Up"
                  )}
                </button>
              </div>

              <div className="text-center">
                <p className="font-Yantramanav light-grey">
                  Already have an account?{" "}
                  <a
                    className="theme_color text-decoration-underline fw-500"
                    href="#"
                    data-bs-toggle="modal"
                    data-bs-target="#loginmodal"
                  >
                    Sign In
                  </a>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  );
};

export default SignupModal;
