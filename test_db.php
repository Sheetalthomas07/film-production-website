<?php
$servername = "localhost";
$username = "root";
$password = ""; // Leave empty if no password is set
$dbname = "geral_db"; // Make sure this matches the database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$conn->query("CREATE TABLE IF NOT EXISTS service_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    company VARCHAR(255),
    service_type VARCHAR(255) NOT NULL,
    budget VARCHAR(50) NOT NULL,
    hear_about_us VARCHAR(255) NOT NULL,
    reference_files TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Database connected successfully!";
?>
