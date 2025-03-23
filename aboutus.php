<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | DE Films</title>
    <style>
        /* Serenity Theme Colors */
        :root {
            --serenity-dark-blue: #141414;
            --serenity-light-blue: #000000;
            --serenity-grey: #D5D8DC;
            --serenity-white: #F8F9F9;
            --black: #000;
        }

        /* General Styles */
        body, html {
            margin: 0;
            padding: 0;
            font-family: "Georgia", serif;
            scroll-behavior: smooth;
        }

        /* First Page: Background Image & Blur Effect */
        .first-page {
            position: relative;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            z-index: 100;
            animation: blurEffect 3s ease-in-out 2s forwards;
        }

        /* Navigation Bar */
        nav {
            position:absolute;
            top: 0;
            width: 100%;
            background-color: var(--serenity-light-blue);
            padding: 1rem 0; /* Adjusted padding for a more standard menu bar height */

            z-index: 1000;
            display: flex;
            justify-content: space-between;
            
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        /* Logo */
        .logo {
            width: 60px; /* Further reduced width for logo */
            height: auto; /* Maintain aspect ratio */
            z-index: 2000; /* Ensure logo is above other elements */
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--serenity-gold);
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 1px;
            display: flex;
            gap: 2rem;
        }

        nav a {
            text-decoration: none;
            color: var(--serenity-white);
            font-weight: bold;
            font-size: 1.2rem; /* Increased font size for better visibility in the menu bar */

            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        nav a:hover {
            background-color: var(--serenity-gold);
            color: var(--serenity-dark-blue);
        }
        
        /* Slogan Styling - Centered */
        .slogan-text {
            font-size: 3.5em;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: var(--serenity-white);
            position: absolute;
            z-index: 200;
            opacity: 0;
            animation: textFadeIn 2s ease-in-out 2s forwards;
            text-align: center;
            width: 100%;
        }

        /* Section Styling */
        .section {
            width: 100%;
            min-height: 100vh;
            text-align: center;
            padding: 80px 20px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--serenity-white);
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 1.5s ease-out, transform 1.5s ease-out;
        }

        h2 {
            font-size: 2.5em;
            color: var(--serenity-light-blue);
        }

        p {
            font-size: 1.3em;
            max-width: 800px;
            margin: 20px auto;
            line-height: 1.6;
            color: var(--serenity-grey);
        }

        /* Vision & Mission Section - Black Background */
        .vision-mission-container {
            background: var(--black);
            padding: 100px 20px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }

        /* About Founder Section */
        .founder-section {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 30px;
            padding: 100px;
            background-color: var(--serenity-dark-blue);
            color: var(--serenity-white);
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 1.5s ease-out, transform 1.5s ease-out;
        }

        .founder-image {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .founder-description {
            max-width: 500px;
        }

        .founder-description h2 {
            font-size: 2em;
            color: var(--serenity-light-blue);
        }

        .founder-description p {
            font-size: 1.2em;
            color: var(--serenity-grey);
        }

        /* Animations */
        @keyframes blurEffect {
            0% { filter: blur(0px); }
            100% { filter: blur(0px); }
        }

        @keyframes textFadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        /* Scroll Effect */
        .show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body>
    <!-- First Page with Background Video -->
    <div class="first-page">
        <video autoplay muted loop style="position: absolute; width: 100%; height: 100%; object-fit: cover; z-index: -1;">
            <source src="media/AboutusHome copy.mp4" type="video/mp4">

            Your browser does not support the video tag.
        </video>
    </div>
     <!-- Navigation Menu -->
<nav>
    <div>
        <img src="media/DE_Logo_3.jpg" alt="Company Logo" class="logo">
    </div>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="portfolio.php">Portfolio</a></li>
        <li><a href="contactus.php">Contact Us</a></li>
    </ul>
</nav>


    <!-- Vision & Mission Section -->
    <div class="vision-mission-container section">
        <h1>Our Vision</h1>
        <p>To create films that not only entertain but also spark meaningful conversations and social change.</p>
        <h1>Our Mission</h1>
        <p>We are committed to nurturing talent, embracing innovation, and producing meaningful stories that entertain, educate, and inspire.</p>
    </div>

    <!-- About the Founder Section -->
        <div class="founder-section" style="background: var(--black);">

        <img src="Media/Founder.jpg" alt="Founder Image" class="founder-image">
        <div class="founder-description">
            <h1>Meet the Founder</h1>
            <p>This is Appu Edwin Paul, the visionary behind DE Films. With a passion for storytelling and a dedication to cinematic excellence, he has transformed ideas into inspiring films that leave a lasting impact.</p>
        </div>
    </div>

    <script>
        // Scroll Effect for Sections
        document.addEventListener("scroll", function () {
            let sections = document.querySelectorAll(".section, .founder-section");
            sections.forEach(section => {
                let position = section.getBoundingClientRect().top;
                let windowHeight = window.innerHeight;
                if (position < windowHeight - 50) {
                    section.classList.add("show");
                }
            });
        });
    </script>
</body>
</html>
