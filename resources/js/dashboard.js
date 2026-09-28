console.log("dashboard.js loaded");


document.addEventListener("DOMContentLoaded", () => {
    const emailField = document.getElementById("email");
    const nameField = document.getElementById("name");
    const passwordField = document.getElementById("password");
    const emailDefaultValue = emailField.value;
    const nameDefaultValue = nameField.value;

    const saveButton = document.getElementById("save-button");
    const deleteAccountButton = document.getElementById("delete-account-button");

    const checkForChanges = () => {
        if (
            emailField.value !== emailDefaultValue ||
            nameField.value !== nameDefaultValue ||
            passwordField.value !== ""
        ) {
            saveButton.disabled = false;
        } else {
            saveButton.disabled = true;
        }
    };

    emailField.addEventListener("input", checkForChanges);
    nameField.addEventListener("input", checkForChanges);
    passwordField.addEventListener("input", checkForChanges);
})
