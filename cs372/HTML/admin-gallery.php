<?php
session_start();
require 'connect.php';

// Restrict to logged-in users
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Handle restore if ?restore=id is passed
if (isset($_GET['restore'])) {
    $restoreId = $_GET['restore'];
    $stmt = $pdo->prepare("UPDATE gallery SET active = 1 WHERE id = ?");
    $stmt->execute([$restoreId]);
    header("Location: admin-gallery.php");
    exit;
}

// Fetch all images (active and inactive)
$stmt = $pdo->query("SELECT * FROM gallery ORDER BY id DESC");
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Gallery - Coastal Concrete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <h2 class="text-center mb-4">Gallery Management</h2>

    <div class="text-end mb-3">
        <a href="gallery.php" class="btn btn-secondary">← Back to Public Gallery</a>
    </div>

    <?php if (count($images) === 0): ?>
        <p class="text-center">No gallery items found.</p>
    <?php else: ?>
        <div class="row g-4">
            <?php foreach ($images as $img): ?>
                <div class="col-md-4">
                    <div class="card h-100 <?= $img['active'] ? '' : 'border-danger' ?>">
                        <img src="<?= htmlspecialchars($img['image_path']) ?>" class="card-img-top"
                             alt="<?= htmlspecialchars($img['caption'] ?? 'Gallery image') ?>">
                        <div class="card-body">
                            <?php if ($img['caption']): ?>
                                <p class="card-text"><?= htmlspecialchars($img['caption']) ?></p>
                            <?php endif; ?>

                            <?php if ($img['active']): ?>
                                <a href="edit-gallery-item.php?id=<?= $img['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                <a href="delete-gallery-item.php?id=<?= $img['id'] ?>" class="btn btn-sm btn-outline-danger"
                                   onclick="return confirm('Are you sure you want to delete this image?')">Delete</a>
                            <?php else: ?>
                                <span class="badge bg-danger mb-2 d-block">Inactive</span>
                                <a href="admin-gallery.php?restore=<?= $img['id'] ?>" class="btn btn-sm btn-success">Restore</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
