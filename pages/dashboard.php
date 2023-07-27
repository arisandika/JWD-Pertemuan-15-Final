<?php

require './connect.php';

// Get the count of rows in tbanggota table
$query_anggota_count = mysqli_query($db, "SELECT COUNT(*) FROM tbanggota;");
$row_anggota_count = mysqli_fetch_array($query_anggota_count);
$jumlah_data_anggota = $row_anggota_count[0];

// Get the count of rows in tbbuku table
$query_buku_count = mysqli_query($db, "SELECT COUNT(*) FROM tbbuku;");
$row_buku_count = mysqli_fetch_array($query_buku_count);
$jumlah_data_buku = $row_buku_count[0];



?>

<section>
  <div class="mt-4">
    <div class="grid grid-cols-1 lg:grid-cols-3 sm:grid gap-4 mb-4">
      <div class="flex items-center justify-center rounded bg-white border">
        <div class="p-5">
          <svg class="w-7 h-7 text-gray-700 mb-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 18 20">
            <path
              d="M16 0H4a2 2 0 0 0-2 2v1H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4.5a3 3 0 1 1 0 6 3 3 0 0 1 0-6ZM13.929 17H7.071a.5.5 0 0 1-.5-.5 3.935 3.935 0 1 1 7.858 0 .5.5 0 0 1-.5.5Z" />
          </svg>
          <div class="mb-2 text-lg font-bold tracking-tight text-gray-900">Informasi Anggota: <br>
            <span class="text-sm text-gray-700 font-semibold">
              <?php echo $jumlah_data_anggota; ?> Data Terdata dalam Database
            </span>
          </div>
          <p class="text-xs text-gray-700">Go to this step by step guideline process on how
            to certify for your weekly benefits:</p>
        </div>
      </div>
      <div class="flex items-center justify-center rounded bg-white border">
        <div class="p-5">
          <svg class="w-7 h-7 text-gray-700 mb-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 16 20">
            <path
              d="M16 14V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 0 0 0-2h-1v-2a2 2 0 0 0 2-2ZM4 2h2v12H4V2Zm8 16H3a1 1 0 0 1 0-2h9v2Z" />
          </svg>
          <div class="mb-2 text-lg font-bold tracking-tight text-gray-900">Informasi Buku: <br>
            <span class="text-sm text-gray-700 font-semibold">
              <?php echo $jumlah_data_buku; ?> Buku Terdata dalam Database
            </span>
          </div>
          <p class="text-xs text-gray-700">Go to this step by step guideline process on how
            to certify for your weekly benefits:</p>
        </div>
      </div>
      <div class="flex items-center justify-center rounded bg-white border">
        <div class="w-full p-5">
          <div class="flex items-center justify-between mb-2">
            <img class="w-10 h-10 rounded-full" src="./images/3321.png">
            <div>
              <a href="https://github.com/arisandika"
                class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-xs px-3 py-1.5">Follow</a>
            </div>
          </div>
          <p class="text-base mb-1 font-semibold leading-none text-gray-900">Ari Sandika</p>
          <p class="mb-2 text-sm font-normal">@arisandika</p>
          <p class="text-xs text-gray-600">Front End Dev | UI Designer</p>
          <a href="https://github.com/arisandika"
            class="text-blue-600 text-xs hover:underline">github.com/arisandika</a>
        </div>
      </div>
    </div>
    <div class=" items-center w-full rounded bg-white">
      <div class="flex flex-col items-center bg-white border rounded md:flex-row">
        <img class="object-cover w-full rounded h-96 md:h-auto md:w-48 md:rounded-none"
          src="https://flowbite.com/docs/images/blog/image-4.jpg" alt="">
        <div class="flex flex-col justify-between p-5 leading-normal">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
            acquisitions 2021</h5>
          <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
            acquisitions of 2021 so far, in reverse chronological order.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>