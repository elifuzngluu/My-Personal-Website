<?php
// Çerezin ömrünü 0 yaparak, tarayıcı kapandığında silinmesini sağlarız
session_set_cookie_params(0); 

session_start(); // Oturum yönetimini başlat

$gecerli_kullanici = 'b251210379@ogr.sakarya.edu.tr';
$gecerli_sifre     = 'b251210379';

$kullanici = $_POST['kullanici'] ?? '';
$sifre     = $_POST['sifre'] ?? '';

if ($kullanici === $gecerli_kullanici && $sifre === $gecerli_sifre) {
    // Giriş başarılı: Oturum değişkenini ata
    $_SESSION['giris'] = true; 
    $_SESSION['ogrenci_no'] = $sifre;
    // Doğrudan ana sayfaya veya başarı mesajı gösteren sayfaya yönlendir
    header("Location: basarili.php"); 
    exit;
} else {
    // Giriş başarısız: Hata koduyla geri gönder
    header("Location: login.html?hata=1");
    exit;
}
?>