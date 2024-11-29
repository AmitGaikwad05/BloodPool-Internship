<?php
session_abort();
session_start(); 
require("./config.php");

// Generate OTP if it's not already generated
if (!isset($_SESSION['otpGenerated'])) {
    function generateOtp() {
        return rand(100000, 999999);
    }
    $_SESSION['otpGenerated'] = generateOtp();
}

// Store OTP for display purposes (remove in production)
$otpGenerated = $_SESSION['otpGenerated'];
$contact = $_POST['contact']; 
$_SESSION['contact'] = $contact;

// echo $_SESSION['contact'];

// Initialize variables
$otpStatus = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Fetch OTP entered by the user
    $otpFromUser = $_POST['otp'] ?? null;

    if ($otpFromUser !== null) {
        if ($_SESSION['otpGenerated'] == $otpFromUser) {
            // OTP matches, clear session and store contact
            unset($_SESSION['otpGenerated']);

           
            header("Location: ./register.php");
            exit();
        } else {
            // OTP does not match
            $otpStatus = "Wrong OTP. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup OTP Verify - BloodPool</title>
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="shortcut icon" href="./src/img/logo.png" type="image/x-icon" />
</head>

<body>
    <img src="./src/img/logo.png" id="hoverLogo" alt="BloodPool Logo" width="40px">
    
    <div class="login-card">
        <div id="loginHeader">
            <img src="./src/img/logo.png" alt="BloodPool Logo" width="60px">
            <h2 id="title">BloodPool</h2>
            <h2>Enter the 6-digit OTP</h2>
        
            <p style="color: green; font-weight: bold;">OTP : <?php echo htmlspecialchars($otpGenerated); ?></p>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="input-group">
                <label for="otp">OTP</label>
                <input type="number" id="otp" name="otp" placeholder="Enter OTP" required>
            </div>
            <p id="contactStats" style="color: red;"><?php echo htmlspecialchars($otpStatus); ?></p>
            <button type="submit" class="btn">Verify</button>
        </form>
    </div>
</body>

</html>
