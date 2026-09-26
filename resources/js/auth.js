console.log("userAuth.js loaded");
const showLoginBtn = document.getElementById("show-login");
const showRegisterBtn = document.getElementById("show-register");
const loginForm = document.getElementById("login-form");
const registerForm = document.getElementById("register-form");

showLoginBtn.addEventListener("click", event => {
    console.log("showLoginBtn clicked");
    event.preventDefault()
    loginForm.style.display = "block";
    registerForm.style.display = "none";
});

showRegisterBtn.addEventListener("click", event => {
    console.log("showRegisterBtn clicked");
    event.preventDefault()
    registerForm.style.display = "block";
    loginForm.style.display = "none";
});

document.addEventListener("DOMContentLoaded", _ => {
    const registerForm = document.getElementById("register-form");
    const registerButton = registerForm.querySelector("button[type='submit']");
    const passwordInput = registerForm.querySelector("input[name='password']");
    const passwordConfirmationInput = registerForm.querySelector("input[name='password_confirmation']");

    const validatePasswords = () => {
        if (passwordInput.value && passwordConfirmationInput.value && passwordInput.value === passwordConfirmationInput.value) {
            registerButton.disabled = false;
        } else {
            registerButton.disabled = true;
        }
    };

    passwordInput.addEventListener("input", validatePasswords);
    passwordConfirmationInput.addEventListener("input", validatePasswords);

    const loginForm = document.getElementById("login-form");
    const loginButton = loginForm.querySelector("button[type='submit']");
    const emailInput = loginForm.querySelector("input[name='email']");
    const loginPasswordInput = loginForm.querySelector("input[name='password']");

    const checkLoginForm = () => {
        loginButton.disabled = !(emailInput.value && loginPasswordInput.value);
    };

    emailInput.addEventListener("input", checkLoginForm);
    loginPasswordInput.addEventListener("input", checkLoginForm);
    checkLoginForm();
})
