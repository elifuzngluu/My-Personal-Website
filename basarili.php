<?php
session_start();

if (!isset($_SESSION['giris'])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>Giriş Başarılı</title>

    <!-- 3 saniye sonra index.php'ye gider -->
    <meta http-equiv="refresh" content="3;url=index.php">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:#0d1b2a;
            color:white;
            flex-direction:column;
        }

        .box {
            text-align:center;
            padding:40px;
            border:1px solid #42b883;
            border-radius:12px;
            background:#1a2535;
        }
    </style>
</head>

<body>

<div class="box">
    <h2>✅ Başarıyla giriş yaptınız</h2>
    <p>Sayfaya yönlendiriliyorsunuz...</p>
</div>

</body>
</html>