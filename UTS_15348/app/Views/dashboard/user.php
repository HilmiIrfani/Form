<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h2 class="mb-4"><i class="bi bi-person-circle text-danger"></i> Selamat datang, <?= session('username') ?>!</h2>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card border-start border-dark border-5 shadow">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-box-seam me-2 text-danger"></i> Produk</h5>
                <p class="card-text">Lihat produk yang tersedia untuk dibeli.</p>
                <a href="#" class="btn btn-sm btn-outline-danger">Lihat Produk</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-start border-dark border-5 shadow">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-cart-check-fill me-2 text-danger"></i> Riwayat Transaksi</h5>
                <p class="card-text">Lihat transaksi atau pesanan yang sudah Anda lakukan.</p>
                <a href="#" class="btn btn-sm btn-outline-danger">Lihat Riwayat</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

