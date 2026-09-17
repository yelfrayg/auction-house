console.log("userAuth.js loaded");
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
})
