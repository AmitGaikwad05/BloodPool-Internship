<?php
session_start(); // Start the session
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

// Fetch data passed via POST (e.g., from a previous form submission)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch hidden form data or initialize variables to avoid undefined notices
    $contact = $_POST['contact'] ?? null;
    $b_type = $_POST['b_type'] ?? null;
    $country = $_POST['country'] ?? null;
    $state = $_POST['state'] ?? null;
    $city = $_POST['city'] ?? null;

    // OTP Validation
    $otpFromUser = $_POST['searchOTP'] ?? null;

    if ($otpFromUser !== null) {
        if ($_SESSION['otpGenerated'] == $otpFromUser) {
            // OTP matches, store data in session
            unset($_SESSION['otpGenerated']); // Clear OTP after successful validation
            $_SESSION['contact'] = $contact;
            $_SESSION['b_type'] = $b_type;
            $_SESSION['country'] = $country;
            $_SESSION['state'] = $state;
            $_SESSION['city'] = $city;

            // Redirect to the result page
            header("Location: ./result.php");
            exit();
        } else {
            // Incorrect OTP
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
    <title>Search OTP Verify - BloodPool</title>
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="shortcut icon" href="./src/img/logo.png" type="image/x-icon" />
</head>
<body>
    <img src="./src/img/logo.png" id="hoverLogo" alt="" width="40px">
    
    <div class="login-card">
        <h2>Enter the OTP</h2>
        <div id="loginHeader">
            <img src="./src/img/logo.png" alt="" width="60px">
            <h2 id="title">BloodPool</h2>
            <p>Enter the OTP sent to your mobile</p>
            <!-- Remove this in production -->
            <p style="color: green; font-weight: bold;">Generated OTP (for testing): <?php echo htmlspecialchars($otpGenerated); ?></p>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="input-group">
                <label for="searchOTP">OTP</label>
                <input type="text" id="searchOTP" name="searchOTP" placeholder="Enter your OTP" required>

                <!-- Pass hidden data -->
                <input type="hidden" name="b_type" value="<?php echo htmlspecialchars($b_type); ?>">
                <input type="hidden" name="country" value="<?php echo htmlspecialchars($country); ?>">
                <input type="hidden" name="state" value="<?php echo htmlspecialchars($state); ?>">
                <input type="hidden" name="city" value="<?php echo htmlspecialchars($city); ?>">
                <input type="hidden" name="contact" value="<?php echo htmlspecialchars($contact); ?>">
            </div>
            <p id="contactStats" style="color: red;"><?php echo isset($otpStatus) ? htmlspecialchars($otpStatus) : ""; ?></p>
            <button type="submit" id="signupOTPbtn" class="btn">Verify OTP</button>
        </form>
    </div>

    <script src="./js/contact_verify.js"></script>
</body>
</html>
