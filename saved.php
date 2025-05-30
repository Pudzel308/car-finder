<?php
require 'db.php';
$cars = $pdo->query("SELECT * FROM saved_cars")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Saved Cars</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    button {
      margin-top: 20px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h1>Saved Cars</h1>
  <ul>
    <?php foreach ($cars as $car): ?>
      <li><?= htmlspecialchars($car['make']) ?> <?= htmlspecialchars($car['model']) ?> (<?= $car['year'] ?>) - <?= $car['class'] ?></li>
    <?php endforeach; ?>
  </ul>

  <!-- Back to Search Button -->
  <form action="index.html" method="get">
    <button type="submit">Back to Search</button>
  </form>
</body>
</html>

