<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Coastal Concrete</title>
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
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                <li class="nav-item"><a class="nav-link active" href="about.php">About</a></li>
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
<header class="hero2 text-white text-center d-flex align-items-center">
    <div class="hero-overlay"></div>
    <div class="container position-relative">
        <h1 class="hero-title">About Coastal Concrete</h1>
        <p class="hero-subtitle">Building Rhode Island’s Strongest Foundations for Four Generations</p>
    </div>
</header>

<!-- About Section -->
<section class="container my-5">
    <h2 class="text-center mb-4">Our Story</h2>
    <div class="row">
        <div class="col-md-6">
            <p>Coastal Concrete Form Co. is a <strong>family-owned business</strong> with over <strong>four generations</strong> of expertise in concrete foundation forming.  
            We have proudly served <strong>Rhode Island, including Block Island</strong>, delivering <strong>top-quality, durable foundations</strong> for residential and commercial projects.</p>
            <p>Our commitment to excellence and <strong>strong work ethic</strong> has earned us a reputation as one of the most reliable concrete form companies in the area.</p>
        </div>
        <div class="col-md-6">
            <img src="../Images/gallery/foundation7.webp" class="img-fluid rounded h-75" alt="Coastal Concrete Team at Work">
        </div>
    </div>
</section>

<!-- Mission Statement -->
<section class="bg-light py-5">
    <div class="container text-center">
        <h2 class="mb-4">Our Mission</h2>
        <p class="lead">"To provide high-quality, durable, and expertly crafted concrete foundations  
            that stand the test of time, ensuring safety and stability for every project we undertake."</p>
    </div>
</section>

<!-- Why Choose Us -->
<section class="container my-5">
    <h2 class="text-center mb-4">Why Choose Coastal Concrete?</h2>
    <div class="row">
        <div class="col-md-4 text-center">
            <img src="../Images/experience.png" class="img-fluid mb-3" alt="Experience Icon" width="80">
            <h4>Decades of Experience</h4>
            <p>With over four generations of expertise, we understand concrete like no one else.</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="../Images/quality.png" class="img-fluid mb-3" alt="Quality Icon" width="80">
            <h4>Unmatched Quality</h4>
            <p>We use the highest-grade materials and techniques to ensure long-lasting foundations.</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="../Images/reliability.png" class="img-fluid mb-3" alt="Reliable Icon" width="80">
            <h4>Reliable & On-Time</h4>
            <p>We take pride in finishing projects on schedule without compromising quality.</p>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4">Meet Our Team</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <h4>Brendan Spiewak</h4>
                <p>Site Manager</p>
            </div>
            <div class="col-md-4">
                <h4>Michael Spiewak</h4>
                <p>Project Manager & Schedule Manager</p>
            </div>
            <div class="col-md-4">
                <h4>Richard Spiewak</h4>
                <p>Founder & Project Estimator</p>
            </div>
        </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
