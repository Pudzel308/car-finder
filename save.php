<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'db.php';

if (isset($_POST['make'], $_POST['model'], $_POST['year'], $_POST['class'])) {
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $class = $_POST['class'];

    try {
        $stmt = $pdo->prepare("INSERT INTO saved_cars (make, model, year, class) VALUES (?, ?, ?, ?)");
        $stmt->execute([$make, $model, $year, $class]);

        header("Location: saved.php");
        exit;
    } catch (PDOException $e) {
        echo "<h3>Database Error:</h3><pre>" . $e->getMessage() . "</pre>";
    }
} else {
    echo "<h3>Error:</h3><p>Missing POST data.</p>";
}
?>

