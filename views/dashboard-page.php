<?php
session_start();

include '../logic/conn.php';
include '../logic/auth.php';

if ($_SESSION['role'] !== 'admin') {
  header('Location: ./login-page.php');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $productId = $_POST['product'];
  $newPrice = $_POST['price'];

  $stmt = $conn->prepare("UPDATE produk SET Harga = ? WHERE IdProduk = ?");
  $stmt->bind_param("di", $newPrice, $productId);

  if ($stmt->execute()) {
    echo "<script>alert('Harga produk berhasil diperbarui');</script>";
  } else {
    echo "<script>alert('Gagal memperbarui harga produk');</script>";
  }

  $stmt->close();
}

if (isset($_POST['logout'])) {
  logout();
  header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
  <div class="flex items-center justify-between p-10">
    <h3 class=" text-2xl font-semibold">Dashboard</h3>
    <form action="" method="post">
      <button type="submit" class="text-red-500 text-2xl" name="logout">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
          <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
            <path d="M10 8V6a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2v-2" />
            <path d="M15 12H3l3-3m0 6l-3-3" />
          </g>
        </svg>
      </button>
    </form>
  </div>
  <div class="px-10">
    <h4 class="text-xl font-semibold mb-5">Perbarui Harga Produk</h4>
    <form action="" method="POST" class="mb-5">
      <label for="product" class="block mb-2">Pilih Produk:</label>
      <select name="product" id="product" class="block w-full mb-2 p-2 border">
        <?php
        $result = $conn->query("SELECT IdProduk, NamaProduk FROM produk");
        while ($row = $result->fetch_assoc()) {
          echo "<option value='{$row['IdProduk']}'>{$row['NamaProduk']}</option>";
        }
        ?>
      </select>
      <label for="price" class="block mb-2">Harga Baru:</label>
      <input type="number" name="price" id="price" class="block w-full mb-2 p-2 border" required>
      <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg mt-5">Perbarui Harga</button>
    </form>

    <h4 class="text-xl font-semibold mt-10">Transaksi Pelanggan</h4>
    <table class="w-full border-collapse border mt-3">
      <thead>
        <tr>
          <th class="border p-2">ID Transaksi</th>
          <th class="border p-2">Nama Pelanggan</th>
          <th class="border p-2">Email</th>
          <th class="border p-2">Total</th>
          <th class="border p-2">Tanggal Transaksi</th>
          <th class="border p-2">Tanggal Selesai</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = $conn->query("SELECT transaksi.IdTransaksi, customer.NamaCustomer, customer.Email, transaksi.Total, transaksi.TanggalPenjualan, transaksi.TanggalSelesai FROM transaksi JOIN customer ON transaksi.IdCustomer = customer.IdCustomer");
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                <td class='border p-2'>{$row['IdTransaksi']}</td>
                <td class='border p-2'>{$row['NamaCustomer']}</td>
                <td class='border p-2'>{$row['Email']}</td>
                <td class='border p-2'>{$row['Total']}</td>
                <td class='border p-2'>{$row['TanggalPenjualan']}</td>
                <td class='border p-2'>{$row['TanggalSelesai']}</td>
              </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>