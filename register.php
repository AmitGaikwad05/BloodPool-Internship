<?php
session_start();
require("./config.php");

// Check if the contact session variable is set
if (!isset($_SESSION['contact'])) {
    die("Contact information is missing from the session.");
}

$contact = $_SESSION['contact'];

// Sanitize and collect form input
$name = htmlspecialchars($_POST['f_name']) . " " . htmlspecialchars($_POST['m_name']) . " " . htmlspecialchars($_POST['l_name']);
$b_type = htmlspecialchars($_POST['b_type']);
$weight = (int) htmlspecialchars($_POST['weight']);
$gender = htmlspecialchars($_POST['gender']);
$email = htmlspecialchars($_POST['email']);
$dob = htmlspecialchars($_POST['dob']);
$country = htmlspecialchars($_POST['country']);
$state = htmlspecialchars($_POST['state']);
$city = htmlspecialchars($_POST['city']);
$locality = htmlspecialchars($_POST['locality']);
$pincode = (int) htmlspecialchars($_POST['pincode']);
$b_name = htmlspecialchars($_POST['b_name']);
$password = htmlspecialchars($_POST['pass']);

// Function to calculate age from date of birth
function calculateAge($dateOfBirth) {
    $dob = new DateTime($dateOfBirth);
    $today = new DateTime(); // Current date
    $age = $today->diff($dob);
    return $age->y;
}

$age = calculateAge($dob);

// Hash the password
$hash_pass = password_hash($password, PASSWORD_BCRYPT);

// Use a prepared statement to prevent SQL injection
$sql = "INSERT INTO donor (name, b_type, weight, gender, dob, age, email, country, state, city, landmark, pincode, building_name, password, contact)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters to the statement
$stmt->bind_param(
    "ssisissssssisss",
    $name, $b_type, $weight, $gender, $dob, $age, $email, $country, $state, $city, $locality, $pincode, $b_name, $hash_pass, $contact
);

// Execute the statement
if ($stmt->execute()) {
    echo "Registration successful!";
    header("Location: ./profile.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
    header("Location: ./error.php");
    exit();
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="shortcut icon"
      href="./src/img/logo.png"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/register.css">
    <title>Register - BloodPool</title>
</head>
<body>
<!-- ================== HEADER ================== -->
<header>
</header>
    
    <!-- ------------------ Sidebar -------------------- -->
    <div id="sidebar"></div>  
    
<main>
<h2>Enter the details</h2>
<h3><?php echo $contact ?></h3>
<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" >
    <!------------------ personal detail ------------------->
    
    <div id="reg_name" class="reg_section">
  <label for="f_name">Name </label>
      <div>
     <input type="text" id="f_name" name="f_name" placeholder="First name" required>

     <input type="text" name="m_name" placeholder="Middle name">

      <input type="text" name="l_name" placeholder="Last name" required>
    </div>
    </div>
<br>

    <!-- -------------------- Blood detail ----------------------- -->
    <label for="b_type" class="reg_section">Select Blood type
      <select name="b_type" id="b_type">
        <option value="O+">O+</option>
        <option value="O-" selected>O-</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
      </select>
    </label>
<br>

<div id="reg_general" class="reg_section">
<label for="weight">General</label>

<div>
  <div>
      <label for="weight">Weight(kg)</label>
      <input type="tel"  id="weight" name="weight" min="40"  required>
    </div>
      <!-- gender -->
      <div>
      <label for="gender">Gender: </label>
       <label for="male">Male</label>
       <input type="radio" name="gender" id="male"  value="male">
       <label for="female">Female</label>
       <input type="radio"name="gender" id="female" value="female">
       <label for="others">Others</label>
      <input type="radio"name="gender" id="others" value="others">
    </div>
      <br>
<div>
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email">
    </div>   
      <div>
      <label for="dob">Date of Birth</label>
      <input type="date" name="dob" id="dob">
    </div>
    <p id="ageStatus"></p>
  </div>
</div>
      <br>

      <!-- --------- Gegraphic details ---------- -->
       
      <div id="reg_location" class="reg_section">
      <label for="">Location</label>
      <div>
<input type="text" placeholder="country" name="country">
<input type="text" placeholder="state" name="state">
<input type="text" placeholder="city" name="city">
<input type="text" placeholder="Locality/area" name="locality">
<input type="tel" placeholder="pincode" name="pincode">
<input type="text" placeholder="building or house name" name="b_name">
</div>
</div>
<br>
<!-- --------- Password ---------- -->
 <div id="reg_pass" class="reg_section">
 <label for="password">Password</label>
 <div>
  <div>
<label for="password">Create a password</label>
<input type="password" name="pass" id="password" required>
<img src="./src/img/show.png" alt="" width="20px" class="showBtn">
</div>
<div>
  <label for="passVerify">Re-enter the password</label>
  <input type="password" name="var_pass" id="passVerify" required>
  <img src="./src/img/show.png" alt="" width="20px"  class="showBtn">
</div>
</div>
<p id="passwordStats" ></p>
</div>
</div>
</div>
<button type="submit" disabled id="registerBtn">Register</button>
</form>


</main>
<img src="./src/img/registerPeople.png" alt="" id="registerPeople" >
    <!-- ================== FOOTER ================== -->
<footer>
</footer>
<script src="./global.js"></script>
<script src="./js/register.js"></script>
</body>
</html>
