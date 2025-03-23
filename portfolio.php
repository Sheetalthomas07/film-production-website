<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | DE Films</title>
    <style>
        body {
            margin: 0;
            font-family: "Georgia", serif;
            background-color: black;
            color: white;
            text-align: center;
            scroll-behavior: smooth;
        }
        .page {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .video-container {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }
        video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        /* Navigation Bar */
        nav {
    position:absolute;
    top: 0;
    width: 100%;
    background-color: black; /* Updated to black */
    padding: 0rem 1rem;
    z-index: 1000;
    display: flex;
    justify-content: space-between;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
}

/* Logo */
.logo {
    font-size: 1.8rem;
    font-weight: bold;
    color: var(--serenity-gold);
    text-transform: uppercase;
    letter-spacing: 2px;
}

nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: 2rem;
}

nav a {
    text-decoration: none;
    color: var(--serenity-white);
    font-weight: bold;
    font-size: 1.1rem;
    padding: 0.5rem 1rem;
    border-radius: 5px;
    transition: all 0.3s ease-in-out;
}

nav a:hover {
    background-color: var(--serenity-gold);
    color:rgb(56, 61, 145);
}

        .scroll-down {
            position: absolute;
            bottom: 20px;
            background: white;
            color: black;
            padding: 10px 20px;
            font-size: 18px;
            border: none;
            cursor: pointer;
        }
        .films-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: black;
            padding: 20px;
        }
        .buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }
        button {
            padding: 10px 20px;
            font-size: 18px;
            background-color: gray;
            border: none;
            color: white;
            cursor: pointer;
        }
        button.active {
            background-color: darkgray;
        }
        .films-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .film-card {
            width: 300px;
            border-radius: 10px;
            overflow: hidden;
            background-color: #222;
        }
        .film-card img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
        .film-card h3 {
            padding: 10px;
        }
    </style>
</head>
<script>
    fetch('header.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('header-container').innerHTML = data;
        });
</script>

<body>
    <div class="video-container page" id="videoPage">
        <video autoplay loop muted>
            <source src="media/portfoliomedia/bg-video cropped.mp4" type="video/mp4">
        </video>

    </div>
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

    
    <div class="films-section page" id="filmsPage">
        <div class="buttons">
            <button id="upcomingBtn" class="active" onclick="showFilms('upcoming')">Upcoming</button>
            <button id="releasedBtn" onclick="showFilms('released')">Released</button>
        </div>
        <div id="filmsContainer" class="films-container"></div>
    </div>
    
    <script>
        const upcomingFilms = [
            { title: "BOYS", poster: "media/Boys.jpg" },
            { title: "Luke&Mia", poster: "media/Luke&Mia.jpg" }

        ];
        const releasedFilms = [
            { title: "KIRG", poster: "media/kirgimage2.jpeg" }

        ];
        
        function showFilms(category) {
            const filmsContainer = document.getElementById("filmsContainer");
            const upcomingBtn = document.getElementById("upcomingBtn");
            const releasedBtn = document.getElementById("releasedBtn");
            
            upcomingBtn.classList.remove("active");
            releasedBtn.classList.remove("active");
            document.getElementById(category + "Btn").classList.add("active");
            
            const films = category === "upcoming" ? upcomingFilms : releasedFilms;
            
            filmsContainer.innerHTML = films.map(film => `
                <div class="film-card">
                    <img src="${film.poster}" alt="${film.title}">
                    <h3>${film.title}</h3>
                </div>
            `).join("");
        }
    </script>
</body>
</html>
