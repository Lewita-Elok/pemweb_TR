<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout - Madame Florist</title>
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="tr.css" rel="stylesheet" />
</head>

<body>
    <header class="bg-light py-3">
        <div class="container text-center">
            <div class="d-flex justify-content-center align-items-center">
                <div class="logo">
                    <img src="images/logo.jpg" alt="Logo" class="logo-img" />
                </div>
                <div class="tengah">
                    <h1>Floslyy</h1>
                </div>
            </div>
        </div>
    </header>

    <section id="checkout" class="my-5">
        <div class="container">
            <h2 class="text-center mb-4">Checkout</h2>
            <form>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" id="name" class="form-control" placeholder="Nama Lengkap" required />
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Alamat Email" required />
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Alamat Pengiriman</label>
                    <input type="text" id="address" class="form-control" placeholder="Alamat Lengkap" required />
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="tel" id="phone" class="form-control" placeholder="Nomor Telepon" required />
                    </div>
                    <div class="col-md-6">
                        <label for="payment" class="form-label">Metode Pembayaran</label>
                        <select id="payment" class="form-select" required>
                            <option value="transfer-bank">Transfer Bank</option>
                            <option value="credit-card">Kartu Kredit</option>
                            <option value="e-wallet">E-Wallet</option>
                        </select>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
                    <a href="cart.php" class="btn btn-secondary">Kembali ke Keranjang</a>
                </div>
            </form>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h2 class="header-title">FLOSLYY</h2>
                <ul class="poto">
                    <li><a href="#">Follow Us</a></li>
                    <li>
                        <a href="#"><img src="images/—Pngtree—instagram logo icon_3588821.png" alt="Instagram"
                                class="social-icon" /></a>
                    </li>
                    <li>
                        <a href="#"><img src="images/tiktok.png" alt="TikTok" class="social-icon" /></a>
                    </li>
                    <li>
                        <a href="#"><img src="images/twitter.png" alt="Twitter" class="social-icon" /></a>
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
                <h3>Contact Person</h3>
                <a href="https://wa.me/6281234567890" class="contact-link" target="_blank"> Nomor Telfon </a>
                <p>Alamat Email</p>
            </div>
        </div>
        <div class="footer-info">
            <p>Company Profile</p>
            <p>Privacy Policy</p>
            <p>Terms of Service</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>