<?php
include './logic/auth.php';

if (isset($_POST['logout'])) {
  logout();
  header("Location: ../toko-boquet/index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Madame Florist</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<style>
  .hide-scrollbar::-webkit-scrollbar {
    display: none;
  }

  .hide-scrollbar {
    scrollbar-width: none;
  }
</style>

<body>
  <!-- NAVBAR -->
  <header class="py-8 flex flex-col md:flex-row justify-around items-center">
    <div class="flex items-center gap-x-5 mb-4 md:mb-0">
      <img class="w-16 rounded-full" src="images/logo.jpg" alt="">
      <h3 class="font-medium text-gray-600 text-3xl">Floslyy.</h3>
    </div>
    <ul class="flex flex-wrap items-center gap-x-5 text-lg">
      <li><a class="hover:text-gray-600 transition-colors" href="#">Beranda</a></li>
      <li><a class="hover:text-gray-600 transition-colors" href="#kategori">Kategori</a></li>
      <li><a class="hover:text-gray-600 transition-colors" href="#boquet">Bouquet</a></li>
      <li><a class="hover:text-gray-600 transition-colors" href="#ulasan">Ulasan</a></li>
      <li><a class="hover:text-gray-600 transition-colors" href="">Beli Sekarang</a></li>
    </ul>
    <div class="flex gap-x-5">
      <?php if (isset($_SESSION['nama']) && isset($_SESSION['role'])): ?>
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
      <?php else : ?>
        <a href="./views/login-page.php" class="rounded-lg border border-slate-200 px-6 py-2 bg-slate-200 hover:bg-red-600 hover:border-red-600 hover:text-white transition-all text-black">Login</a>
        <a href="./views/register-page.php" class="rounded-lg border border-red-600 px-6 py-2 bg-red-600 hover:bg-red-700 hover:border-red-700 transition-all text-white">Register</a>
      <?php endif ?>
    </div>
  </header>