<?php

include '../logic/conn.php';

if (isset($_GET['id'])) {
  $id = $conn->real_escape_string($_GET['id']);

  $sql = "SELECT * FROM produk WHERE IdProduk = $id";
  $res = $conn->query($sql);

  if ($res->num_rows > 0) {
    $produk = $res->fetch_assoc();
  } else {
    echo "Produk tidak ditemukan.";
    exit();
  }
} else {
  echo "ID produk tidak valid.";
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Produk - <?= $produk['NamaProduk'] ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

  <!-- Detail Produk Section -->
  <section class="mt-16 px-4 md:px-48">
  <div class="flex flex-col md:flex-row gap-8">
    <div class="flex-1">
      <img class="w-full h-[400px] object-cover rounded-lg" src="../images/<?= $produk['gambar'] ?>" alt="<?= $produk['NamaProduk'] ?>">
    </div>
    <div class="flex-1">
      <h1 class="text-3xl font-bold mb-4"><?= $produk['NamaProduk'] ?></h1>
      <p class="text-lg text-slate-600 mb-6">Rp. <?= number_format($produk['Harga'], 0, ',', '.') ?></p>
      <p class="text-slate-500 mb-6"><?= $produk['deskripsiProduk'] ?></p>
      <!-- Tombol sebagai link yang mengarah ke index.php -->
      <a href="../index.php#boquet" class="rounded-lg border border-red-600 px-6 py-2 bg-red-600 hover:bg-red-700 hover:border-red-700 transition-all text-white text-center inline-block">
        Kembali ke Beranda
      </a>
    </div>
  </div>
</section>

</body>

</html>