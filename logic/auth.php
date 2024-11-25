<?php
// Pastikan hanya memulai sesi jika belum aktif
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'conn.php';

function login($email, $password)
{
  global $conn;

  $email = $conn->real_escape_string($email);
  $password = $conn->real_escape_string($password);

  $sqlAdmin = "SELECT * FROM admins WHERE Email = '$email' AND Password = '$password'";
  $resAdmin = $conn->query($sqlAdmin);

  if ($resAdmin->num_rows > 0) {
    $admin = $resAdmin->fetch_assoc();

    $_SESSION['nama'] = $admin['NamaAdmin'];
    $_SESSION['role'] = $admin['role'];

    header('Location: ../views/dashboard-page.php');
    exit();
  }

  $sqlCst = "SELECT * FROM customer WHERE Email = '$email' AND Password = '$password'";
  $resCst = $conn->query($sqlCst);

  if ($resCst->num_rows > 0) {
    $cst = $resCst->fetch_assoc();

    $_SESSION['IdCustomer'] = $cst['IdCustomer'];
    $_SESSION['nama'] = $cst['NamaCustomer'];
    $_SESSION['role'] = $cst['role'];
    $_SESSION['isLogin'] = true;

    header('Location: ../index.php');
    exit();
  }

  echo 'Email atau Password salah';
}

function register($nama, $email, $password)
{
  global $conn;

  $nama = $conn->real_escape_string($nama);
  $email = $conn->real_escape_string($email);
  $password = $conn->real_escape_string($password);
  $role = 'customer';

  $sql = "INSERT INTO customer (NamaCustomer, Email, Password, role) VALUES ('$nama', '$email', '$password', '$role')";

  if (!$conn->query($sql)) echo 'Terjadi kesalahan' . $conn->error;

  header('Location: ../views/login-page.php');
}

function logout()
{
  session_destroy();
  session_unset();
}
