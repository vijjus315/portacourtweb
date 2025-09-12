import React, { useState } from "react";

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

  const handleSubmit = (e) => {
    e.preventDefault();
    setSubmitting(true);
    setErrors({});
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
              <input type="hidden" name="_token" value="dummyCsrfToken" />

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
