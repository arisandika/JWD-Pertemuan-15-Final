<?php
require 'connect.php';

session_start();

if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION["login"] = true;
    
    $stmt = mysqli_prepare($db, "SELECT name FROM user WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    if ($result && mysqli_num_rows($result) === 1) {
      $name_row = mysqli_fetch_assoc($result);
      $_SESSION["name"] = $name_row['name'];
    } else {
      $_SESSION["name"] = "Nama Pengguna Tidak Ditemukan";
    }

    header("Location: index.php");
    exit;
  }
  $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./images/logo.png">
  <title>Login</title>
</head>

<body>
  <div class="navbar">
    <nav class="fixed top-0 w-full">
      <div class="px-4 py-3 lg:pb-0 lg:px-8">
        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <img src="./images/logo.png" class="h-6 sm:h-7" />
            <span class="font-bold text-lg sm:text-xl text-purple-700 ml-1">Perpusline</span>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <section class="h-screen bg-cover bg-center flex items-center p-6">
    <div
      class="mx-auto grid md:grid-cols-2 bg-white py-5 lg:py-2 gap-4 lg:gap-16 justify-center items-center rounded-xl">
      <div class="md:p-6">
        <a href="https://storyset.com/people" target="_blank">
          <img src="./images/Library-amico.png" width="380px">
        </a>
      </div>
      <div class="md:px-5">
        <div class="text-center mb-4">
          <div class="text-2xl font-bold pb-1 text-purple-600">Hi, Welcome Back!</div>
          <div class="text-xs">Please enter your username and password</div>
        </div>
        <form class="space-y-3" action="#" method="post">
          <div>
            <label for="username" class="block mb-2 text-xs font-medium">Username</label>
            <input type="text" name="username" id="username"
              class="bg-purple-50 border border-gray-100 text-xs rounded block w-full focus:ring-1 focus:ring-purple-300"
              placeholder="input username" required>
          </div>
          <div>
            <label for="password" class="block mb-2 text-xs font-medium">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••"
              class="bg-purple-50 border border-gray-100 text-xs rounded block w-full focus:ring-1 focus:ring-purple-300"
              required>
          </div>
          <?php
          if (isset($error)): ?>
            <label class="label"></label>
            <div class="bg-purple-50 py-2.5 px-3 rounded flex items-center">
              <span class="text-red-500 text-xs bg-purple-100">Incorrect email or password.</span>
            </div>
          <?php endif; ?>
          <button type="submit" name="login" id="login"
            class="w-full px-5 py-2.5 text-xs font-medium text-center text-white bg-purple-700 rounded hover:bg-purple-800"
            style="margin-top: 20px;">LOGIN</button>
          <div class="text-center pt-2">
            <p class="text-xs">Don't have an account? <span><a href="register.php"
                  class="text-purple-600">Register</a></span></p>
          </div>
        </form>
      </div>
    </div>
  </section>


  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</body>

</html>