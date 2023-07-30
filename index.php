<?php
require 'connect.php';

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

$name = $_SESSION["name"];

$p_dir = 'pages';
$view = isset($_GET['p']) ? basename($_GET['p']) : 'beranda';

$pages = scandir($p_dir, 0);
unset($pages[0], $pages[1]);

if (empty($view) || !in_array($view . '.php', $pages)) {
  $view = 'beranda';
}

$page_path = $p_dir . '/' . $view . '.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./images/logo.png">
  <title>Perpusline</title>
  <style>
    body {
      background-color: #FAFBFD;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <div class="navbar">
    <nav class="fixed top-0 z-30 w-full border-b bg-white border-gray-200">
      <div class="px-3 lg:py-3 py-2.5 lg:px-5">
        <div class="flex items-center justify-between sm:ml-64">
          <div class="flex items-center justify-start lg:hidden">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
              type="button" class="inline-flex items-center p-2 text-gray-500 focus:outline-none">
              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                  d="M1 1h15M1 7h15M1 13h15" />
              </svg>
            </button>
          </div>
          <div class="block lg:hidden flex items-center">
            <img src="./images/logo.png" class="h-6 sm:h-8" />
            <span class="font-bold text-xl text-purple-700 ml-1">Perpusline</span>
          </div>
          <div class="hidden lg:block relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-3 h-3 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
              </svg>
            </div>
            <div>
              <form method="post" class="flex gap-2">
                <input type="text" name="pencarian"
                  class="block p-2 pl-10 text-sm text-gray-900 border border-white rounded-lg w-64 h-9 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                  placeholder="Search for all">
              </form>
            </div>
          </div>
          <div class="flex justify-end items-center">
            <div>
              <button type="button" class="flex items-center lg:p-0 px-2 text-gray-500 focus:outline-none"
                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <img class="w-6 h-6 rounded-full hidden lg:block mr-2.5" src="./images/3321.png" alt="user photo">
                <svg class="w-7 h-7 text-gray-800 block lg:hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2"
                    d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <p class="text-xs font-semibold hidden lg:block">
                  <?php echo $name; ?>
                </p>
                <svg class="w-2 h-2 ml-2 hidden lg:block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="m1 1 4 4 4-4" />
                </svg>
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-purple-200 rounded shadow w-56"
              id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <div class="flex items-center">
                  <img class="w-6 h-6 rounded-full mr-2.5" src="./images/3321.png" alt="user photo">
                  <p class="text-sm font-semibold" role="none">
                    <?php echo $name; ?>
                  </p>
                </div>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="index.php?p=dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-200"
                    role="menuitem">Dashboard</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-200"
                    role="menuitem">Settings</a>
                </li>
                <li>
                  <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                    role="menuitem">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <!-- Sidebar -->
  <div class="sidebar">
    <aside id="logo-sidebar"
      class="fixed top-0 left-0 z-40 w-64 h-screen pt-5 lg:px-2 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
      aria-label="Sidebar">
      <div class="h-full px-3 pb-4 overflow-y-auto text-gray-700">
        <ul class="space-y-2 font-medium text-sm">
          <li>
            <a>
              <div class="flex items-center px-1.5 lg:px-6 mb-6">
                <img src="./images/logo.png" class="h-6 mr-2 sm:h-7" />
                <span class="self-center font-bold text-lg sm:text-xl text-purple-700">Perpusline</span>
              </div>
            </a>
          </li>
          <li>
            <a href="index.php?p=beranda"
              class="flex items-center w-full p-2 cursor-pointer transition text-base rounded-lg group hover:bg-purple-200 <?php echo ($view === 'beranda') ? 'active-link' : ''; ?>"
              style="<?php echo ($view === 'beranda') ? 'background-color: #6c2bd9; color: #fff;' : ''; ?>">
              <svg class="sidebar-item flex-shrink-0 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
              </svg>
              <span class="ml-3 text-sm">Home</span>
            </a>
          </li>
          <li>
            <a href="index.php?p=dashboard"
              class="flex items-center w-full p-2 cursor-pointer transition text-base rounded-lg group hover:bg-purple-200"
              style="<?php echo ($view === 'dashboard') ? 'background-color: #6c2bd9; color: #fff;' : ''; ?>">
              <svg class="sidebar-item flex-shrink-0 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 22 21">
                <path
                  d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                <path
                  d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
              </svg>
              <span class="ml-3 text-sm">Dashboard</span>
            </a>
          </li>
          <li>
            <button type="button"
              class="flex items-center w-full p-2 cursor-pointer transition text-base rounded-lg group hover:bg-purple-200"
              aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
              <svg class="flex-shrink-0 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 18">
                <path
                  d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
              </svg>
              <span class="flex-1 ml-3 text-left whitespace-nowrap text-sm">Data Master</span>
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 4 4 4-4" />
              </svg>
            </button>
            <ul id="dropdown-example" class="hidden py-2 space-y-2">
              <li>
                <a href="index.php?p=anggota"
                  class="flex items-center w-full p-2 cursor-pointer transition rounded-lg pl-10 group hover:bg-purple-200"
                  style="<?php echo ($view === 'anggota') ? 'background-color: #6c2bd9; color: #fff;' : ''; ?>">Member
                  Data</a>
              </li>
              <li>
                <a href="index.php?p=buku"
                  class="flex items-center w-full p-2 cursor-pointer transition rounded-lg pl-10 group hover:bg-purple-200"
                  style="<?php echo ($view === 'buku') ? 'background-color: #6c2bd9; color: #fff;' : ''; ?>">Book
                  Data</a>
              </li>
            </ul>
          </li>
          <li>
            <button type="button"
              class="flex items-center w-full p-2 cursor-pointer transition text-base rounded-lg group hover:bg-purple-200"
              aria-controls="dropdown-2" data-collapse-toggle="dropdown-2">
              <svg class="flex-shrink-0 w-5 h-5 group-hover:text-gray-900" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                <path
                  d="M19 0H1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1ZM2 6v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6H2Zm11 3a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0h2a1 1 0 0 1 2 0v1Z" />
              </svg>
              <span class="flex-1 ml-3 text-left whitespace-nowrap text-sm">Data Transaction</span>
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 4 4 4-4" />
              </svg>
            </button>
            <ul id="dropdown-2" class="hidden py-2 space-y-2">
              <li>
                <a href="index.php?p=pinjam"
                  class="flex items-center w-full p-2 cursor-pointer transition rounded-lg pl-10 group hover:bg-purple-200"
                  style="<?php echo ($view === 'pinjam') ? 'background-color: #6c2bd9; color: #fff;' : ''; ?>">Loan
                  Transaction</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="index.php?p=laporan" class="flex items-center p-2 rounded-lg hover:bg-purple-200 group"
              style="<?php echo ($view === 'laporan') ? 'background-color: #6c2bd9; color: #fff;' : ''; ?>">
              <svg class="flex-shrink-0 w-5 h-5 group-hover:text-gray-900" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                  d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
              </svg>
              <span class="flex-1 ml-3 whitespace-nowrap">Transaction Report</span>
            </a>
          </li>
          <li>
            <a href="logout.php" class="flex items-center p-2 rounded-lg hover:bg-purple-200 group">
              <svg class="flex-shrink-0 w-5 h-5 group-hover:text-gray-900" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
              </svg>
              <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </aside>
  </div>

  <!-- Field -->
  <div class="field mt-10 h-screen">
    <div class="p-4 sm:ml-64" id="main-content">
      <!-- Content -->
      <?php
      include $page_path;
      ?>
    </div>
  </div>

  <script>
    function handleLinkClick(event) {
      event.preventDefault();

      resetLinkBackground();

      var links = event.currentTarget.parentElement.getElementsByTagName('a');
      for (var i = 0; i < links.length; i++) {
        links[i].classList.remove('active-link');
        links[i].style.backgroundColor = "";
      }

      event.currentTarget.classList.add('active-link');
      event.currentTarget.style.backgroundColor = "#6c2bd9";
      event.currentTarget.style.color = "#fff";

      loadContent(event.currentTarget.getAttribute('data-page'));
    }

    function resetLinkBackground() {
      var links = document.querySelectorAll('.sidebar-item a');
      for (var i = 0; i < links.length; i++) {
        links[i].classList.remove('active-link');
        links[i].style.backgroundColor = '';
        links[i].style.color = '';
      }
    }

    var links = document.querySelectorAll('.sidebar-item a');

    for (var i = 0; i < links.length; i++) {
      links[i].addEventListener('click', handleLinkClick);
    }

    function loadContent(page) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("main-content").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "pages/" + page + ".php", true);
      xhttp.send();
    }
  </script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</body>

</html>