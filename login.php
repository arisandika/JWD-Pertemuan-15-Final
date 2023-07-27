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

  $result = mysqli_query($db, "SELECT * FROM admin WHERE username = '$username'");

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($password === "1234") {
      $_SESSION["login"] = true;

      header("Location: index.php");
      exit;
    }
  }
  $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <section class="hero h-screen flex justify-center items-center px-4 bg-cover bg-center"
    style="background-image: url(https://gcdnb.pbrd.co/images/iyPBd2yY8Ypy.png?o=1);">
    <div class="p-6 lg:p-8 space-y-6 bg-white rounded-lg shadow-xl" style="width: 400px;">
      <div class="text-center">
        <div class="text-2xl font-bold pb-1">LOGIN</div>
        <div class="text-xs">Please enter your username and password</div>
      </div>
      <form class="space-y-4" action="#" method="post">
        <div>
          <label for="username" class="block mb-2 text-sm font-medium">Username</label>
          <input type="text" name="username" id="username"
            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" placeholder="username"
            required>
        </div>
        <div>
          <label for="password" class="block mb-2 text-sm font-medium">Password</label>
          <input type="password" name="password" id="password" placeholder="••••••••"
            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" required>
        </div>
        <?php
        if (isset($error)): ?>
          <label class="label"></label>
          <div>
            <span class="text-red-500 text-xs">Incorrect email or password.</span>
          </div>
        <?php endif; ?>
        <button type="submit" name="login" id="login"
          class="w-full px-5 py-3 text-base font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800"
          style="margin-top: 30px;">LOGIN</button>
      </form>
    </div>
  </section>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</body>

</html>