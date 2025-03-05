<?php
// Koneksi ke database
$host = 'localhost';
$username = 'root';
$password = ''; // Ganti sesuai dengan password database Anda
$database = 'toko';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data pesan dari tabel messages
$$sql = "SELECT id, name, email, message, created_at FROM messages ORDER BY created_at DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Query gagal: " . $conn->error);
}

    echo "<h2>Daftar Pesan</h2>";
    echo "<table border='1' style='width:100%; border-collapse:collapse;'>";
    echo "<tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Pesan</th>
            <th>Tanggal</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . nl2br(htmlspecialchars($row['message'])) . "</td>";
        echo "<td>" . $row['created_at'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
else {
    echo "<p>Tidak ada pesan yang ditemukan.</p>";
}

$conn->close();
?>
