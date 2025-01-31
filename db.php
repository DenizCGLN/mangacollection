<?php
// Veritabanı bilgileri
$host = '217.195.197.248'; // Veritabanı sunucusu
$dbname = 'alimelwa_manga'; // Veritabanı adı
$username = 'alimelwa_manga'; // Kullanıcı adı (varsayılan olarak 'root')
$password = 'Denizcgln3aa'; // Şifre (varsayılan olarak boş)

// PDO ile bağlantı oluştur
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // PDO hata ayıklama modunu aktif et
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}
?>
