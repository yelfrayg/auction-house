console.log("dashboard.js loaded");


document.addEventListener("DOMContentLoaded", () => {
    const emailField = document.getElementById("email");
    const nameField = document.getElementById("name");
    const emailDefaultValue = emailField.value;
    const nameDefaultValue = nameField.value;

    const saveButton = document.getElementById("save-button");
    const deleteAccountButton = document.getElementById("delete-account-button");

    const checkForChanges = () => {
        if (emailField.value !== emailDefaultValue || nameField.value !== nameDefaultValue) {
            saveButton.disabled = false;
        } else {
            saveButton.disabled = true;
        }
    };

    emailField.addEventListener("input", checkForChanges);
    nameField.addEventListener("input", checkForChanges);

    deleteAccountButton.addEventListener("click", () => {
        if (confirm("Are you sure you want to delete your account? This action cannot be undone.")) {
            // TODO
            console.log("Redirecting to account deletion route...");
        }
    });
})
