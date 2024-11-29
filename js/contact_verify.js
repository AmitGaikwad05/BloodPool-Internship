// --------------------- contact verification (length) -----------------------
const contactStats = document.getElementById("contactStats");
const contact = document.getElementById("contact");
const signupOTPbtn = document.getElementById("signupOTPbtn");

contact.addEventListener(
    "change", function (){
        const contactValue = document.getElementById("contact").value;

        if(contactValue.length>10 || contactValue.length < 10){
            contactStats.innerHTML = "invalid contact. Enter a 10 digit contact number";
            contactStats.style.color = "red";
            signupOTPbtn.disabled  = true;
            signupOTPbtn.innerHTML = "Sorry, cannot register";
        }
        else{
            contactStats.innerHTML = "";
            signupOTPbtn.disabled  = false;
            signupOTPbtn.innerHTML = "Register";
                    
        }
    
    }

);

