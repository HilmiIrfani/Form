<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Mahasiswa</title>
</head>
<body>
    <h1>Form Input Mahasiswa</h1>
    <form action="form.php" method="POST">
        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim" required><br><br>

        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
