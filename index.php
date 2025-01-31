<?php
require 'db.php';

// Mangaları veritabanından çek
$stmt = $conn->query("SELECT * FROM mangas");
$mangas = $stmt->fetchAll(PDO::FETCH_ASSOC); // Tüm veriyi al
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manga Listesi</title>
    <link rel="stylesheet" href="assets/css/styles.css"> <!-- Tasarım dosyası -->
</head>
<body>
<header>
    <h1>Manga Takip Sistemi</h1>
</header>
<div class="container">
    <div class="manga-list">
        <?php foreach ($mangas as $manga): ?>
        <div class="manga-item">
            <img src="assets/images/<?= htmlspecialchars($manga['cover_image']) ?>" alt="<?= htmlspecialchars($manga['name']) ?>" width="200">
            <h2><?= htmlspecialchars($manga['name']) ?></h2>
            <p><strong>Yazar:</strong> <?= htmlspecialchars($manga['author']) ?></p>
            <p><strong>Tür:</strong> <?= htmlspecialchars($manga['genre']) ?></p>
            <p><strong>Durum:</strong> <?= htmlspecialchars($manga['status']) ?></p>
            <a href="details.php?id=<?= $manga['id'] ?>">Detayları Gör</a>
        </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
