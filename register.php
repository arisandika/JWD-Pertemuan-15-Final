<?php
require 'connect.php';

session_start();

if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}
function registrasi($data)
{
  global $db;

  $name = ucwords(stripcslashes($data["name"]));
  $username = strtolower(stripcslashes($data["username"]));
  $password = mysqli_real_escape_string($db, $data["password"]);
  $password2 = mysqli_real_escape_string($db, $data["password2"]);

  if ($password !== $password2) {
    echo "<script>
            alert('Passwords do not match');
        </script>";
    return false;
  }

  $result = mysqli_query($db, "SELECT username FROM user WHERE username= '$username'");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>
        alert('Username has already');
      </script>";
    return false;
  }

  //hash password
  //$password = password_hash($password, PASSWORD_DEFAULT);

  mysqli_query($db, "INSERT INTO user (name, username, password) VALUES ('$name', '$username', '$password')");

  return mysqli_affected_rows($db);
}

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    header("Location: login.php");
    exit;
  } else {
    echo mysqli_error($db);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./images/logo.png">
  <title>Register</title>
</head>

<body>
  <div class="navbar">
    <nav class="fixed top-0 w-full">
      <div class="px-4 py-3 lg:pb-0 lg:px-8">
        <div class="flex items-center">
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
          <div class="text-2xl font-bold pb-1 text-purple-600">Hi, Welcome!</div>
          <div class="text-xs">Please fill in the information below</div>
        </div>
        <form class="space-y-3" action="#" method="post">
          <div>
            <label for="name" class="block mb-2 text-xs font-medium">Name</label>
            <input type="text" name="name" id="name"
              class="bg-purple-50 border border-gray-100 text-xs rounded block w-full focus:ring-1 focus:ring-purple-300"
              placeholder="Your name" required>
          </div>
          <div>
            <label for="username" class="block mb-2 text-xs font-medium">Username</label>
            <input type="text" name="username" id="username"
              class="bg-purple-50 border border-gray-100 text-xs rounded block w-full focus:ring-1 focus:ring-purple-300"
              placeholder="Username" required>
          </div>
          <div>
            <label for="password" class="block mb-2 text-xs font-medium">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••"
              class="bg-purple-50 border border-gray-100 text-xs rounded block w-full focus:ring-1 focus:ring-purple-300"
              required>
          </div>
          <div>
            <label for="password2" class="block mb-2 text-xs font-medium">Confirm Password</label>
            <input type="password" name="password2" id="password2" placeholder="••••••••"
              class="bg-purple-50 border border-gray-100 text-xs rounded block w-full focus:ring-1 focus:ring-purple-300"
              required>
          </div>
          <button type="submit" name="register" id="register"
            class="w-full px-5 py-2.5 text-xs font-medium text-center text-white bg-purple-700 rounded hover:bg-purple-800"
            style="margin-top: 20px;">CREATE MY ACCOUNT</button>
          <div class="text-center pt-2">
            <p class="text-xs">Already have an account? <span><a href="login.php"
                  class="text-purple-600">Login</a></span></p>
          </div>
        </form>
      </div>
    </div>
  </section>


  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</body>

</html>