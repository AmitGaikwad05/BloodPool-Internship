
const submitBtn = document.getElementById("registerBtn");
const ageStatus = document.getElementById("ageStatus");

// --------------------- age verification -----------------------
document.getElementById("dob").addEventListener("change", function () {
    const dob = new Date(this.value);
    const today = new Date();
    let age = today.getFullYear() - dob.getFullYear();
    const monthDiff = today.getMonth() - dob.getMonth();
    const dayDiff = today.getDate() - dob.getDate();
    if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
        age--;
    } 

    if (age < 18 || age > 65) {
        ageStatus.textContent = "Sorry, you are "+ age+ " yrs old. age criteria to donate blood is between 18 to 65";
        ageStatus.style.color = "red";
submitBtn.disabled  = true;
submitBtn.innerHTML = "Sorry, cannot register";

} else {
    ageStatus.textContent = "Wow, you are " + age + " yrs old, You can donate blood.";
    ageStatus.style.color = "green";
    submitBtn.disabled  = false;
    submitBtn.innerHTML = "Register";
    
}
});

