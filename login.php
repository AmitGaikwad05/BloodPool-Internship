<?php
require("./config.php")
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BloodPool</title>
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
        <h1>Login</h1>
          <img src="./src/img/logo.png" alt="" width="60px">
                <h2 id="title">BloodPool</h2>
                <h2>Welcome Back SuperHero</h2>
        </div>
    <form action="#" method="POST">
      <div class="input-group">
        <label for="contact">Contact</label>
        <input type="text" id="contact" name="contact" placeholder="Enter your contact" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <button type="submit" class="btn">Login<button>                                            
        </form>
      </div>
    <div class="links">
      <a href="#">Forgot Password?</a>
      <a href="./signup.php">Not registered? Click to register.</a>
    </div>
    


</body>

</html>