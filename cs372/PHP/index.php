<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coastal Concrete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="../Images/Logo2.png" alt="Coastal Concrete Logo" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<header class="hero1 text-white text-center d-flex align-items-center">
    <div class="hero-overlay"></div>
    <div class="container position-relative">
        <h1 class="hero-title">Building Strong Concrete Foundations for Generations</h1>
        <p class="hero-subtitle">Reliable Concrete Services Across Rhode Island including Block Island</p>
    </div>
</header>

<!-- Services Section -->
<section class="container text-center my-5">
    <h2 class="mb-4">Our Services</h2>
    <div class="row">
        <div class="col-md-4">
            <img src="../Images/gallery/foundation4.webp" class="img-fluid rounded mb-3" alt="Foundation Work">
            <h4>Foundation Forming</h4>
            <p>Providing high-quality concrete foundation services for residential and commercial projects.</p>
        </div>
        <div class="col-md-4">
            <img src="../Images/gallery/foundation5.webp" class="img-fluid rounded mb-3" alt="Commercial Concrete">
            <h4>Commercial Concrete</h4>
            <p>Specialized concrete solutions for large-scale construction projects.</p>
        </div>
        <div class="col-md-4">
            <img src="../Images/gallery/foundation6.webp" class="img-fluid rounded mb-3" alt="Custom Concrete Work">
            <h4>Custom Concrete Work</h4>
            <p>Customizable concrete solutions for unique construction needs.</p>
        </div>
    </div>
</section>

<!-- AJAX Section -->
<section class="container text-center my-5">
    <div id="ajax-section" class="mt-4"></div>
</section>

<!-- Quick Contact Section -->
<section class="container text-center my-5">
    <h2>Contact Us</h2>
    <p>📞 <a href="tel:401-255-2133">401-255-2133</a> | 📧 <a href="mailto:coastalform2@gmail.com">coastalform2@gmail.com</a></p>
    <a href="contact.php" class="btn btn-primary">Get in Touch</a>
</section>

<!-- Testimonials Section -->
<section class="container text-center my-5">
    <div id="content-container"></div>
    <button id="load-content-btn" class="btn btn-primary mt-3">Show Customer Testimonials</button>
</section>

<!-- Weather Section -->
<section class="container text-center my-5">
    <h2>Current Weather in Rhode Island</h2>
    <div id="weather-container" class="mt-3">
        <p>Loading weather...</p>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-4">
    <div class="container">
        <p>&copy; 2025 Coastal Concrete Form Co. All Rights Reserved.</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="index.php" class="text-white">Home</a></li>
            <li class="list-inline-item"><a href="gallery.php" class="text-white">Gallery</a></li>
            <li class="list-inline-item"><a href="about.php" class="text-white">About</a></li>
            <li class="list-inline-item"><a href="contact.php" class="text-white">Contact</a></li>
        </ul>
    </div>
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../JavaScript/jquery-3.7.1.js"><\/script>');</script>

<script src="../JavaScript/headerfade.js"></script>
<script src="../JavaScript/html-loader.js"></script>
<script src="../JavaScript/load-new-section.js"></script>
<script src="../JavaScript/weather-loader.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
