<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<h2 class="mb-4"><i class="bi bi-speedometer2 text-danger"></i> Admin Dashboard</h2>

<div class="container mt-4">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-start border-dark border-5 shadow h-100">
                <div class="card-body">
                    <h5><i class="bi bi-box-seam me-2 text-danger"></i> Produk</h5>
                    <p>Kelola daftar produk yang tersedia di toko Anda.</p>
                    <a href="#" class="btn btn-sm btn-outline-danger">Kelola Produk</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-start border-dark border-5 shadow h-100">
                <div class="card-body">
                    <h5><i class="bi bi-people-fill me-2 text-danger"></i> Pelanggan</h5>
                    <p>Lihat dan atur data pelanggan yang terdaftar.</p>
                    <a href="#" class="btn btn-sm btn-outline-danger">Kelola Pelanggan</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-start border-dark border-5 shadow h-100">
                <div class="card-body">
                    <h5><i class="bi bi-bar-chart-line-fill me-2 text-danger"></i> Laporan</h5>
                    <p>Pantau penjualan dan statistik hasil penjualan.</p>
                    <a href="#" class="btn btn-sm btn-outline-danger">Lihat Laporan</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>
