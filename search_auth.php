<?php
require("./config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $b_type = $_POST['b_type'];
    $country = $_POST['country'];
  $state = $_POST['state'];
  $city = $_POST['city'];
}

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Login - BloodPool</title>
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/login.css">
    <link
      rel="shortcut icon"
      href="./src/img/logo.png"
      type="image/x-icon"
    />
</head>

<body>
    <img src="./src/img/logo.png" id="hoverLogo" alt="" width="40px">
    
    <div class="login-card">
        <h1>Let us help you</h1>
      <div id="loginHeader">    
          <img src="./src/img/logo.png" alt="" width="60px">
                <h2 id="title">BloodPool</h2>
        <p>Enter your contact number to send OTP for verification. We ask for contact details to ensure security requirements</p>
        </div>
    <form action="./search_otp_verify.php" method="POST">
      <div class="input-group">
        <label for="contact">Contact</label>
        <input type="text" id="contact" name="contact" placeholder="Enter your contact" required>
        
         <input type="hidden" name="b_type" value="<?php echo $b_type; ?>">
         <input type="hidden" name="country" value="<?php echo $country; ?>">
         <input type="hidden" name="state" value="<?php echo $state; ?>">
         <input type="hidden" name="city" value="<?php echo $city; ?>">

      </div>
      <p id="contactStats" ></p>
      <button type="submit" id="signupOTPbtn" class="btn">Send OTP<button>                                            
    </form>
  </div>

<script src="./js/contact_verify.js"></script>
</body>

</html>