<?php

$servername = "bellanay.mysql.dbaas.com.br"; // Veritabanı sunucu adresi (genellikle localhost)
$username = "bellanay"; // Veritabanı kullanıcı adı
$password = "Bellanay55#"; // Veritabanı şifresi
$dbname = "bellanay"; // Kullanılacak veritabanı adı

// Veritabanı bağlantısı oluşturmak için mysqli fonksiyonunu kullanalım
try {
    // PDO nesnesini oluşturarak veritabanına bağlanalım
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Hata raporlamayı etkinleştirelim (isteğe bağlı)
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Veritabanına başarıyla bağlandı!";
} catch (PDOException $e) {
    die("Veritabanına bağlanılamadı: " . $e->getMessage());
}
?>
