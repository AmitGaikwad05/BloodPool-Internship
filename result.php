<?php
require("./config.php");
session_start();

$contact = $_SESSION['contact'] ?? null;
$b_type = $_SESSION['b_type'] ?? null;
$country = $_SESSION['country'] ?? null;
$state = $_SESSION['state'] ?? null;
$city = $_SESSION['city'] ?? null;


// ------- inserting data in the searcher table of DB -----
$stmt = $conn->prepare("INSERT INTO search_user (contact, b_type, country, state, city) VALUES (?, ?, ?, ?, ?)");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("issss", $contact, $b_type, $country, $state, $city);
$stmt->execute();
$stmt->close();


// ------------------ search user query ---------------

$sql = "SELECT column1, column2, column3, column4, column5 FROM donor"; 
$result = $conn->query($sql);


session_abort();
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
    <link rel="stylesheet" href="./css/result.css">

    <title>Result - BloodPool </title>
</head>
<body>
<!-- ================== HEADER ================== -->
<header>
</header>
    
    <!-- ------------------ Sidebar -------------------- -->
    <div id="sidebar"></div>  
    
<main>

<div class="resultHeader">

</div>

<div class="table-container">
    <?php


if ($result->num_rows > 0) {
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Column 1</th>';
    echo '<th>Column 2</th>';
    echo '<th>Column 3</th>';
    echo '<th>Column 4</th>';
    echo '<th>Column 5</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row["column1"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["column2"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["column3"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["column4"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["column5"]) . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo "No data found.";
}

$conn->close();
?>
    </div>

</main>
    <!-- ================== FOOTER ================== -->
<footer>
</footer>
<script src="./global.js"></script>
</body>
</html>