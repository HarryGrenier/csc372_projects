<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Coastal Concrete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/styles.css">
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
        }
    </style>
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
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item"><a class="nav-link active" href="dashboard.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<main class="container my-5 text-center">
<h2 class="text-center mb-4">Welcome, <?= htmlspecialchars($_SESSION['username']) ?>!</h2>
<p class="text-center">This is your admin dashboard.</p>

<div class="d-grid gap-2 col-6 mx-auto">
    <a href="register.php" class="btn btn-outline-primary btn-lg">Add New User</a>
    <a href="admin-gallery.php" class="btn btn-outline-primary btn-lg">Manage Gallery</a>
</div>

<?php
require 'connect.php';

$stmt = $pdo->query("SELECT id, username FROM users WHERE username != 'admin'");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle user deletion
$deleteMsg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user'])) {
    $userId = $_POST['delete_user'];

    // Double check the user isn't 'admin'
    $checkStmt = $pdo->prepare("SELECT username FROM users WHERE id = ?");
    $checkStmt->execute([$userId]);
    $user = $checkStmt->fetch();

    if ($user && $user['username'] !== 'admin') {
        $delStmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $delStmt->execute([$userId]);

        if ($delStmt->rowCount()) {
            $deleteMsg = "<div class='alert alert-success'>User deleted successfully.</div>";
        } else {
            $deleteMsg = "<div class='alert alert-warning'>No user was deleted. Try again.</div>";
        }
    } else {
        $deleteMsg = "<div class='alert alert-danger'>Cannot delete the admin user.</div>";
    }

    // Refresh user list
    $stmt = $pdo->query("SELECT id, username FROM users WHERE username != 'admin'");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<section class="container my-5">
    <h3 class="mb-3">Delete a User</h3>

    <?= $deleteMsg ?>

    <?php if (count($users) > 0): ?>
        <form method="POST" class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="delete_user" class="col-form-label">Select User:</label>
            </div>
            <div class="col-auto">
                <select name="delete_user" id="delete_user" class="form-select" required>
                    <option value="" disabled selected>-- Choose a user --</option>
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user['id'] ?>"><?= htmlspecialchars($user['username']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-danger">Delete User</button>
            </div>
        </form>
    <?php else: ?>
        <p class="text-muted">No users available for deletion.</p>
    <?php endif; ?>
</section>


</main>

<footer class="bg-dark text-white text-center py-4 mt-auto">
    <div class="container-fluid">
        <p class="mb-2">&copy; 2025 Coastal Concrete Form Co. All Rights Reserved.</p>
        <ul class="list-inline mb-0">
            <li class="list-inline-item"><a href="index.php" class="text-white text-decoration-none">Home</a></li>
            <li class="list-inline-item"><a href="gallery.php" class="text-white text-decoration-none">Gallery</a></li>
            <li class="list-inline-item"><a href="about.php" class="text-white text-decoration-none">About</a></li>
            <li class="list-inline-item"><a href="contact.php" class="text-white text-decoration-none">Contact</a></li>
        </ul>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
