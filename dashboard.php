<?php
session_start();
include 'db_connect.php'; // Connect to database

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Fetch data from subscribers table
$subscribers_query = "SELECT * FROM subscribers";
$subscribers_result = $conn->query($subscribers_query);

// Fetch data from service_requests table
$requests_query = "SELECT * FROM service_requests";
$requests_result = $conn->query($requests_query);

// Fetch data from contact_messages table
$contacts_query = "SELECT * FROM contact_messages";
$contacts_result = $conn->query($contacts_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css?v=1.0">

</head>
<body>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
        </ul>
    </nav>
    <div class="dashboard-container">

        <h2>Admin Dashboard</h2>
    </div>
</body>

</body>
</html>




        <!-- Subscribers Table -->
        <h3>Subscribers</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Reply</th>
            </tr>
            <?php while ($row = $subscribers_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><a href="mailto:<?php echo htmlspecialchars($row['email']); ?>?subject=Regarding Your Subscription" class="reply-btn">Reply</a></td>
            </tr>
            <?php } ?>
        </table>

        <!-- Service Requests Table -->
        <h3>Service Requests</h3>
        <table>
            <tr>
                <th>Request ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Company</th>
                <th>Service Type</th>
                <th>Budget</th>
                <th>Request Date</th>
                <th>How They Heard About Us</th>
                <th>Reference Files</th>
                <th>Files</th>
                <th>Reply</th>
            </tr>
            <?php while ($row = $requests_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['request_id']); ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                <td><?php echo htmlspecialchars($row['company']); ?></td>
                <td><?php echo htmlspecialchars($row['service_type']); ?></td>
                <td><?php echo htmlspecialchars($row['budget']); ?></td>
                <td><?php echo htmlspecialchars($row['request_date']); ?></td>
                <td><?php echo htmlspecialchars($row['hear_about_us']); ?></td>
                <td><?php echo htmlspecialchars($row['reference_files']); ?></td>
                <td>
                    <?php 
                    $files = explode(',', $row['reference_files']); // Split multiple files
                    foreach ($files as $file) {
                        $file = trim($file); // Remove any extra spaces
                        if (!empty($file)) {
                            $filePath = "uploads/" . $file;
                            $fileExt = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                            
                            if (in_array($fileExt, ['jpg', 'jpeg', 'png', 'gif'])) {
                                echo "<img src='$filePath' width='150' height='150' style='border-radius:5px; margin:5px;' alt='Uploaded Image'><br>";
                            } elseif (in_array($fileExt, ['pdf'])) {
                                echo "<iframe src='$filePath' width='300' height='200'></iframe><br>";
                            } else {
                                echo "<a href='$filePath' target='_blank'>View File</a><br>";
                            }
                        }
                    }
                    ?>
                </td>
                <td><a href="mailto:<?php echo htmlspecialchars($row['email']); ?>?subject=Regarding Your Service request" class="reply-btn">Reply</a></td>
            </tr>
            <?php } ?>
        </table>

        <!-- Contact Messages Table -->
        <h3>Contact Messages</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Reply</th>
            </tr>
            <?php while ($row = $contacts_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['message']); ?></td>
                <td><a href="mailto:<?php echo htmlspecialchars($row['email']); ?>?subject=Reply to Your Inquiry" class="reply-btn">Reply</a></td>
            </tr>
            <?php } ?>
        </table>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>
