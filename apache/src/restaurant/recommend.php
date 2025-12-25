<?php
$meal = strtolower($_POST['meal']);

$host = "db";
$user = "restaurant_user";
$pass = "restaurant123";
$db   = "restaurant_db";

for ($i = 0; $i < 5; $i++) {
    $conn = @new mysqli($host, $user, $pass, $db);
    if (!$conn->connect_error) {
        break;
    }
    sleep(2);
}

if ($conn->connect_error) {
    die("Database connection failed");
}




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

