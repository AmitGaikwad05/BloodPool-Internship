const passStatus = document.getElementById("passwordStats");

const pass = document.getElementById("password");
const passVerify = document.getElementById("passVerify");
const registerBtn = document.getElementById("registerBtn");

// Disable the button initially
registerBtn.disabled = true;

// Add event listener to the password verification input
passVerify.addEventListener('input', function () {
    // Compare the values of the password fields
    if (pass.value === passVerify.value) {
        passStatus.style.color = "green";
        passStatus.innerHTML = "Passwords match!";
        registerBtn.disabled = false; // Enable the button
    } else {
        passStatus.style.color = "red";
        passStatus.innerHTML = "Password does not match.";
        registerBtn.disabled = true; // Keep the button disabled
    }
});
