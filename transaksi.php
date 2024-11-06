<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Bouquet</title>
    <link rel="stylesheet" href="tr.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container container">
            <div class="logo">
                <h3>FLOSLYY</h3>
            </div>
            <ul class="menu-items">
                <li><a href="home.html">Home</a></li>
            </ul>
        </div>
    </nav>
    <section id="transaksi" class="transaksi-area container">
        <h1 class="main-title">Transaksi Bouquet</h1>
        <div class="produk-container">
            <div class="produk-item">
                <img src="images/IMG_3079.jpg" alt="Bouquet Bunga">
                <div class="produk-details">
                    <h4>Bouquet Bunga</h4>
                    <p>Harga: Rp 35.000</p>
                    <input type="number" value="0" min="0" class="quantity" id="bunga-quantity">
                </div>
            </div>
            <div class="produk-item">
                <img src="images/IMG_1008.jpg" alt="Bouquet Uang">
                <div class="produk-details">
                    <h4>Bouquet Uang</h4>
                    <p>Harga: Rp 50.000</p>
                    <input type="number" value="0" min="0" class="quantity" id="uang-quantity">
                </div>
            </div>
            <div class="produk-item">
                <img src="images/IMG_2532.jpg" alt="Bouquet Boneka">
                <div class="produk-details">
                    <h4>Bouquet Boneka</h4>
                    <p>Harga: Rp 40.000</p>
                    <input type="number" value="0" min="0" class="quantity" id="boneka-quantity">
                </div>
            </div>
            <div class="produk-item">
                <img src="images/IMG_1005.jpg" alt="Bouquet Makanan">
                <div class="produk-details">
                    <h4>Bouquet Makanan</h4>
                    <p>Harga: Rp 35.000</p>
                    <input type="number" value="0" min="0" class="quantity" id="makanan-quantity">
                </div>
            </div>
            <div class="produk-item">
                <img src="images/IMG_2398.jpg" alt="Bouquet Foto">
                <div class="produk-details">
                    <h4>Bouquet Foto</h4>
                    <p>Harga: Rp 45.000</p>
                    <input type="number" value="0" min="0" class="quantity" id="foto-quantity">
                </div>
            </div>
            <div class="produk-item">
                <img src="images/IMG_1213.jpg" alt="Bouquet Mix">
                <div class="produk-details">
                    <h4>Bouquet Mix</h4>
                    <p>Harga: Rp 50.000</p>
                    <input type="number" value="0" min="0" class="quantity" id="mix-quantity">
                </div>
            </div>
        </div>
        <h2>Keranjang Belanja</h2>
        <ul id="cartItems">
        </ul>
        <h3 id="total">Total: Rp 0</h3>
        <button class="btn btn-primary" onclick="updateCart()">Perbarui Keranjang</button>
    </section>
    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h2 class="header-title">FLOSLYY</h2>
                <ul class="poto">
                    <li><a href="#">Follow Us</a></li>
                    <li>
                        <a href="#"><img src="images/—Pngtree—instagram logo icon_3588821.png" alt="Instagram" class="social-icon"></a>
                    </li>
                    <li>
                        <a href="#"><img src="images/tiktok.png" alt="TikTok" class="social-icon"></a>
                    </li>
                    <li>
                        <a href="#"><img src="images/twitter.png" alt="Twitter" class="social-icon"></a>
                    </li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Layanan</h3>
                <ul>
                    <li><a href="#">Pesan Dari rumah</a></li>
                    <li><a href="#">Pesan Dari Toko</a></li>
                    <p>Konsultasi</p>
                    <p>Bunga Segar Musiman</p>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Contact Person </h3>
                <a href="https://wa.me/6281234567890" class="contact-link" target="_blank">
                    Nomor Telfon
                </a>       
                <p>Alamat Email</p>
            </div>
            <div class="footer-app-links">
                <a href="#"><img src="images/google play.png" alt="Get it on Google Play"></a>
                <a href="#"><img src="images/app store.png" alt="Download on the App Store"></a>
            </div>
        </div>
        <div class="footer-info">
            <p>Company Profile</p>
            <p>Privacy Policy</p>
            <p>Terms of Service</p>
        </div>
    </footer>
    <script src="Transaksi.js"></script>
</body>
</html>
