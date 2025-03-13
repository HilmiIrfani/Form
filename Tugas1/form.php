<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Nama dan NIM</title>
</head>
<body>
    <h2>Form Input Nama dan NIM</h2>
    <form action="form.php" method="POST">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim" required><br><br>

        <input type="submit" value="Kirim">
    </form>

    <?php
        // Mengecek apakah form telah disubmit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Mengambil data dari form
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];

            // Menampilkan hasil input
            echo "<h3>Hasil Input:</h3>";
            echo "<p>Nama: $nama</p>";
            echo "<p>NIM: $nim</p>";
        }
    ?>
</body>
</html>
