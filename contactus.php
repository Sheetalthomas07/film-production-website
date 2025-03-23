<?php
// Include database connection
include 'test_db.php';

$errors = []; // Array to store validation errors
$successMessage = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Server-side validation
    if (empty($name) || strlen($name) < 3) {
        $errors[] = "Name must be at least 3 characters long.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($message) || strlen($message) < 10 || strlen($message) > 500) {
        $errors[] = "Message must be between 10 and 500 characters.";
    }

    // Proceed if no validation errors
    if (empty($errors)) {
        // Prepare SQL statement to insert data into contact_messages table
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        // Execute the statement
        if ($stmt->execute()) {
            $successMessage = "Message sent successfully!";
        } else {
            $errors[] = "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | DE Films</title>
    <link rel="stylesheet" href="contactus.css">
    <script defer src="contact-validation.js"></script>
</head>
<body>

<section class="first-page"></section>

<nav>
    <div class="logo">
        <img src="media/DE_Logo_3.jpg" alt="Company Logo" style="height: 50px;">
    </div>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="portfolio.php">Portfolio</a></li>
        <li><a href="contactus.php">Contact Us</a></li>
    </ul>
</nav>

<section class="contact-section">
    <section class="contact-info">
        <div class="contact-item">
            <h2>Email</h2>
            <p><a href="mailto:doubleentryfilms@gmail.com">doubleentryfilms@gmail.com</a></p>
        </div>
        <div class="contact-item">
            <h2>Phone</h2>
            <p>+91 75920 73630<br>+91 90379 56551</p>
        </div>
        <div class="contact-item">
            <h2>Address</h2>
            <p>B2 Mahamaya Apartment<br>
               Shankarankulangara Kanattukara<br>
               Thrissur, Kerala - 680011</p>
        </div>
    </section>

    <section class="contact-form">
        <h2>Get in Touch</h2>

        <!-- Display PHP Validation Messages -->
        <?php if (!empty($errors)): ?>
            <div style="color: red; font-weight: bold;">
                <ul>
                    <?php foreach ($errors as $error) echo "<li>$error</li>"; ?>
                </ul>
            </div>
        <?php elseif (!empty($successMessage)): ?>
            <div style="color: green; font-weight: bold;"><?php echo $successMessage; ?></div>
        <?php endif; ?>

        <form id="contactForm" action="contactus.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
                <small class="error-message"></small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <small class="error-message"></small>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" required></textarea>
                <small class="error-message"></small>
            </div>
            <button type="submit">Send Message</button>
        </form>
    </section>
</section>

</body>
</html>
