<?php
session_start();
require 'connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'] ?? null;
$message = '';

if (!$id) {
    header("Location: gallery.php");
    exit;
}

// Fetch the image by ID
$stmt = $pdo->prepare("SELECT * FROM gallery WHERE id = ?");
$stmt->execute([$id]);
$image = $stmt->fetch();

if (!$image) {
    $message = "Image not found.";
}

// Handle caption update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $caption = $_POST['caption'] ?? '';
    $userId = $_SESSION['user_id'];

    $stmt = $pdo->prepare("UPDATE gallery SET caption = ?, modified_by = ? WHERE id = ?");
    $stmt->execute([$caption, $userId, $id]);

    $message = "Caption updated!";
    $image['caption'] = $caption;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Caption - Coastal Concrete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5" style="max-width: 600px;">
    <h2 class="text-center mb-4">Edit Caption</h2>

    <?php if ($message): ?>
        <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <?php if ($image): ?>
        <form method="POST" class="border rounded bg-white p-4 shadow-sm">
            <div class="mb-3 text-center">
                <img src="<?= htmlspecialchars($image['image_path']) ?>" class="img-fluid rounded" alt="Gallery Image">
            </div>

            <div class="mb-3">
                <label for="caption" class="form-label">New Caption</label>
                <input type="text" name="caption" id="caption" class="form-control"
                       value="<?= htmlspecialchars($image['caption']) ?>">
            </div>

            <button type="submit" class="btn btn-primary w-100">Update Caption</button>
        </form>

        <div class="text-center mt-3">
            <a href="admin-gallery.php" class="btn btn-outline-secondary">← Back to Admin Gallery</a>
        </div>
    <?php else: ?>
        <div class="alert alert-danger text-center">Image not found or invalid ID.</div>
    <?php endif; ?>
</div>
</body>
</html>
