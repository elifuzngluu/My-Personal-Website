<?php
session_start();

if (!isset($_SESSION['giris'])) {
    header("Location: login.html");
    exit;
}

$ogrenci_no = $_SESSION['ogrenci_no'] ?? 'Öğrenci';
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>Giriş Başarılı</title>

    <!-- 3 saniye sonra index.php'ye gider -->
    <meta http-equiv="refresh" content="3;url=index.php">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    
</head>

<body>

<div class="box">
    <h2>✅ Başarıyla giriş yaptınız</h2>
    <p>Sayfaya yönlendiriliyorsunuz...</p>
</div>

</body>
</html>