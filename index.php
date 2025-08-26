<?php
// Sertakan file koneksi database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Kenangan Digital</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="col-md-6 mb-5 mb-lg-0 text-center text-md-start wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
   
    <div class="container">
        <h1>Buku Kenangan Digital ✨</h1>
        


      
        <hr>

        <h2>Semua Kenangan</h2>
        <div class="galeri-kenangan">
            <?php
            // Query untuk mengambil semua data dari tabel_kenangan
            $query = "SELECT * FROM tabel_kenangan ORDER BY tanggal DESC";
            $result = mysqli_query($koneksi, $query);

            // Periksa jika ada kenangan
            if (mysqli_num_rows($result) > 0) {
                // Looping untuk menampilkan setiap kenangan
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="kartu-kenangan">
                        <img src="uploads/<?php echo htmlspecialchars($row['gambar']); ?>" alt="<?php echo htmlspecialchars($row['judul']); ?>">
                        <div class="kartu-konten">
                            <h3><?php echo htmlspecialchars($row['judul']); ?></h3>
                            <small><?php echo date('d F Y', strtotime($row['tanggal'])); ?></small>
                            <p><?php echo nl2br(htmlspecialchars($row['deskripsi'])); ?></p>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>Belum ada kenangan yang disimpan. Yuk, tambahkan kenangan pertamamu!</p>";
            }
            ?>
        </div>
    </div>

</body>
</html>