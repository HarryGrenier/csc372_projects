<?php
session_start();
require 'connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $pdo->prepare("UPDATE gallery SET active = 0 WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: gallery.php");
exit;
