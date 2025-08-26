<?php
// Pengaturan koneksi database
$host = "localhost";    // Nama host server database
$user = "root";         // Username database (default XAMPP)
$pass = "";             // Password database (default XAMPP kosong)
$db   = "kenangan_db";  // Nama database

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>