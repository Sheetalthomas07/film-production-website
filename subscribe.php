<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geral_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = isset($_POST['first_name']) ? trim($_POST['first_name']) : '';
    $last_name = isset($_POST['last_name']) ? trim($_POST['last_name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    if (empty($first_name) || empty($last_name) || empty($email)) {
        echo "<p style='color: red;'>Error: All fields are required.</p>";
    } else {
        // Use prepared statements
        $sql = "INSERT INTO subscribers (first_name, last_name, email) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $first_name, $last_name, $email);

        if ($stmt->execute()) {
            echo "<p style='color: green;'>Subscription successful!</p>";
        } else {
            echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }
}

$conn->close();
?>
<br>
<a href="home.php">Go Back</a>
