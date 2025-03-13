<!-- form.php -->
<?php
require_once 'Mahasiswa.php'; // Memuat definisi class Mahasiswa

// Mendapatkan data dari form
$nim = $_POST['nim'] ?? '';
$nama = $_POST['nama'] ?? '';

// Membuat objek Mahasiswa dan memanggil method setData()
$mahasiswa = new Mahasiswa();
$mahasiswa->setData($nim, $nama);

// Menampilkan data
echo "<h2>Data Mahasiswa</h2>";
$data = $mahasiswa->getData();

// Menampilkan NIM dan Nama secara vertikal
echo "<p>NIM: " . ($data['NIM']) . "</p>";
echo "<p>Nama: " . ($data['Nama']) . "</p>";
?>

