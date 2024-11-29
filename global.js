const header = document.getElementsByTagName("header")[0];
const footer = document.getElementsByTagName("footer")[0];
const sidebar = document.getElementById("sidebar");
let isSideBar = false;

window.addEventListener("load", () => {
    // ----------------- Load header -------------------
    (async function() {
      await fetch("./html/header.html")
        .then((response) => response.text())
        .then((data) => {
          header.innerHTML = data;
  
          const sidebar = document.getElementById("sidebar");
          const hMenu = document.getElementById("h_menuBtn");
     
          hMenu.addEventListener("click", () => {
              if(isSideBar){
                  sidebar.style.right = "-300px";
                  isSideBar = false;
              }  else{
                  sidebar.style.right = "0px";
                  isSideBar = true;
          }
          });
  
        })
        .catch((error) =>
          console.error("Error loading the header content: ", error)
        );
    })();
  
  
  // ----------------- Load footer -------------------
  (async function loadFooter(){
  await fetch("./html/footer.html")
      .then((response) => response.text())
      .then((data) => {
          footer.innerHTML = data;
      })
      .catch((error) =>
          console.error("Error loading the footer content: ", error)
  );
  })();       
  
      // ----------------- Load Sidebar -------------------
  
      (async function(){
          await fetch("./html/sidebar.html")
          .then((response)=>response.text())
          .then((data)=>{
          sidebar.innerHTML = data;
      
           const sCross = document.getElementById("s_crossBtn");
           sCross.addEventListener("click", () => {
                  if(isSideBar){
                      sidebar.style.right = "-300px";
                      isSideBar = false;
                  }  else{
                      sidebar.style.right = "0px";
                      isSideBar = true;
              }});
          })
      })();
  
  });


// --------------------- contact verification (length) -----------------------
const contactStats = document.getElementById("contactStats");
const contact = document.getElementById("contact");
const signupOTPbtn = document.getElementById("signupOTPbtn");

contact.addEventListener(
    "change", function (){
        const contactValue = document.getElementById("contact").value;
        console.log(contact);
        
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


  // ------------------ pass toggle --------------------
  const passwordInput = document.getElementById('password');
  const passwordInputVerify = document.getElementById('passVerify');
const togglePasswordButton1 = document.getElementsByClassName('showBtn')[0];
const togglePasswordButton2 = document.getElementsByClassName('showBtn')[1];

togglePasswordButton1.addEventListener('click', function () {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);

    // Change the button text based on the visibility
    this.textContent = type === 'password' ? 'Show Password' : 'Hide Password';
});

togglePasswordButton2.addEventListener('click', function () {
    const type = passwordInputVerify.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInputVerify.setAttribute('type', type);

    // Change the button text based on the visibility
    this.textContent = type === 'password' ? 'Show Password' : 'Hide Password';
});

