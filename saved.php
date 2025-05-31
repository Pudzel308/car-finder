<?php
require 'db.php';
$cars = $pdo->query("SELECT * FROM saved_cars ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Saved Cars</title>
        <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        form.inline { display: inline; }
        button.delete {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            margin-left: 10px;
            cursor: pointer;
        }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    </head>
    <body>
        <h1>Saved Cars</h1>

        <ul>
            <?php foreach ($cars as $car): ?>
            <li>
<?= htmlspecialchars($car['make']) ?> <?= htmlspecialchars($car['model']) ?>
(<?= htmlspecialchars($car['year']) ?>) - <?= htmlspecialchars($car['class']) ?>

                <!-- Delete button -->
<form class="inline" action="delete.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this car?');">
                    <input type="hidden" name="id" value="<?= $car['id'] ?>">
                    <button type="submit" class="delete">Delete</button>
                </form>
            </li>
            <?php endforeach; ?>
        </ul>

<form action="index.html">
            <button class="btn btn-outline-success" type="submit">Back</button>
        </form>
    </body>
</html>

