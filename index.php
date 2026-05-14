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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Kişisel Websitem</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <nav>
            <a href="index.php" class="active">Hakkımda</a>
            <a href="ozgecmis.html">Özgeçmiş</a>
            <a href="sehrim.html">Şehrim</a>
            <a href="mirasimiz.html">Mirasımız</a>
            <a href="ilgiAlanlarim.html">İlgi alanlarım</a>
            <a href="iletisim.html">İletişim</a>
        </nav>
    
    <div class="content-wrapper">
        <div class="container">
            <main>
                <div class="photo">
                    <img src="img/profil.jpg" alt="Profil Fotoğrafı">
                </div>
                <h2> Beni Tanıyın! </h2>
                <p> Öncelikle merhaba , ben Elif. <br>
                    20 yaşındayım.  Bilgisayar Mühendisliği 2.sınıf öğrencisiyim. <br>
                    Bu çok yönlü olan bölümde kendime en uygun alanı bulma arayışındayım. <br>
                    Şimdiye kadar web tarafında html,css ve javascript ile ilgilendim. <br>
                    Hatta ufak çaplı yayınladığım bir websitem bile var! <br>İlgini çektiyse <a href="https://kalitekapi.com.tr" target="_blank">buradan</a> ulaşabilirsin.
                </p>
            </main>
        </div>
    </div>
    
        <footer>
            <p>@provided by Elif Uzunoğlu</p>
        </footer>
    </body>
</html>