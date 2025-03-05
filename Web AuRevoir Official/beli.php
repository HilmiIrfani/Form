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

// Cek jika form modal disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_produk = $_POST['nama_produk'];
    $jumlah = $_POST['jumlah'];
    $total_harga = $_POST['total_harga'];

    $sql = "INSERT INTO pembelian (nama_produk, jumlah, total_harga) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sii', $nama_produk, $jumlah, $total_harga);

    if ($stmt->execute()) {
        echo "<script>alert('Pembelian berhasil disimpan!');</script>";
    } else {
        echo "<script>alert('Gagal menyimpan pembelian: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Produk</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Produk A</h5>
                    <p class="card-text">Harga: Rp100.000</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBeli" data-nama="Produk A" data-harga="100000">
                        Beli
                    </button>
                </div>
            </div>
        </div>
        <!-- Tambahkan produk lainnya sesuai kebutuhan -->
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalBeli" tabindex="-1" aria-labelledby="modalBeliLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBeliLabel">Beli Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                    </div>
                    <div class="mb-3">
                        <label for="total_harga" class="form-label">Total Harga</label>
                        <input type="number" class="form-control" id="total_harga" name="total_harga" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Beli</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const modalBeli = document.getElementById('modalBeli');
    modalBeli.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const namaProduk = button.getAttribute('data-nama');
        const harga = button.getAttribute('data-harga');

        const modalTitle = modalBeli.querySelector('.modal-title');
        const inputNamaProduk = modalBeli.querySelector('#nama_produk');
        const inputTotalHarga = modalBeli.querySelector('#total_harga');

        modalTitle.textContent = `Beli ${namaProduk}`;
        inputNamaProduk.value = namaProduk;

        const jumlahInput = modalBeli.querySelector('#jumlah');
        jumlahInput.addEventListener('input', function () {
            inputTotalHarga.value = jumlahInput.value * harga;
        });
    });
</script>
</body>
</html>
