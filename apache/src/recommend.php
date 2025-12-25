<?php
$host = "db";
$user = "restaurant_user";
$pass = "restaurant123";
$db   = "restaurant_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_GET['meal'])) {
    echo "Please enter a meal name.";
    exit;
}

$meal = $_GET['meal'];

$sql = "SELECT name, rating FROM restaurants WHERE meal LIKE ?";
$stmt = $conn->prepare($sql);
$search = "%$meal%";
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h2>{$row['name']}</h2>";
        echo "<p>Rating: {$row['rating']}</p><hr>";
    }
} else {
    echo "No restaurants found for '$meal'";
}

$conn->close();
?>
