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
    $nama = $conn->real_escape_string($_POST['nama']);
    $email = $conn->real_escape_string($_POST['email']);
    $pesan = $conn->real_escape_string($_POST['pesan']);

    // Simpan pesan ke tabel "messages"
    $sql = "INSERT INTO messages (nama, email, pesan) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $nama, $email, $pesan);

    if ($stmt->execute()) {
        echo "<script>alert('Pesan Anda berhasil dikirim!');</script>";
    } else {
        echo "<script>alert('Gagal mengirim pesan: " . $conn->error . "');</script>";
    }

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AuRevoir Official</title>
    <!--Link to css-->
    <link rel="short icon" href="AuRevoirNB.png">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<a href="#" class="ignielToTop"></a>

<body>
    <header>
            <a href="https://www.instagram.com/aurevoirofficiall?igsh=MW1iMW0yNHNmbzNlZw==" class="logo"><img src="AuRevoir(logo).png"></a>
            <ul class="navmenu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#product">Product</a></li>
                    <li><a href="#contact-us">Contact</a></li>
            </ul>

            

    </header>

    <section class="main-home">
        <div class="main-logo">
            <img src="AuRevoirNB(white)n.png">
            
        </div>

        <div class="main-text">
            <h4>AuRevoir adalah sebuah brand pakaian asal Indonesia, nama AuRevoir sendiri berasal dari bahasa Prancis yang berarti "selamat tinggal".
            Bukan hanya sekedar nama, kata selamat tinggal ini memiliki pesan yang begitu dalam kepada seseorang yang telah ditinggalkan dan terciptalah brand AuRevoir dengan design yang memiliki makna tersendiri. 
            <br>  <br> Logo bunga yang sudah layu dalam genggaman menggambarkan sudah hilangnya seseorang yang sangat berharga, dan dengan nama AuRevoir yang memiliki
            arti "selamat tinggal" dapat digambarkan pada logo tersebut.
        </h4>
        </div>

    </section>
    
    

    <!--section-produk-section-section-->
    <section class="our-products" id="product">
        <div class="center-text">
            <h2>Our Products</h2>
        </div>

        <div class="products">
            <div class="row">
                <a href="AuRevoirOfficial-.php"><img src="AuRevoir(design1,blck).png"></a>
                <div class="product-text">
                    <h5>Stok Habis</h5>
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
                    <h4>Every Butterfly You See<h4>
                        <p>Rp.125.000</p>
            </div>
            </div>

            <div class="row">
                <a href="AuRevoirOfficial-product2(1).php"><img src="AuRevoir2.png"></a>
                <div class="product-text">
                    
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
                    <h4>Can i Love as i Deep <h4>
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
                    <h4>Hoodie AuRevoir<h4>
                        <p>Rp.350.000</p>
            </div>
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