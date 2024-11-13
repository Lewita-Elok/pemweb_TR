<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart - Madame Florist</title>
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

    <section id="cart" class="my-5">
        <div class="container">
            <h2 class="text-center mb-4">Keranjang Belanja</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="images/IMG_7785.jpg" alt="Buket Mawar Merah" class="img-fluid" width="80" />
                            </td>
                            <td>Buket Mawar Merah</td>
                            <td>
                                <input type="number" class="form-control" value="1" min="1" />
                            </td>
                            <td>Rp 450.000</td>
                            <td>Rp 450.000</td>
                            <td>
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="images/IMG_1207.jpg" alt="Buket Costume" class="img-fluid" width="80" /></td>
                            <td>Buket Costome</td>
                            <td>
                                <input type="number" class="form-control" value="1" min="1" />
                            </td>
                            <td>Rp 180.000</td>
                            <td>Rp 180.000</td>
                            <td>
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-end"><strong>Total Keseluruhan:</strong></td>
                            <td colspan="2"><strong>Rp 630.000</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-4">
                <a href="checkout.html" class="btn btn-primary">Lanjutkan ke Pembayaran</a>
                <a href="index.html" class="btn btn-secondary">Lanjut Belanja</a>
            </div>
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
                                class="social-icon"></a>
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