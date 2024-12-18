<?php
session_start();

include '../logic/auth.php';

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  login($email, $password);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Floslyy</title>
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
  <section class="flex items-center justify-center w-[100vw] h-[100vh]">
    <form action="" method="post">
      <h3 class="text-2xl font-semibold text-center">Floslyy.</h3>
      <div class="mt-6 flex flex-col space-y-5">
        <div class="flex flex-col gap-y-3">
          <label class="text-lg" for="email">Email</label>
          <input class="border py-2 px-4 rounded-lg" type="email" name="email" id="email"
            placeholder="example@gmail.com" required>
        </div>
        <div class="flex flex-col gap-y-3">
          <label class="text-lg" for="password">Password</label>
          <input class="border py-2 px-4 rounded-lg" type="password" name="password" id="password"
            placeholder="Your password" required>
        </div>
      </div>
      <button type="submit" name="login"
        class="mt-8 rounded-lg border border-red-600 px-10 py-2 bg-red-600 hover:bg-red-700 hover:border-red-700 transition-all text-white w-full">Login</button>
      <p class="mt-5 text-center">Didn't have account? <a class="text-blue-500" href="./register-page.php">Register</a>
      </p>
    </form>
  </section>
</body>

</html>