<?php
include 'koneksi.php';
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) die("ID tidak valid.");

$id_pendaftaran = intval($_GET['id']);
$stmt = $koneksi->prepare("SELECT p.nama_lengkap, d.qr_code_path FROM pendaftaran d JOIN pasien p ON d.id_pasien = p.id_pasien WHERE d.id_pendaftaran = ?");
$stmt->bind_param("i", $id_pendaftaran);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) die("Data pendaftaran tidak ditemukan.");
$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Berhasil</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background-color: #f0fdf4; color: #065f46; padding: 50px; }
        .container { background: #fff; padding: 40px; border-radius: 12px; display: inline-block; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h1 { font-size: 28px; }
        p { font-size: 18px; margin-top: 20px; }
        img { margin-top: 30px; width: 250px; height: 250px; border: 5px solid #10b981; border-radius: 12px; }
        a { display: inline-block; margin-top: 30px; background: #10b981; color: white; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>✅ Terima Kasih, <?= htmlspecialchars($data['nama_lengkap']) ?>!</h1>
        <p>Pendaftaran Anda telah berhasil.<br>Silakan tunjukkan QR code ini di klinik untuk mendapatkan nomor antrian.</p>
        <?php if (!empty($data['qr_code_path'])) : ?>
            <img src="<?= htmlspecialchars($data['qr_code_path']) ?>" alt="QR Code Pendaftaran Anda">
        <?php else : ?>
            <p><strong>Gagal menampilkan QR Code.</strong></p>
        <?php endif; ?>
        <br>
        <a href="register.php">Daftar Pasien Lain</a>
    </div>
</body>
</html>