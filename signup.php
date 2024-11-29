
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - BloodPool</title>
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
      <div id="loginHeader">
          <h1>Sign up</h1>
          <img src="./src/img/logo.png" alt="" width="60px">
                <h2 id="title">BloodPool</h2>
                <h2>Hey, Superhero!</h2>
        <p>Enter your contact number to send OTP for verification</p>
        </div>

    <form action="./signup_otp_verify.php" method="POST">
      <div class="input-group">
        <label for="contact">Contact</label>
        <input type="text" id="contact" name="contact" placeholder="Enter your contact" required>
      </div>
      <p id="contactStats" ></p>
      <button type="submit" id="signupOTPbtn" class="btn">Send OTP<button>                                            
        </form>   
      </div>
      <div class="links">
        <a href="./login.php">Already Registered ? Click to login</a>
      </div>

<!-- <script src="./global.js"></script> -->
<script src="./js/contact_verify.js"></script>
</body>

</html>