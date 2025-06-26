<?php
$koneksi = mysqli_connect("localhost", "root", "", "klinik_db");
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>