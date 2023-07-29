<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

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
      <div class="px-3 py-3 lg:px-5">
        <div class="flex items-center justify-between sm:ml-64">
          <div class="flex items-center justify-start lg:hidden">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
              type="button"
              class="inline-flex items-center p-2 text-sm rounded-lg sm:hidden hover:bg-purple-200 focus:outline-none focus:ring-2 focus:ring-gray-200">
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd"
                  d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                </path>
              </svg>
            </button>
          </div>
          <div class="block lg:hidden flex items-center">
            <img src="./images/logo.png" class="h-6 sm:h-7" />
            <span class="font-bold text-lg sm:text-xl text-purple-700 ml-1">Perpusline</span>
          </div>
          <div class="hidden lg:block relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
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
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300"
                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <img class="w-8 h-8 rounded-full" src="images/3321.png" alt="user photo">
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-purple-200 rounded shadow w-56"
              id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm font-bold" role="none">
                  Admin
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-200"
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
                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                <path
                  d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
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