<?php
session_start();

include '../logic/conn.php';

if (!isset($_SESSION['nama']) || !isset($_SESSION['role'])) {
  header('Location: login.php');
  exit();
}

$cstId = $_SESSION['IdCustomer'];

if (isset($_GET['action'])) {
  $action = $_GET['action'];
  $produkId = isset($_GET['IdProduk']) ? $_GET['IdProduk'] : null;

  if ($action == 'add' && $produkId) {
    $sqlKeranjang = "SELECT * FROM keranjang WHERE IdCustomer = $cstId AND IdProduk = $produkId";
    $resKeranjang = $conn->query($sqlKeranjang);

    if ($resKeranjang->num_rows > 0) {
      $sqlUpdate = "UPDATE keranjang SET jumlah = jumlah + 1 WHERE IdCustomer = $cstId AND IdProduk = $produkId";
      $conn->query($sqlUpdate);
    } else {
      $sqlInsert = "INSERT INTO keranjang (jumlah, IdCustomer, IdProduk) VALUES (1, $cstId, $produkId)";
      $conn->query($sqlInsert);
    }
  } elseif ($action == 'purchase' && isset($_GET['payment'])) {
    $payment = $_GET['payment'];

    // Fetch cart items
    $sqlCart = "
      SELECT keranjang.*, produk.Harga
      FROM keranjang
      JOIN produk ON keranjang.IdProduk = produk.IdProduk
      WHERE keranjang.IdCustomer = $cstId
    ";
    $resCart = $conn->query($sqlCart);
    $listCart = $resCart->fetch_all(MYSQLI_ASSOC);

    $total = array_sum(array_map(function ($item) {
      return $item['Harga'] * $item['jumlah'];
    }, $listCart));

    if ($payment >= $total) {
      $tanggalPenjualan = date('Y-m-d H:i:s');
      $kembalian = $payment - $total;

      $sqlTransaksi = "INSERT INTO transaksi (TanggalPenjualan, Total, TanggalSelesai, IdCustomer) " .
        "VALUES ('$tanggalPenjualan', $total, '$tanggalPenjualan', $cstId)";
      $conn->query($sqlTransaksi);
      $transaksiId = $conn->insert_id;

      // Clear cart
      $sqlClearCart = "DELETE FROM keranjang WHERE IdCustomer = $cstId";
      $conn->query($sqlClearCart);

      echo "<script>alert('Transaksi berhasil! Kembalian Anda: Rp. " . number_format($kembalian, 0, ',', '.') . "'); window.location.href='../index.php';</script>";
    } else {
      $kurang = $total - $payment;
      echo "<script>alert('Uang Anda kurang: Rp. " . number_format($kurang, 0, ',', '.') . "'); window.location.href='cart-page.php';</script>";
    }
  } elseif ($action == 'remove' && $produkId) {
    $sqlKeranjang = "SELECT * FROM keranjang WHERE IdCustomer = $cstId AND IdProduk = $produkId";
    $resKeranjang = $conn->query($sqlKeranjang);

    if ($resKeranjang->num_rows > 0) {
      $item = $resKeranjang->fetch_assoc();
      if ($item['jumlah'] > 1) {
        $sqlUpdate = "UPDATE keranjang SET jumlah = jumlah - 1 WHERE IdCustomer = $cstId AND IdProduk = $produkId";
        $conn->query($sqlUpdate);
      } else {
        $sqlDelete = "DELETE FROM keranjang WHERE IdCustomer = $cstId AND IdProduk = $produkId";
        $conn->query($sqlDelete);
      }
    }
    header('Location: cart-page.php');
    exit();
  }
}

// Fetch cart items
$sqlCart = "
  SELECT keranjang.*, produk.NamaProduk, produk.Harga, produk.gambar, produk.IdProduk
  FROM keranjang
  JOIN produk ON keranjang.IdProduk = produk.IdProduk
  WHERE keranjang.IdCustomer = $cstId
";
$resCart = $conn->query($sqlCart);
$listCart = $resCart->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center w-full h-full flex-col bg-gray-100">
  <h3 class="text-2xl font-semibold mb-4 mt-20">Cart</h3>
  <div class="overflow-x-auto w-full max-w-[75%]">
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
      <thead>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
          <th class="py-3 px-6 text-left">Product</th>
          <th class="py-3 px-6 text-left">Name</th>
          <th class="py-3 px-6 text-left">Price</th>
          <th class="py-3 px-6 text-center">Quantity</th>
          <th class="py-3 px-6 text-right">Total</th>
          <th class="py-3 px-6 text-right">Action</th>
        </tr>
      </thead>
      <tbody class="text-gray-600 text-sm font-light">
        <?php foreach ($listCart as $item): ?>
          <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="py-3 px-6 text-left whitespace-nowrap"><img class="w-40 h-40 object-cover"
                src="../images/<?= $item['gambar'] ?>" alt=""></td>
            <td class="py-3 px-6 text-left whitespace-nowrap"><?= htmlspecialchars($item['NamaProduk']) ?></td>
            <td class="py-3 px-6 text-left">Rp. <?= number_format($item['Harga'], 0, ',', '.') ?></td>
            <td class="py-3 px-6 text-center"><?= htmlspecialchars($item['jumlah']) ?></td>
            <td class="py-3 px-6 text-right">Rp. <?= number_format($item['Harga'] * $item['jumlah'], 0, ',', '.') ?></td>
            <td class="py-3 px-6 text-right">
              <form method="GET" action="cart-page.php">
                <input type="hidden" name="action" value="remove">
                <input type="hidden" name="IdProduk" value="<?= $item['IdProduk'] ?>">
                <button type="submit" class="text-red-600 hover:text-red-800">Remove</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <h2 class="text-xl font-semibold mt-4">Total: Rp. <?= number_format(array_sum(array_map(function ($item) {
    return $item['Harga'] * $item['jumlah'];
  }, $listCart)), 0, ',', '.') ?></h2>
  <form method="GET" action="cart-page.php" class="mt-4">
    <input type="hidden" name="action" value="purchase">
    <label for="payment" class="block text-sm font-medium text-gray-700">Masukkan jumlah uang:</label>
    <input type="number" name="payment" id="payment" min="0" required
      class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    <button type="submit"
      class="mt-4 w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Beli
      Sekarang</button>
  </form>
  <a href="../index.php"
    class="mt-6 px-4 py-2 bg-red-500 text-white rounded-lg shadow-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 absolute top-6 left-6 flex items-center gap-x-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
      stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M19 12H5" />
      <path d="M12 19l-7-7 7-7" />
    </svg>
    <span class="sr-only">Kembali ke Beranda</span>
  </a>
</body>

</html>