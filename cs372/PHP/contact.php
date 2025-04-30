<?php
session_start();
include 'validation.php';

$form_data = ['name' => '', 'age' => '', 'service' => ''];
$errors = ['name' => '', 'age' => '', 'service' => ''];
$message = '';
$valid_services = ['Foundation', 'Commercial', 'Custom'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_data['name'] = $_POST['name'] ?? '';
    $form_data['age'] = $_POST['age'] ?? '';
    $form_data['service'] = $_POST['service'] ?? '';

    if (!is_valid_text($form_data['name'])) {
        $errors['name'] = 'Name must be between 2 and 50 characters (Not Numbers).';
    }
    if (!is_valid_number($form_data['age'])) {
        $errors['age'] = 'Please enter a valid age between 18 and 100.';
    }
    if (!is_valid_option($form_data['service'], $valid_services)) {
        $errors['service'] = 'Please select a valid service option.';
    }

    if (implode('', $errors) === '') {
        $message = 'Thank you! Your data has been submitted.';
        setcookie("visitorName", htmlspecialchars($form_data['name']), time() + 86400, "/");
        $_SESSION['selectedService'] = $form_data['service'];
    } else {
        $message = 'Please correct the errors below.';
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: contact.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - Coastal Concrete</title>
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
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link active" href="contact.php">Contact</a></li>

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

<section class="container my-5">
    <h2 class="text-center mb-4">Contact Us</h2>

    <div class="row">
        <?php
        class Contact {
            protected string $name;
            protected string $role;
            protected string $phone;
            protected string $email;

            public function __construct(string $name, string $role, string $phone, string $email) {
                $this->name = $name;
                $this->role = $role;
                $this->phone = $phone;
                $this->email = $email;
            }

            public function display(): void {
                echo "<div class='col-md-4 mb-4'>
                        <div class='border rounded p-4 shadow'>
                            <h4>{$this->name}</h4>
                            <p><strong>Role:</strong> {$this->role}</p>
                            <p><strong>Phone:</strong> <a href='tel:{$this->phone}'>{$this->phone}</a></p>
                            <p><strong>Email:</strong> <a href='mailto:{$this->email}'>{$this->email}</a></p>
                        </div>
                      </div>";
            }
        }

        $contact1 = new Contact("Brendan Spiewak", "Site Manager", "401-569-1008", "brendan@coastalconcrete.com");
        $contact2 = new Contact("Michael Spiewak", "Project Manager", "401-569-1006", "michael@coastalconcrete.com");
        $contact3 = new Contact("Richard Spiewak", "Founder & Estimator", "401-255-2133", "richard@coastalconcrete.com");

        $contact1->display();
        $contact2->display();
        $contact3->display();
        ?>
    </div>

    <div class="row mt-5">
        <div class="col-md-8 offset-md-2">
            <h3 class="mb-4">Send Us a Message</h3>

            <?php if (isset($_COOKIE['visitorName'])): ?>
                <div class="alert alert-info">Welcome back, <strong><?= htmlspecialchars($_COOKIE['visitorName']) ?></strong>!</div>
            <?php endif; ?>

            <?php if (isset($_SESSION['selectedService'])): ?>
                <div class="alert alert-secondary">
                    You previously selected: <strong><?= htmlspecialchars($_SESSION['selectedService']) ?></strong>
                    <a href="?logout=true" class="btn btn-sm btn-outline-danger ms-3">Clear Session</a>
                </div>
            <?php endif; ?>

            <?php if ($message): ?>
                <div class="alert <?= str_contains($message, 'Thank you') ? 'alert-success' : 'alert-danger' ?>">
                    <?= $message ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="contact.php" class="p-4 border rounded bg-light shadow-sm">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($form_data['name']) ?>">
                    <small class="text-danger"><?= $errors['name'] ?></small>
                </div>

                <div class="mb-3">
                    <label for="age" class="form-label">Age:</label>
                    <input type="number" name="age" id="age" class="form-control" value="<?= htmlspecialchars($form_data['age']) ?>">
                    <small class="text-danger"><?= $errors['age'] ?></small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Service Interested In:</label>
                    <?php foreach ($valid_services as $option): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="service" value="<?= $option ?>" <?= ($form_data['service'] === $option) ? 'checked' : '' ?>>
                            <label class="form-check-label"><?= $option ?></label>
                        </div>
                    <?php endforeach; ?>
                    <small class="text-danger"><?= $errors['service'] ?></small>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</section>

<section class="container my-5" id="map-container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2988.6495874167954!2d-71.57281092428057!3d41.49019598961233!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e5b877976eba9d%3A0x928d65f92e5c5aee!2sCoastal%20Concrete%20Form%20Co!5e0!3m2!1sen!2sus!4v1744300772376!5m2!1sen!2sus" width="100%" height="300" style="border:0;" allowfullscreen loading="lazy"></iframe>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Footer -->
<footer class="bg-dark text-white text-center py-4 w-100">
    <div class="container-fluid px-0">
        <p class="mb-2">&copy; 2025 Coastal Concrete Form Co. All Rights Reserved.</p>
        <ul class="list-inline mb-0">
            <li class="list-inline-item"><a href="index.php" class="text-white text-decoration-none">Home</a></li>
            <li class="list-inline-item"><a href="gallery.php" class="text-white text-decoration-none">Gallery</a></li>
            <li class="list-inline-item"><a href="about.php" class="text-white text-decoration-none">About</a></li>
            <li class="list-inline-item"><a href="contact.php" class="text-white text-decoration-none">Contact</a></li>
        </ul>
    </div>
</footer>
</body>
</html>
