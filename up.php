<?php
// Sertakan file koneksi database
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>



<div class="form-kenangan">
            <h2>Tambah Kenangan Baru</h2>
            <form action="proses_tambah.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="judul">Judul Kenangan:</label>
                    <input type="text" id="judul" name="judul" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Ceritakan Kenanganmu:</label>
                    <textarea id="deskripsi" name="deskripsi" required></textarea>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" id="tanggal" name="tanggal" required>
                </div>
                <div class="form-group">
                    <label for="gambar">Unggah Foto:</label>
                    <input type="file" id="gambar" name="gambar" accept="image/*" required>
                </div>
                <button type="submit" class="btn-submit">Simpan Kenangan</button>
            </form>
        </div>
</body>
</html>