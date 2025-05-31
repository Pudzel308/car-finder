<?php
require 'db.php';

$id = $_POST['id'] ?? null;

if ($id && is_numeric($id)) {
    try {
        $stmt = $pdo->prepare("DELETE FROM saved_cars WHERE id = ?");
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        die("Deletion failed: " . $e->getMessage());
    }
}

header("Location: saved.php");
exit;

