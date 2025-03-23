<?php
session_start();

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

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = isset($_POST['first_name']) ? trim($_POST['first_name']) : '';
    $last_name = isset($_POST['last_name']) ? trim($_POST['last_name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    // Server-side validation
    if (empty($first_name) || empty($last_name) || empty($email)) {
        $message = "<p style='color: red;'>Error: All fields are required.</p>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "<p style='color: red;'>Error: Invalid email format.</p>";
    } else {
        $sql = "INSERT INTO subscribers (first_name, last_name, email) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $first_name, $last_name, $email);

        if ($stmt->execute()) {
            $message = "<p style='color: green;'>Subscription successful!</p>";
        } else {
            $message = "<p style='color: red;'>Error: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DE Films - Home</title>
    <link rel="stylesheet" href="home.css">
    <script defer src="validation.js"></script> <!-- Linking validation script -->
</head>

<body>
    <div class="video-container">
        <video autoplay loop muted>
            <source src="media/HomePage-bgimg.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <nav> 
        <a href="login.php" style="position: absolute; left: 10px;">
            <img src="media/admin-icon.png" alt="Admin Login" style="width: 20px; height: 20px;">
        </a>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
        </ul>
    </nav>

    <section class="first-page"></section>

    <!-- Who We Are Section -->
    <section id="who-we-are" class="section who-we-are">
        <div class="content">
            <h1>Who We Are</h1>
            <p>We specialize in bringing ideas to life through cinematic storytelling. With a keen eye for detail and a commitment to excellence, we create films that engage and inspire. Whether it’s a commercial, documentary, or feature film, we make every frame count.</p>
        </div>
    </section>

    <!-- What We Do Section -->
    <section id="what-we-do" class="section what-we-do">
        <div class="content">
            <h1>What We Do</h1>
            <p>Our production house specializes in creating engaging and immersive video content. We work with brands, artists, and businesses to deliver compelling visual stories.</p>
        </div>
    </section>

    <!-- Our Services Section -->
    <section id="services" class="section services">
        <div class="content">
            <h1>Our Services</h1>
            <ul style="list-style-type: none; padding: 0; text-align: center; font-size: 1.5rem; font-weight: bold;">
                <li>Corporate & Brand Video Production</li>
                <li>Music Video Production</li>
                <li>Short Film & Feature Film Production</li>
                <li>Documentary & Interview Video Production</li>
                <li>Commercial & Advertisement Production</li>
            </ul>
        </div>
    </section>

    <!-- Why Us Section -->
    <section id="why-us" class="section why-us">
        <div class="content">
            <h1>Why Us</h1>
            <p>
                <b>Unique Vision</b> – We bring fresh, original storytelling to every project.<br><br>
                <b>Emotion-Driven Content</b> – We craft stories that connect with audiences on a deeper level.<br><br>
                <b>End-to-End Production</b> – From concept to final edits, we handle everything with precision and creativity.
            </p>
        </div>
    </section>

    <!-- Subscription Section -->
    <section id="subscribe" class="subscription-section">
        <h1>Subscribe to Our Newsletter</h1>
        <?php echo $message; ?>
        <form action="" method="POST" id="subscribe-form">
            <input type="text" name="first_name" id="first_name" placeholder="First Name">
            <input type="text" name="last_name" id="last_name" placeholder="Last Name">
            <input type="email" name="email" id="email" placeholder="Email">
            <button type="submit">Subscribe</button>
            <p id="error-message" style="color: red;"></p>
        </form>
    </section>
</body>
</html>
