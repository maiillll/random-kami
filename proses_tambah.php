<?php
// Sertakan file koneksi
include 'koneksi.php';

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data dari form dan bersihkan
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);

    // Proses upload gambar
    $gambar = $_FILES['gambar']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($gambar);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi sederhana (misal: cek apakah file adalah gambar)
    $check = getimagesize($_FILES['gambar']['tmp_name']);
    if ($check !== false) {
        // Pindahkan file yang diupload ke folder 'uploads'
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
            
            // Buat query SQL untuk memasukkan data ke database
            $query = "INSERT INTO tabel_kenangan (judul, deskripsi, tanggal, gambar) VALUES ('$judul', '$deskripsi', '$tanggal', '$gambar')";

            // Jalankan query
            if (mysqli_query($koneksi, $query)) {
                // Jika berhasil, redirect kembali ke halaman utama
                header("Location: index.php");
                exit();
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
            }

        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file Anda.";
        }
    } else {
        echo "File yang diunggah bukan gambar.";
    }

    // Tutup koneksi
    mysqli_close($koneksi);
}
?>