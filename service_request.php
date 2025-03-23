<?php
$servername = "localhost";
$username = "root";
$password = ""; // Leave empty if no password is set
$dbname = "geral_db"; // Ensure this matches your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed: " . $conn->connect_error]));
}

// Function to sanitize input
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate required fields
    $errors = [];

    if (empty($_POST['name'])) {
        $errors[] = "Name is required.";
    } else {
        $name = clean_input($_POST['name']);
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    } else {
        $email = clean_input($_POST['email']);
    }

    if (empty($_POST['phone']) || !preg_match('/^[0-9]{10}$/', $_POST['phone'])) {
        $errors[] = "Valid 10-digit phone number is required.";
    } else {
        $phone = clean_input($_POST['phone']);
    }

    $company = isset($_POST['company']) ? clean_input($_POST['company']) : "";

    if (empty($_POST['service'])) {
        $errors[] = "Please select a service type.";
    } else {
        $service_type = implode(", ", array_map("clean_input", $_POST['service']));
    }

    if (empty($_POST['budget'])) {
        $errors[] = "Please select a budget.";
    } else {
        $budget = implode(", ", array_map("clean_input", $_POST['budget']));
    }

    if (empty($_POST['hear'])) {
        $errors[] = "Please select how you heard about us.";
    } else {
        $hear_about_us = clean_input($_POST['hear']);
    }

    // File Upload Handling
    $uploadDir = "uploads/"; // Ensure this directory exists
    $uploadedFiles = [];
    $allowedFileTypes = ['docx', 'pdf', 'jpeg', 'jpg', 'png', 'mp4', 'zip'];
    $maxFileSize = 5 * 1024 * 1024; // 5MB

    if (!empty($_FILES['reference_files']['name'][0])) {
        foreach ($_FILES['reference_files']['name'] as $key => $filename) {
            $fileExt = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $fileSize = $_FILES['reference_files']['size'][$key];

            if (!in_array($fileExt, $allowedFileTypes)) {
                $errors[] = "Invalid file type: $filename. Allowed types: docx, pdf, jpeg, jpg, png, mp4, zip.";
            } elseif ($fileSize > $maxFileSize) {
                $errors[] = "File too large: $filename. Maximum allowed size is 5MB.";
            } else {
                $targetFile = $uploadDir . uniqid() . "_" . basename($filename);
                if (move_uploaded_file($_FILES['reference_files']['tmp_name'][$key], $targetFile)) {
                    $uploadedFiles[] = $targetFile;
                } else {
                    $errors[] = "Error uploading file: $filename.";
                }
            }
        }
    }

    // If errors exist, return them as JSON
    if (!empty($errors)) {
        echo json_encode(["error" => implode(" ", $errors)]);
        exit;
    }

    $reference_files = implode(", ", $uploadedFiles); // Store file paths in DB

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO service_requests (name, email, phone, company, service_type, budget, hear_about_us, reference_files) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $name, $email, $phone, $company, $service_type, $budget, $hear_about_us, $reference_files);

    if ($stmt->execute()) {
        echo json_encode(["success" => "Your service request has been submitted successfully!"]);
    } else {
        echo json_encode(["error" => "Database error: " . $stmt->error]);
    }

    $stmt->close();
}

// Close the connection
$conn->close();
?>
