<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DE Films - Services & Process</title>
    <link rel="stylesheet" href="services.css">
</head>
<body>
    <!-- First Page: Background Image -->
    <img src="media/service-bg-image.png" alt="Music Video" style="width: 100%; height: auto;">

    <!-- Navigation Menu -->
    <nav>
        <div class="logo">
            <img src="media/DE_Logo_3.jpg" alt="Logo" style="height: 50px;">
        </div>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
        </ul>
    </nav>

    <!-- Services Sections -->
    <section class="service-slide">
        <div class="service-content">
            <div class="service-text">
                <h2>Corporate & Brand Video Production</h2>
                <p>We help brands tell their stories through high-quality corporate videos...</p>
            </div>
            <img src="media/corporate-video.jpeg" alt="Corporate Video">
        </div>
    </section>
    <section class="service-slide">
            <div class="service-content">
                <div class="service-text">
                    <h2>Short Film & Feature Film Production</h2>
                    <p>From scripting to post-production, we bring cinematic visions to life. Our expertise in storytelling, direction, and cinematography ensures that every film we create leaves a lasting impression on audiences.</p>
                </div>
                <img src="media/short-film.jpeg" alt="Short Film">
            </div>
        </section>

        <section class="service-slide">
            <div class="service-content">
                <div class="service-text">
                    <h2>Music Video Production</h2>
                    <p>We craft visually stunning and <br>
                        engaging music videos that complement<br>
                         the artist's vision. From performance-based<br>
                          to narrative-driven videos, we ensure every<br>
                           frame resonates with the song’s essence.</p>
                </div>
                <img src="media/music-video.jpeg" alt="Music Video">
            </div>
        </section>

        <section class="service-slide">
            <div class="service-content">
                <div class="service-text">
                    <h2>Documentary & Interview Video Production</h2>
                    <p>We specialize in creating compelling<br>
                         documentaries and interview-based productions<br>
                          that highlight real-life stories. Our approach<br>
                           focuses on authenticity and emotional storytelling <br>
                           to connect with audiences deeply.</p>
                </div>
                <img src="media/documentary.jpg" alt="Documentary">
            </div>
        </section>

        <section class="service-slide">
            <div class="service-content">
                <div class="service-text">
                    <h2>Commercial and Advertisement Production</h2>
                    <p>We create compelling commercials<br>
                         and advertisements that captivate audiences<br>
                          and boost brand engagement. From concept to execution,<br>
                           we craft visually striking and persuasive content<br>
                            tailored to your marketing goals.</p>
                </div>
                <img src="media/commercial.jpg" alt="Commercial">
            </div>
        </section>


    <!-- Service Request Form -->
    <section class="service-slide">
        <div class="form-container">
            <h2>Request a Service</h2>
            <p>Fill out our service request form to get started with your project.</p>

            <form id="serviceRequestForm" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone No:</label>
                    <input type="text" id="phone" name="phone" required>
                </div>

                <div class="form-group">
                    <label for="company">Company Name:</label>
                    <input type="text" id="company" name="company">
                </div>

                <div class="form-group">
                    <label>Service Type:</label>
                    <select id="service" name="service[]" required>
                        <option value="" disabled selected>Choose One</option>
                        <option value="Corporate Video">Corporate Video</option>
                        <option value="Short Film">Short Film</option>
                        <option value="Music Video">Music Video</option>
                        <option value="Documentary">Documentary</option>
                        <option value="Commercial">Commercial</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="budget">Budget:</label>
                    <select id="budget" name="budget[]" required>
                        <option value="" disabled selected>Choose One</option>
                        <option value="Below 50,000">Below 50,000</option>
                        <option value="50,000 - 1 Lakh">50,000 - 1 Lakh</option>
                        <option value="More than 1 Lakh">More than 1 Lakh</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="hear">How did you hear about us?</label>
                    <select id="hear" name="hear" required>
                        <option value="" disabled selected>Choose One</option>
                        <option value="Word of mouth">Word of mouth</option>
                        <option value="Google">Google</option>
                        <option value="Social Media">Social Media</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="reference_files">Upload Reference Files:</label>
                    <input type="file" id="reference_files" name="reference_files[]" multiple accept=".docx,.pdf,.jpeg,.jpg,.png,.mp4,.zip">
                </div>

                <button type="submit">Submit Request</button>
            </form>

            <p id="responseMessage"></p>
        </div>
    </section>
    
    <script>
    document.getElementById("serviceRequestForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent form submission

        let isValid = true;
        let name = document.getElementById("name").value.trim();
        let email = document.getElementById("email").value.trim();
        let phone = document.getElementById("phone").value.trim();
        let company = document.getElementById("company").value.trim();
        let service = document.getElementById("service").value;
        let budget = document.getElementById("budget").value;
        let hear = document.getElementById("hear").value;
        let files = document.getElementById("reference_files").files;
        let errorMessage = "";

        // Name validation
        if (!/^[A-Za-z\s]{3,}$/.test(name)) {
            errorMessage += "Invalid Name: Only letters, min 3 characters.<br>";
            isValid = false;
        }

        // Email validation
        if (!/^\S+@\S+\.\S+$/.test(email)) {
            errorMessage += "Invalid Email format.<br>";
            isValid = false;
        }

        // Phone validation (Only digits, 10-15 digits allowed)
        if (!/^\d{10,15}$/.test(phone)) {
            errorMessage += "Invalid Phone: Must be 10-15 digits.<br>";
            isValid = false;
        }

        // Company Name validation (optional but at least 3 chars if filled)
        if (company !== "" && company.length < 3) {
            errorMessage += "Company Name must be at least 3 characters if provided.<br>";
            isValid = false;
        }

        // Service, Budget & Hear About Us validation
        if (service === "") {
            errorMessage += "Please select a Service Type.<br>";
            isValid = false;
        }

        if (budget === "") {
            errorMessage += "Please select a Budget option.<br>";
            isValid = false;
        }

        if (hear === "") {
            errorMessage += "Please select how you heard about us.<br>";
            isValid = false;
        }

        // File validation (if uploaded)
        if (files.length > 0) {
            const allowedExtensions = ["docx", "pdf", "jpeg", "jpg", "png", "mp4", "zip"];
            for (let i = 0; i < files.length; i++) {
                let fileExt = files[i].name.split('.').pop().toLowerCase();
                if (!allowedExtensions.includes(fileExt)) {
                    errorMessage += "Invalid file format: " + files[i].name + "<br>";
                    isValid = false;
                }
            }
        }

        // Show errors if any
        if (!isValid) {
            document.getElementById("responseMessage").innerHTML = "<span style='color: red;'>" + errorMessage + "</span>";
            return;
        }

        // Proceed with form submission if valid
        let formData = new FormData(this);
        fetch("service_request.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById("responseMessage").innerHTML = data;
            document.getElementById("serviceRequestForm").reset();
        })
        .catch(error => console.error("Error:", error));
    });
</script>
<script>
    document.getElementById("serviceRequestForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent form submission

        let isValid = true;
        let name = document.getElementById("name").value.trim();
        let email = document.getElementById("email").value.trim();
        let phone = document.getElementById("phone").value.trim();
        let company = document.getElementById("company").value.trim();
        let service = document.getElementById("service").value;
        let budget = document.getElementById("budget").value;
        let hear = document.getElementById("hear").value;
        let files = document.getElementById("reference_files").files;
        let errorMessage = "";

        // Name validation
        if (!/^[A-Za-z\s]{3,}$/.test(name)) {
            errorMessage += "Invalid Name: Only letters, min 3 characters.<br>";
            isValid = false;
        }

        // Email validation
        if (!/^\S+@\S+\.\S+$/.test(email)) {
            errorMessage += "Invalid Email format.<br>";
            isValid = false;
        }

        // Phone validation (Only digits, 10-15 digits allowed)
        if (!/^\d{10,15}$/.test(phone)) {
            errorMessage += "Invalid Phone: Must be 10-15 digits.<br>";
            isValid = false;
        }

        // Company Name validation (optional but at least 3 chars if filled)
        if (company !== "" && company.length < 3) {
            errorMessage += "Company Name must be at least 3 characters if provided.<br>";
            isValid = false;
        }

        // Service, Budget & Hear About Us validation
        if (service === "") {
            errorMessage += "Please select a Service Type.<br>";
            isValid = false;
        }

        if (budget === "") {
            errorMessage += "Please select a Budget option.<br>";
            isValid = false;
        }

        if (hear === "") {
            errorMessage += "Please select how you heard about us.<br>";
            isValid = false;
        }

        // File validation (if uploaded)
        if (files.length > 0) {
            const allowedExtensions = ["docx", "pdf", "jpeg", "jpg", "png", "mp4", "zip"];
            for (let i = 0; i < files.length; i++) {
                let fileExt = files[i].name.split('.').pop().toLowerCase();
                if (!allowedExtensions.includes(fileExt)) {
                    errorMessage += "Invalid file format: " + files[i].name + "<br>";
                    isValid = false;
                }
            }
        }

        // Show errors if any
        if (!isValid) {
            document.getElementById("responseMessage").innerHTML = "<span style='color: red;'>" + errorMessage + "</span>";
            return;
        }

        // Proceed with form submission if valid
        let formData = new FormData(this);
        fetch("service_request.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById("responseMessage").innerHTML = data;
            document.getElementById("serviceRequestForm").reset();
        })
        .catch(error => console.error("Error:", error));
    });
</script>   
</body>
</html>
