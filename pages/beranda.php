<?php
include './connect.php';
?>

<div class="items-center justify-center px-4 mt-4 pb-8 border rounded-lg text-center bg-white">
  <div class="grid grid-cols-1 md:grid-cols-2 justify-between text-left py-6">
    <div class="text-2xl font-bold mb-5 lg:mb-0">Discover</div>
    <div class="relative">
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
            class="block p-2 pl-10 text-sm text-gray-900 border border-white rounded-lg w-full h-9 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
            placeholder="Search for book">
        </form>
      </div>
    </div>
  </div>
  <div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-6 gap-5">

    <?php
    $query = "SELECT * FROM tbbuku";
    $q_tampil_buku = mysqli_query($db, $query);
    if (mysqli_num_rows($q_tampil_buku) > 0) {
      while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
        if (empty($r_tampil_buku['foto']) or ($r_tampil_buku['foto'] == '-'))
          $foto = "admin-no-photo.jpg";
        else
          $foto = $r_tampil_buku['foto'];
        ?>

        <div class="max-w-sm rounded">
          <img class="rounded w-full" src="images/<?php echo $foto ?>">
          <div class="py-2 px-1 text-left w-full">
            <h5 class="mb-1 text-sm font-bold tracking-tight text-gray-900">
              <?php echo $r_tampil_buku['judul_buku']; ?> (<?php echo $r_tampil_buku['tahun_terbit'] ?>)
            </h5>
            <p class="mb-1 text-xs font-semibold text-gray-700">
              <?php echo $r_tampil_buku['penulis'] ?>
            </p>
            <p class="mb-1" style="font-size: 11px;">Penerbit :
              <?php echo $r_tampil_buku['penerbit'] ?>
            </p>
            <span class="inline-flex items-center bg-purple-100 text-purple-800 font-medium  px-2.5 py-0.5 rounded-full"
              style="font-size: 10px;">
              <?php echo $r_tampil_buku['kategori'] ?>
            </span>
          </div>
        </div>
        <?php
      }
    }
    ?>
  </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>