<?php
require 'db.php';
$cars = $pdo->query("SELECT * FROM saved_cars")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Saved Cars</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    </head>
    <body>
        <div class="mt-5 me-5 ms-5 p-5">
            <h1>Saved Cars</h1>
            <hr>
            <ul>
                <?php foreach ($cars as $car): ?>
                <li><?= htmlspecialchars($car['make']) ?> <?= htmlspecialchars($car['model']) ?> (<?= $car['year'] ?>) - <?= $car['class'] ?></li>
                <?php endforeach; ?>
            </ul>
            <form action="index.html" method="get">
                <button class="btn btn-outline-success" type="submit">Back</button>
            </form>
        </div>
    </body>
</html>

