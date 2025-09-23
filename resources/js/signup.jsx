import React, { useState, useEffect } from "react";
import { createRoot } from "react-dom/client";
import "./bootstrap";

const Signup = () => {
  const [inputName, setInputName] = useState("");
  const [email, setEmail] = useState("");
  const [phoneNumber, setPhoneNumber] = useState("");
  const [password, setPassword] = useState("");
  const [confirmPassword, setConfirmPassword] = useState("");
  const [submitting, setSubmitting] = useState(false);
  const [errors, setErrors] = useState({});
  const [showPassword, setShowPassword] = useState(false);
  const [showConfirmPassword, setShowConfirmPassword] = useState(false);

  // Clear form data when modal is shown
  useEffect(() => {
    const modal = document.getElementById('signupmodal');
    if (modal) {
      const handleShow = () => {
        // Clear all form data
        setInputName("");
        setEmail("");
        setPhoneNumber("");
        setPassword("");
        setConfirmPassword("");
        setSubmitting(false);
        setErrors({});
        setShowPassword(false);
        setShowConfirmPassword(false);
        
        // Clear form inputs in DOM
        const form = document.getElementById('signupForm');
        if (form) {
          form.reset();
        }
      };

      modal.addEventListener('shown.bs.modal', handleShow);
      
      return () => {
        modal.removeEventListener('shown.bs.modal', handleShow);
      };
    }
  }, []);

  const handleSubmit = (e) => {
    e.preventDefault();
    setSubmitting(true);
    setErrors({});
  };

  return (
    <div className="modal-dialog modal-dialog-centered">
      <div className="modal-content modal-content-width">
        <div className="modal-header border-0">
          <h5 className="modal-title" id="staticBackdropLabel">
            Welcome to Portacourts
          </h5>
          <button
            type="button"
            className="btn-closed border-0 bg-transparent"
            data-bs-dismiss="modal"
            aria-label="Close"
          >
            <img
              src="https://www.portacourts.com/webassets/img/cross.svg"
              alt="close"
            />
          </button>
        </div>
        <div className="modal-body pt-0">
          <h1 className="font-oswald pb-4">Sign Up</h1>
          <form id="signupForm" onSubmit={handleSubmit}>
            <input
              type="hidden"
              name="_token"
              value="YCxWyrybQHEzoOxYaTapqp2Nov586Zh2sSOwmAhE"
              autoComplete="off"
            />

            <div className="row">
              <div className="col-lg-6">
                <div className="form-group mb-4">
                  <label className="pb-2">Name</label>
                  <input
                    type="text"
                    className="form-control common-input"
                    name="name"
                    value={inputName}
                    onChange={(e) => setInputName(e.target.value)}
                    placeholder="Enter Name"
                  />
                  <span className="text-danger error-message">
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
                    name="email"
                    value={email}
                    onChange={(e) => setEmail(e.target.value)}
                    placeholder="Email address"
                  />
                  <span className="text-danger error-message">
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
                name="phoneNumber"
                value={phoneNumber}
                onChange={(e) => setPhoneNumber(e.target.value)}
                placeholder="Enter Phone Number"
              />
              <span className="text-danger error-message">
                {errors.phoneNumber}
              </span>
            </div>

            <div className="form-group mb-4">
              <label className="pb-2">Password</label>
              <div className="position-relative">
                <input
                  type={showPassword ? "text" : "password"}
                  className="form-control common-input password-field"
                  name="password"
                  value={password}
                  onChange={(e) => setPassword(e.target.value)}
                  placeholder="Password"
                />
                <span className="text-danger error-message">
                  {errors.password}
                </span>
                <div className="icon-eye"
                onClick={() => setShowPassword(!showPassword)}
                style={{ cursor: "pointer" }}
                >
                  <i
                    className="fa fa-eye toggle-password"
                    aria-hidden="true"
                    toggle="#password-field"
                  ></i>
                </div>
              </div>
            </div>

            <div className="form-group mb-3">
              <label className="pb-2">Confirm Password</label>
              <div className="position-relative">
                <input
                  type={showConfirmPassword ? "text" : "password"}
                  className="form-control common-input password-field"
                  name="password_confirmation"
                  value={confirmPassword}
                  onChange={(e) => setConfirmPassword(e.target.value)}
                  placeholder="Confirm Password"
                />
                <span className="text-danger error-message">
                  {errors.confirmPassword}
                </span>
                <div className="icon-eye"
                onClick={() =>
                    setShowConfirmPassword(!showConfirmPassword)
                  }
                style={{ cursor: "pointer" }}
                >
                  <i
                    className="fa fa-eye toggle-password"
                    aria-hidden="true"
                    toggle="#password-field"
                  ></i>
                </div>
              </div>
            </div>

            <div className="checkbox">
              <label
                className="checkbox-inline d-flex gap-2 align-items-center"
                htmlFor="remember"
              >
                <input
                  name="remember"
                  id="remember"
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
            </div>

            <div className="pt-4 pb-3">
              <button
                type="submit"
                className="btn green-btn w-100 box-shadow"
                disabled={submitting}
              >
                {submitting ? "Submitting..." : "Sign Up"}
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
                  onClick={() => {
                    // Ensure page is active when switching to login modal
                    window.focus();
                    document.body.focus();
                  }}
                >
                  Sign In
                </a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  );
};

export default Signup;




const mountEl = document.getElementById('react-signup-root');
if (mountEl) {
    const props = {
        action: mountEl.dataset.action,
        passwordResetUrl: mountEl.dataset.passwordResetUrl || ''
    };
    const root = createRoot(mountEl);
    root.render(<Signup {...props} />);
}