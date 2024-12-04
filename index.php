<?php include './views/components/header.php' ?>
<?php
include './logic/conn.php';

// Kategori
$sqlKategori = "SELECT * FROM kategori";
$resKategori = $conn->query($sqlKategori);
$listKategori = $resKategori->fetch_all(MYSQLI_ASSOC);

// Produk
$sqlProduk = "SELECT * FROM produk";
$resProduk = $conn->query($sqlProduk);
$listProduk = $resProduk->fetch_all(MYSQLI_ASSOC);

// Ulasan join Customer table
$sqlUlasan = "
  SELECT ulasan.*, customer.NamaCustomer AS namaCst
  FROM ulasan
  JOIN customer ON ulasan.IdCustomer = customer.IdCustomer
";
$resUlasan = $conn->query($sqlUlasan);
$listUlasan = $resUlasan->fetch_all(MYSQLI_ASSOC);

// Insert ulasan
if (isset($_POST['btn-ulasan'])) {
  $idCustomer = $_SESSION['IdCustomer'];
  $ulasan = $_POST['ulasan'];

  $sqlInsertUlasan = "INSERT INTO ulasan (Ulasan, IdCustomer) VALUES ('$ulasan', '$idCustomer')";
  if ($conn->query($sqlInsertUlasan)) {
    echo "<script>alert('Ulasan berhasil ditambahkan')</script>";
    header("Location: index.php");
  } else {
    echo "<script>alert('Ulasan gagal ditambahkan')</script>";
  }
}

?>

<!-- HERO SECTION -->
<section class="w-full h-[600px] bg-[url('images/bg.jpg')] bg-no-repeat bg-cover bg-center relative">
  <div class="absolute inset-0 text-white flex items-center justify-center flex-col text-center px-4">
    <h3 class="font-semibold text-4xl md:text-6xl drop-shadow-[7px_5px_12px_rgba(0,0,0,.7)]">Beautiful Flowers for
      Every
      Occasion
    </h3>
    <p class="text-lg md:text-xl mt-4 drop-shadow-2xl">Your trusted florist in Salatiga since 2022</p>
  </div>
</section>

<!-- Kategori -->
<section id="kategori" class="mt-12 px-4 md:px-16">
  <h3 class="text-center text-2xl font-medium">Kategori</h3>
  <div class="flex flex-wrap justify-center gap-x-4 md:gap-x-10 mt-8 md:mt-12">
    <button class="border max-w-[200px] rounded-full">
      <div class="flex items-center justify-center gap-x-4 py-2 px-3 w-[80px]">
        <p>All</p>
      </div>
    </button>
    <?php foreach ($listKategori as $kategori) : ?>
      <button class="border max-w-[250px] rounded-full">
        <div class="flex items-center gap-x-4 py-2 px-3">
          <img class="w-10 h-10 object-cover rounded-full" src="images/<?= $kategori['gambar'] ?>" alt="">
          <p><?= $kategori['kategori'] ?></p>
        </div>
      </button>
    <?php endforeach; ?>
  </div>
</section>

<!-- Produk Boquet -->
<section id="boquet" class="mt-16 px-4 md:px-48 grid grid-cols-1 md:grid-cols-3 gap-8">
  <?php foreach ($listProduk as $produk): ?>
    <div class="max-w-full md:max-w-[350px] border group rounded-xl transition-all duration-300">
      <div class="relative">
        <img class="w-full h-[200px] object-cover rounded-t-xl" src="images/<?= $produk['gambar'] ?>" alt="">
        <a href="./views/detail-produk-page.php?id=<?= $produk['IdProduk'] ?>">
          <div class="absolute top-0 right-0 bg-[rgba(0,0,0,0.6)] p-3 rounded-lg m-4 invisible group-hover:visible hover:cursor-pointer">
            <svg class="text-white rotate-90" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
              viewBox="0 0 24 24">
              <path fill="currentColor"
                d="M8 8.4V16q0 .425-.288.713T7 17t-.712-.288T6 16V6q0-.425.288-.712T7 5h10q.425 0 .713.288T18 6t-.288.713T17 7H9.4l8.9 8.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z" />
            </svg>
          </div>
        </a>
      </div>
      <div class="px-5 pt-2 pb-5">
        <h3 class="mt-3 text-xl font-medium"><?= $produk['NamaProduk'] ?></h3>
        <p class="mt-5 text-slate-500">Buket pilihan sesuai dengan gambar. Silahkan tekan icon diatas untuk melihat secara detail</p>
        <div class="flex items-center justify-between mt-5">
          <p class="">Rp. <?= number_format($produk['Harga'], 0, ',', '.') ?></p>
          <?php if (isset($_SESSION['nama']) && isset($_SESSION['role']) == 'customer') : ?>
            <a href="./views/cart-page.php?action=add&IdProduk=<?= $produk['IdProduk'] ?>">
              <svg class="text-3xl" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                <path fill="currentColor" d="M2.997 3.496a.5.5 0 0 1 .5-.5h.438c.727 0 1.145.473 1.387.945c.165.323.284.717.383 1.059H16a1 1 0 0 1 .962 1.272l-1.496 5.275A2 2 0 0 1 13.542 13H8.463a2 2 0 0 1-1.93-1.473l-.642-2.355l-.01-.032l-1.03-3.498l-.1-.337c-.1-.346-.188-.652-.32-.909c-.159-.31-.305-.4-.496-.4h-.438a.5.5 0 0 1-.5-.5M8.5 17a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m5 0a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3" />
              </svg>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</section>

<!-- Ulasan -->
<section id="ulasan" class="mt-12 px-4 md:px-48">
  <h3 class="text-center text-2xl font-medium">Ulasan Pelanggan</h3>
  <div class="mt-12 <?= (isset($_SESSION['role']) && $_SESSION['role'] == 'customer') ? 'grid grid-cols-1 lg:grid-cols-2' : '' ?>  gap-x-8">
    <div class="max-h-96 overflow-y-auto hide-scrollbar <?= (isset($_SESSION['role']) && $_SESSION['role'] == 'customer') ? 'space-y-8' : 'grid grid-cols-1 gap-8 md:grid-cols-3' ?>  ">
      <?php foreach ($listUlasan as $ulasan) : ?>
        <div class="flex items-center gap-x-5 border py-5 px-8 rounded-lg">
          <img class="w-20 rounded-full" src="images/ulasan.jpeg" alt="">
          <div>
            <p>"<?= $ulasan['Ulasan'] ?>"</p>
            <p class="text-slate-500">- <?= $ulasan['namaCst'] ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <?php if (isset($_SESSION['nama']) && isset($_SESSION['role']) == 'customer') : ?>
      <div class="mt-10 lg:mt-0">
        <form action="" method="post">
          <h3 class="text-xl font-medium">Berikan Ulasan Anda</h3>
          <div class="flex flex-col gap-y-5 mt-5">
            <div class="flex flex-col gap-y-2">
              <label for="ulasan">Ulasan</label>
              <textarea class="border py-2 px-4 rounded-lg" rows="4" name="ulasan" id="ulasan"></textarea>
            </div>
          </div>
          <button
            class="mt-5 rounded-lg border border-red-600 px-10 py-2 bg-red-600 shadow-xl hover:bg-red-700 hover:border-red-700 transition-all text-white float-right"
            type="submit" name="btn-ulasan">Kirim</button>
        </form>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php include './views/components/footer.php' ?>