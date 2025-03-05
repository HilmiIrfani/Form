<?php
// Konfigurasi email atau database untuk menyimpan pesan kontak
$host = 'localhost';
$username = 'root';
$password = ''; // Ganti jika ada password database
$database = 'toko';

// Koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nama_produk'])) {
        // Proses pembelian
        $nama_produk = $_POST['nama_produk'];
        $size = $_POST['size'];
        $jumlah = $_POST['jumlah'];
        $total_harga = $_POST['total_harga'];
        $alamat = $_POST['alamat'];
        $metode_pembayaran = isset($_POST['metode_pembayaran']) ? $_POST['metode_pembayaran'] : '';

        $sql = "INSERT INTO pembelian (nama_produk, size, jumlah, total_harga, metode_pembayaran, alamat) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param('ssisss', $nama_produk, $size, $jumlah, $total_harga, $metode_pembayaran, $alamat);

            if ($stmt->execute()) {
                echo "<script>alert('Pembelian berhasil disimpan!');</script>";
            } else {
                echo "<script>alert('Gagal menyimpan pembelian: " . $conn->error . "');</script>";
            }

            $stmt->close();
        } else {
            echo "<script>alert('Error pada query SQL: " . $conn->error . "');</script>";
        }
    } elseif (isset($_POST['nama'])) {
        // Proses pesan kontak
        $nama = $conn->real_escape_string($_POST['nama']);
        $email = $conn->real_escape_string($_POST['email']);
        $pesan = $conn->real_escape_string($_POST['pesan']);

        $sql = "INSERT INTO messages (nama, email, pesan) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param('sss', $nama, $email, $pesan);

            if ($stmt->execute()) {
                echo "<script>alert('Pesan Anda berhasil dikirim!');</script>";
            } else {
                echo "<script>alert('Gagal mengirim pesan: " . $conn->error . "');</script>";
            }

            $stmt->close();
        } else {
            echo "<script>alert('Error pada query SQL: " . $conn->error . "');</script>";
        }
    }
}


$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AuRevoir Official-Every Butterfly you</title>
    <!--Link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="short icon" href="AuRevoirNB.png">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="style3.css">
    
   

</head>

<a href="#" class="ignielToTop"></a>

<body>
    <header>
            <a href="https://www.instagram.com/aurevoirofficiall?igsh=MW1iMW0yNHNmbzNlZw==" class="logo"><img src="AuRevoir(logo).png"></a>
            <ul class="navmenu">
                    <li><a style="text-decoration:none" href="AuRevoirOfficial.php">Home</a></li>
                    <li><a style="text-decoration:none" href="#product">Product</a></li>
                    <li><a style="text-decoration:none" href="#contact-us">Contact</a></li>
            </ul>

            

    </header>

    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="aur2.png" width="100%" id="mainImg">

            <div class="small-image-group">
                <div class="small-img-col">
                    <img src="aur2.png" width="150%" class="small-img">
                </div>

                <div class="small-img-col">
                    <img src="aurw.png" width="150%" class="small-img">
                </div>

                <div class="small-img-col">
                    <img src="aur3.png" width="150%" class="small-img">
                </div>

                <div class="small-img-col">
                    <img src="sizeOVr.png" width="150%" class="small-img">
                </div>
             </div>
        </div>

        <div class="container">
            <div class="header">
                <span>Tersedia</span>
                
            </div>
            <div class="title">Oversize Tee AuRevoir - Can You Love Deep is a Deep</div>
            <div class="prices">Rp 125,000</div>
            <div class="rating">4.9 (12)</div>
            <div class="size-section">
                <h4>Size:</h4>
                <div class="size-options">
                    <div class="size-option">
                        <span>M</span>
                        <span>Rp 125,000</span>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBeli" data-nama="Oversize Tee AuRevoir - Can You Love Deep is a Deep" data-size="M" data-harga="125000">
                        Beli
                    </button>

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
                        <label for="size" class="form-label">Ukuran</label>
                        <select class="form-select" id="size" name="size" required>
                            <option value="M">M</option>
                            <option value="L">L</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                    </div>
                    <div class="mb-3">
                        <label for="total_harga" class="form-label">Total Harga</label>
                        <input type="number" class="form-control" id="total_harga" name="total_harga" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                        <select class="form-select" id="metode_pembayaran" name="metode_pembayaran" required>
                            <option value="Transfer Bank">Transfer Bank</option>
                            <option value="Kartu Kredit">Kartu Kredit</option>
                            <option value="COD">Cash on Delivery (COD)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
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

                        
                    </div>
                    <div class="size-option">
                        <span>L</span>
                        <span>Rp 125,000</span>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBeli" data-nama="Oversize Tee AuRevoir - Can You Love Deep is a Deep" data-size="M" data-harga="125000">
                        Beli
                    </button>
                    </div>
                    
                </div>
            </div>
            <div class="notify-btn">Detail Produk : <br> <br> Bahan : Cotton Combed 24s <br> Gramasi : 180gsm <br> Sablon : Puff ink <br><br><br>
            "Can You Love Deep is a Deep" desain pada kaos ini memiliki makna orang yang di dicintai apakah bisa mencintai sedalam yang ia cintai.
        </div>
        
    </section>


    <!--section-produk-section-section-->
    <section class="our-products" id="product">
        <div class="center-text">
            <h2>Produk Lainnya</h2>
        </div>
        
        <div class="products">
            <div class="row">
                <a href="AuRevoirOfficial-.php"><img src="AuRevoir1.png"></a>
                <div class="product-text">
                    <h5>Stook habis</h5>
                    
                </div>

                    <div class="heart-icon">
                         <i class='bx bx-heart'></i>
                    </div>

                <div class="ratting">
                    <i class='bx bx-star'></i>
                    <i class='bx bx-star'></i>
                    <i class='bx bx-star'></i>
                    <i class='bx bx-star'></i>
                    <i class='bx bxs-star-half'></i>
                </div>

                <div class="price">
                    <h4>Can i Love as i Deep<h4>
                        <p>Rp.125.000</p>
            </div>
            </div>

            <div class="row">
                <img src="AuRevoir3(tee)grey.png">
                <div class="product-text">
                    <h5>New</h5>
                </div>

                    <div class="heart-icon">
                         <i class='bx bx-heart'></i>
                    </div>

                <div class="ratting">
                    <i class='bx bx-star'></i>
                    <i class='bx bx-star'></i>
                    <i class='bx bx-star'></i>
                    <i class='bx bx-star'></i>
                    <i class='bx bxs-star-half'></i>
                </div>

                <div class="price">
                    <h4>Let go off <h4>
                        <p>Rp.140.000</p>
            </div>
            </div>

            <div class="row">
                <img src="hoodie AuRevoir.png">
                <div class="product-text">
                    <h5>New</h5>
                </div>

                    <div class="heart-icon">
                         <i class='bx bx-heart'></i>
                    </div>

                <div class="ratting">
                    <i class='bx bx-star'></i>
                    <i class='bx bx-star'></i>
                    <i class='bx bx-star'></i>
                    <i class='bx bx-star'></i>
                    <i class='bx bxs-star-half'></i>
                </div>

                <div class="price">
                    <h4> Hoodie AuRevoir <h4>
                        <p>Rp.340.000</p>
            </div>
            </div>

            
    </section>

    <!--section-contact-section-->

    <section id="contact-us" style="background-color: #f9f9f9; padding: 40px 20px; text-align: center;">
    <div class="center-text">
        <h2>Contact Us</h2>
        <p>Berikan kritik & saran anda kepada kami</p>
    </div>
    <div style="max-width: 600px; margin: 0 auto;">
        <form method="POST" style="display: flex; flex-direction: column; gap: 15px;">
            <input type="text" name="nama" placeholder="Nama" required style="padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
            <input type="email" name="email" placeholder="Email" required style="padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;">
            <textarea name="pesan" placeholder="Pesan" rows="5" required style="padding: 10px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;"></textarea>
            <button type="submit" style="background-color: #222; color: #fff; padding: 10px 20px; font-size: 16px; border: none; border-radius: 5px; cursor: pointer;">Kirim Pesan</button>
        </form>
    </div>
</section>


<script type="text/javascript">
   window.addEventListener("scroll", function(){
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);

   })
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
            integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
            integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
            crossorigin="anonymous"></script>


<script>
    var mainImg = document.getElementById('mainImg');
    var smallimg = document.getElementsByClassName('small-img');

    smallimg[0].onclick = function() {
        mainImg.src = smallimg[0].src;
    }
    smallimg[1].onclick = function() {
        mainImg.src = smallimg[1].src;
    }
    smallimg[2].onclick = function() {
        mainImg.src = smallimg[2].src;
    }
    smallimg[3].onclick = function() {
        mainImg.src = smallimg[3].src;
    }

    smallimg[4].onclick = function() {
        mainImg.src = smallimg[4].src;
    }
</script>


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

        modalTitle.textContent = `Beli Sekarang`;
        inputNamaProduk.value = namaProduk;

        const jumlahInput = modalBeli.querySelector('#jumlah');
        jumlahInput.addEventListener('input', function () {
            inputTotalHarga.value = jumlahInput.value * harga;
        });
    });
</script>

<footer style="background-color: #222; color: #fff; text-align: center; padding: 20px; margin-top: 20px;">
    <p>Follow Us on Social Media</p>
    <div style="margin: 10px 0;">
        <a href="https://www.instagram.com/aurevoirofficiall" target="_blank" style="color: #fff; margin: 0 10px; text-decoration: none;">
            <i class='bx bxl-instagram'></i> Instagram
        </a>
        <a href="https://www.facebook.com/aurevoirofficial" target="_blank" style="color: #fff; margin: 0 10px; text-decoration: none;">
            <i class='bx bxl-facebook'></i> Facebook
        </a>

    </div>
    <p>&copy; 2024 AuRevoir Official. All rights reserved.</p>
</footer>

</body>
</html>