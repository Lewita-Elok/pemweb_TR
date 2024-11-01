<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Produk - Floslyy</title>
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="tr.css" rel="stylesheet" />
  </head>
  <body>
    <header class="bg-light py-3">
      <div class="container text-center">
        <h1>Detail Produk</h1>
      </div>
    </header>

    <main class="container my-5">
      <div class="card">
        <img id="productImage" src="" alt="Product Image" class="card-img-top" />
        <div class="card-body">
          <h3 id="productName" class="card-title"></h3>
          <p id="productDescription" class="card-text"></p>
          <p class="price"><strong>Harga: </strong><span id="productPrice"></span></p>
          <a href="tr.php" class="btn btn-secondary">Kembali</a>
        </div>
      </div>
    </main>

    <script>
      // Mendapatkan ID produk dari URL
      const urlParams = new URLSearchParams(window.location.search);
      const productId = urlParams.get("id");

      // Data produk dummy untuk contoh
      const products = {
        1: {
          name: "Buket Mawar Merah",
          description: "Buket mawar merah elegan cocok untuk momen spesial.",
          price: "Rp 450.000",
          image: "images/IMG_7785.jpg",
        },
        2: {
          name: "Buket Mawar Putih",
          description: "Buket mawar putih yang elegan, melambangkan kemurnian.",
          price: "Rp 500.000",
          image: "images/IMG_7785.jpg",
        },
        3: {
          name: "Buket Mawar Merah",
          description: "Buket mawar merah elegan cocok untuk momen spesial.",
          price: "Rp 450.000",
          image: "images/IMG_7785.jpg",
        },
        4: {
          name: "Buket Mawar Putih",
          description: "Buket mawar putih yang elegan, melambangkan kemurnian.",
          price: "Rp 500.000",
          image: "images/IMG_7786.jpg",
        },
        5: {
          name: "Buket Mawar Merah",
          description: "Buket mawar merah elegan cocok untuk momen spesial.",
          price: "Rp 450.000",
          image: "images/IMG_7785.jpg",
        },
        6: {
          name: "Buket Mawar Putih",
          description: "Buket mawar putih yang elegan, melambangkan kemurnian.",
          price: "Rp 500.000",
          image: "images/IMG_7786.jpg",
        },
        7: {
          name: "Buket Mawar Merah",
          description: "Buket mawar merah elegan cocok untuk momen spesial.",
          price: "Rp 450.000",
          image: "images/IMG_7785.jpg",
        },
        8: {
          name: "Buket Mawar Putih",
          description: "Buket mawar putih yang elegan, melambangkan kemurnian.",
          price: "Rp 500.000",
          image: "images/IMG_7786.jpg",
        },
        9: {
          name: "Buket Mawar Merah",
          description: "Buket mawar merah elegan cocok untuk momen spesial.",
          price: "Rp 450.000",
          image: "images/IMG_7785.jpg",
        },
        10: {
          name: "Buket Mawar Putih",
          description: "Buket mawar putih yang elegan, melambangkan kemurnian.",
          price: "Rp 500.000",
          image: "images/IMG_7786.jpg",
        },
        // Tambahkan produk lainnya di sini
      };

      // Menampilkan detail produk berdasarkan ID
      const product = products[productId];
      if (product) {
        document.getElementById("productName").textContent = product.name;
        document.getElementById("productDescription").textContent = product.description;
        document.getElementById("productPrice").textContent = product.price;
        document.getElementById("productImage").src = product.image;
      } else {
        document.body.innerHTML = "<p>Produk tidak ditemukan</p>";
      }
    </script>
  </body>
</html>
