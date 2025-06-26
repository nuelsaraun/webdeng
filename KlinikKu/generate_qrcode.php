<?php
include 'koneksi.php';

$nama_lengkap = $_POST['name'];
$no_hp = $_POST['phone'];
$tgl_lahir = $_POST['dob'];
$alamat = $_POST['address'];
$keluhan = $_POST['complaint'];
$dokter = $_POST['dokter'];
$jadwal = $_POST['jadwal'];

// 1. Simpan data pasien
$stmt_pasien = $koneksi->prepare("INSERT INTO pasien (nama_lengkap, no_hp, tanggal_lahir, alamat) VALUES (?, ?, ?, ?)");
$stmt_pasien->bind_param("ssss", $nama_lengkap, $no_hp, $tgl_lahir, $alamat);
$stmt_pasien->execute();
$id_pasien_baru = $stmt_pasien->insert_id;
$stmt_pasien->close();

// 2. Simpan data pendaftaran
$stmt_daftar = $koneksi->prepare("INSERT INTO pendaftaran (id_pasien, keluhan, dokter, jadwal) VALUES (?, ?, ?, ?)");
$stmt_daftar->bind_param("isss", $id_pasien_baru, $keluhan, $dokter, $jadwal);
$stmt_daftar->execute();
$id_pendaftaran_baru = $stmt_daftar->insert_id;
$stmt_daftar->close();

// 3. Buat URL QR Code menggunakan API online gratis
$qr_content = $id_pendaftaran_baru;
$qr_api_url = "https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=" . urlencode($qr_content);

// 4. Update path QR Code (URL dari API) ke database
$stmt_update = $koneksi->prepare("UPDATE pendaftaran SET qr_code_path = ? WHERE id_pendaftaran = ?");
$stmt_update->bind_param("si", $qr_api_url, $id_pendaftaran_baru);
$stmt_update->execute();
$stmt_update->close();

// 5. Arahkan ke halaman terimakasih
header("Location: terimakasih.php?id=" . $id_pendaftaran_baru);
exit();
?>