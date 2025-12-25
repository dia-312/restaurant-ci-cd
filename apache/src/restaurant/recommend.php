<?php
$meal = strtolower($_POST['meal']);

$conn = new mysqli("db", "restaurant_user", "restaurant123", "restaurant_db");



if ($conn->connect_error) {
    die("DB Connection Failed");
}

$sql = "SELECT name, rating FROM restaurants
        WHERE meal='$meal'
        ORDER BY rating DESC LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h3>Recommended Restaurant</h3>";
    echo "Name: " . $row['name'] . "<br>";
    echo "Rating: " . $row['rating'];
} else {
    echo "No restaurant found.";
}

$conn->close();
?>

