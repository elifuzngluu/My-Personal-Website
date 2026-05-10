<?php
// Doğrudan URL'den erişimi engelle (form'dan gelmiyorsa geri yönlendir)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: iletisim.html');
    exit;
}

// POST verilerini güvenli şekilde al
$ad_soyad          = htmlspecialchars(trim($_POST['ad_soyad']   ?? ''));
$email             = htmlspecialchars(trim($_POST['email']       ?? ''));
$telefon           = htmlspecialchars(trim($_POST['telefon']     ?? ''));
$konu              = htmlspecialchars(trim($_POST['konu']        ?? ''));
$mesaj             = htmlspecialchars(trim($_POST['mesaj']       ?? ''));
$cinsiyet          = htmlspecialchars(trim($_POST['cinsiyet']    ?? 'Belirtilmedi'));
$ilgi_alanlari     = $_POST['ilgi']                              ?? [];
$kvkk              = isset($_POST['kvkk']) ? 'Onaylandı'        : 'Onaylanmadı';
$validation_method = htmlspecialchars(trim($_POST['validation_method'] ?? 'Bilinmiyor'));

// İlgi alanlarını güvenli hale getir
$ilgi_temiz = array_map('htmlspecialchars', $ilgi_alanlari);
$ilgi_str   = !empty($ilgi_temiz) ? implode(', ', $ilgi_temiz) : 'Seçilmedi';

// Konu değerini okunabilir yap
$konu_map = [
    'is_birligi' => 'İş Birliği',
    'proje'      => 'Proje Teklifi',
    'staj'       => 'Staj Fırsatı',
    'diger'      => 'Diğer',
];
$konu_label = $konu_map[$konu] ?? $konu;
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sonucu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .result-wrapper {
            max-width: 680px;
            margin: 60px auto;
            padding: 0 20px;
        }
        .result-box {
            background: #1a2535;
            border: 1px solid #2d3f55;
            border-radius: 16px;
            padding: 36px;
        }
        .result-box h2 {
            color: #42b883;
            margin-bottom: 6px;
        }
        .result-box .subtitle {
            color: #8a9bb0;
            margin-bottom: 28px;
            font-size: 0.9rem;
        }
        .data-row {
            display: flex;
            border-bottom: 1px solid #2d3f55;
            padding: 12px 0;
            gap: 16px;
        }
        .data-row:last-of-type { border-bottom: none; }
        .data-label {
            color: #7eb8d4;
            font-weight: 600;
            min-width: 160px;
            font-size: 0.88rem;
        }
        .data-value {
            color: #e0eaf5;
            font-size: 0.95rem;
            word-break: break-word;
        }
        .badge-method {
            display: inline-block;
            padding: 3px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .badge-native { background: #f0db4f; color: #222; }
        .badge-vue    { background: #42b883; color: #fff; }
        .btn-back {
            margin-top: 24px;
            background: #7eb8d4;
            color: #0d1b2a;
            font-weight: 700;
            border: none;
            border-radius: 8px;
            padding: 10px 28px;
            text-decoration: none;
            display: inline-block;
            transition: background 0.2s;
        }
        .btn-back:hover { background: #5aa0c0; color: #fff; }
    </style>
</head>
<body>
    <nav>
        <a href="index.php">Hakkımda</a>
        <a href="ozgecmis.html">Özgeçmiş</a>
        <a href="sehrim.html">Şehrim</a>
        <a href="mirasimiz.html">Mirasımız</a>
        <a href="ilgiAlanlarim.html">İlgi Alanlarım</a>
        <a href="iletisim.html" class="active">İletişim</a>
    </nav>

    <div class="result-wrapper">
        <div class="result-box">
            <h2>✅ Form Başarıyla Alındı!</h2>
            <p class="subtitle">Aşağıda gönderilen veriler sunucu tarafında (PHP) yazdırılmaktadır.</p>

            <?php
            $badge_class = ($validation_method === 'Vue.js') ? 'badge-vue' : 'badge-native';
            echo "<span class=\"badge-method $badge_class\">Doğrulama yöntemi: $validation_method</span>";
            ?>

            <div class="data-row">
                <span class="data-label">Ad Soyad</span>
                <span class="data-value"><?= $ad_soyad ?: '<em style="color:#556a80;">Girilmedi</em>' ?></span>
            </div>
            <div class="data-row">
                <span class="data-label">E-posta</span>
                <span class="data-value"><?= $email ?: '<em style="color:#556a80;">Girilmedi</em>' ?></span>
            </div>
            <div class="data-row">
                <span class="data-label">Telefon</span>
                <span class="data-value"><?= $telefon ?: '<em style="color:#556a80;">Girilmedi</em>' ?></span>
            </div>
            <div class="data-row">
                <span class="data-label">Konu</span>
                <span class="data-value"><?= $konu_label ?: '<em style="color:#556a80;">Seçilmedi</em>' ?></span>
            </div>
            <div class="data-row">
                <span class="data-label">Mesaj</span>
                <span class="data-value"><?= $mesaj ?: '<em style="color:#556a80;">Girilmedi</em>' ?></span>
            </div>
            <div class="data-row">
                <span class="data-label">Cinsiyet</span>
                <span class="data-value"><?= $cinsiyet ?></span>
            </div>
            <div class="data-row">
                <span class="data-label">İlgi Alanları</span>
                <span class="data-value"><?= $ilgi_str ?></span>
            </div>
            <div class="data-row">
                <span class="data-label">KVKK Onayı</span>
                <span class="data-value"><?= $kvkk ?></span>
            </div>

            <a href="iletisim.html" class="btn-back">← Forma Geri Dön</a>
        </div>
    </div>

    <footer class="text-center py-4 text-white" style="background-color: #0d1b2a;">
        @provided by Elif Uzunoğlu
    </footer>
</body>
</html>