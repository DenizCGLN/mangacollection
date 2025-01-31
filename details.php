<?php
require 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    die("Geçersiz istek! Manga ID'si gerekli.");
}

$stmt = $conn->prepare("SELECT * FROM mangas WHERE id = ?");
$stmt->execute([$id]);
$manga = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$manga) {
    die("Manga bulunamadı.");
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($manga['name']) ?> - Detaylar</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<div class="manga-detail-container">
    <div class="manga-detail">
        <img src="assets/images/<?= htmlspecialchars($manga['cover_image']) ?>" alt="<?= htmlspecialchars($manga['name']) ?>">
        <h2><?= htmlspecialchars($manga['name']) ?></h2>
        <p><strong>Yazar:</strong> <?= htmlspecialchars($manga['author']) ?></p>
        <p><strong>Tür:</strong> <?= htmlspecialchars($manga['genre']) ?></p>
        <p><strong>Durum:</strong> <?= htmlspecialchars($manga['status']) ?></p>
        <p><strong>Yayınlanan Ciltler:</strong> <?= htmlspecialchars($manga['published_volumes']) ?></p>
        <p><strong>Toplanan Ciltler:</strong> <?= htmlspecialchars($manga['collected_volumes']) ?></p>
        <p><strong>Okunan Ciltler:</strong> <?= htmlspecialchars($manga['read_volumes']) ?></p>
        <p><strong>Açıklama:</strong></p>
        <p><?= htmlspecialchars($manga['description']) ?></p>
        <a href="index.php">Ana Sayfaya Geri Dön</a>
    </div>
</div>
</body>
</html>
