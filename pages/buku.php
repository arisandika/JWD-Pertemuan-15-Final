<?php

require './connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="relative overflow-x-auto bg-white border rounded-lg p-4 mt-4">
    <div class="text-lg font-bold mb-4 border-b pb-3">Data Buku</div>
    <div class="grid grid-cols-1 md:grid-cols-2 justify-between">
      <div class="mb-3">
      <button type="button"
        class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm py-2 px-5 mr-8 mb-2 focus:outline-none"><a
          href="index.php?p=buku-input">Tambah</a></button>
      </div>
      <label for="table-search" class="sr-only">Search</label>
      <div class="relative ml-1 mb-3">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500 mb-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
          </svg>
        </div>
        <div>
          <form method="post" class="flex gap-2">
            <input type="text" name="pencarian"
              class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full h-9 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
              placeholder="Search for books">
            <button type="submit" name="search" value="search"
              class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm py-2 px-5 mb-2 focus:outline-none">Cari
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- Table -->
    <table class="table-fixed w-full text-sm text-center text-gray-500 bg-gray-100">
      <thead class="text-xs text-gray-700 uppercase">
        <tr>
          <th class="lg:px-3 px-2 lg:py-4 py-2">
            NO
          </th>
          <th class="lg:px-3 px-2 lg:py-4 py-2">
            ID Buku
          </th>
          <th class="lg:px-3 px-2 lg:py-4 py-2">
            Judul Buku
          </th>
          <th class="lg:px-3 px-2 lg:py-4 py-2">
            Penulis
          </th>
          <th class="lg:px-3 px-2 lg:py-4 py-2">
            Foto
          </th>
          <th class="lg:px-3 px-2 lg:py-4 py-2">
            Tahun
          </th>
          <th class="lg:px-3 px-2 lg:py-4 py-2">
            Penerbit
          </th>
          <th class="lg:px-3 px-2 lg:py-4 py-2">
            Kategori
          </th>
          <th id="label-opsi" class="lg:py-4 py-2">
            Action
          </th>
        </tr>
      </thead>
      <?php
      $batas = 4;
      extract($_GET);

      if (empty($hal)) {
        $posisi = 0;
        $hal = 1;
        $nomor = 1;
      } else {
        $posisi = ($hal - 1) * $batas;
        $nomor = $posisi + 1;
      }

      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
        $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
        if (!empty($pencarian)) {
          $sql = "SELECT * FROM tbbuku WHERE judul_buku LIKE '%$pencarian%' OR id_buku LIKE '%$pencarian%' OR kategori LIKE '%$pencarian%' OR tahun_terbit LIKE '%$pencarian%' OR penulis LIKE '%$pencarian%'";
          $query = $sql;
          $queryJml = $sql;
        } else {
          $sql = "SELECT * FROM tbbuku";
          $query = "SELECT * FROM tbbuku LIMIT $posisi, $batas";
          $queryJml = "SELECT * FROM tbbuku";
          $no = $posisi * 1;
        }
      } else {
        $sql = "SELECT * FROM tbbuku";
        $query = "SELECT * FROM tbbuku LIMIT $posisi, $batas";
        $queryJml = "SELECT * FROM tbbuku";
        $no = $posisi * 1;
      }

      $q_tampil_buku = mysqli_query($db, $query);
      if (mysqli_num_rows($q_tampil_buku) > 0) {
        while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
          if (empty($r_tampil_buku['foto']) or ($r_tampil_buku['foto'] == '-'))
            $foto = "admin-no-photo.jpg";
          else
            $foto = $r_tampil_buku['foto'];
          ?>
          <tbody>
            <tr class="bg-white border-b">
              <td class="lg:px-3 px-2 lg:py-3 py-2">
                <?php echo $nomor; ?>
              </td>
              <td class="lg:px-3 px-2 lg:py-3 py-2">
                <?php echo $r_tampil_buku['id_buku']; ?>
              </td>
              <td class="lg:px-3 px-2 lg:py-3 py-2 text-left">
                <?php echo $r_tampil_buku['judul_buku']; ?>
              </td>
              <td class="lg:px-3 px-2 lg:py-3 py-2 text-left">
                <?php echo $r_tampil_buku['penulis']; ?>
              </td>
              <td class="lg:py-3 py-2 flex justify-center text-xs items-center">
                <img class="rounded" src="images/<?php echo $foto ?>" width="40px" height="40px">
              </td>
              <td class="lg:px-3 px-2 lg:py-3 py-2">
                <?php echo $r_tampil_buku['tahun_terbit']; ?>
              </td>
              <td class="lg:px-3 px-2 lg:py-3 py-2 text-left">
                <?php echo $r_tampil_buku['penerbit']; ?>
              </td>
              <td class="lg:px-3 px-2 lg:py-3 py-2">
                <?php echo $r_tampil_buku['kategori']; ?>
              </td>
              <td class="px-2 py-2 justify-center text-xs items-center">
                <div class="flex justify-center items-center">
                  <a href="index.php?p=buku-edit&id=<?php echo $r_tampil_buku['id_buku']; ?>"
                    class="text-green-600 hover:text-white hover:bg-green-800 border px-2 py-1 border-green-600 rounded">EDIT</a>
                  <a href="proses/buku-hapus.php?id=<?php echo $r_tampil_buku['id_buku']; ?>"
                    class="mx-2 text-red-600 hover:text-white hover:bg-red-800 border px-2 py-1 border-red-600 rounded"
                    onclick="return_confirmation('Are you sure want to delete this data?')">HAPUS</a>
                </div>
              </td>

            </tr>
          </tbody>

          <?php
          $nomor++;
        }
      }
      ?>
    </table>

    <div class="pagination">
      <?php
      if (isset($_POST['pencarian'])) {
        if ($_POST['pencarian'] != '') {
          $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
          echo "<div class=\"flex items-center justify-between px-2 mt-4\">";

          echo "<div class=\"text-sm\">Data Hasil Pencarian : $jml";
          echo "</div>";

          echo "<div class=\"flex\">";

          echo "<a href=\"?p=buku\" class=\"py-1 px-4 text-sm text-gray-500 text-xs border border-gray-500 bg-white rounded hover:bg-gray-100\">";
          echo "Back";
          echo "</a>";
          echo "</div>";
          echo "</div>";
        }
      } else {
        $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
        $jml_hal = ceil($jml / $batas);
        echo "<div class=\"flex items-center justify-between px-2 mt-4\">";

        echo "<div class=\"text-sm\">Jumlah Data : $jml";
        echo "</div>";

        echo "<div class=\"inline-flex\">";
        echo "<div class=\"py-1 px-2 text-sm text-gray-500 text-xs border border-gray-500 rounded-l bg-white\">
              Prev
            </div>";
        for ($i = 1; $i <= $jml_hal; $i++) {
          if ($i != $hal) {
            echo "<a href=\"?p=buku&hal=$i\" class=\"flex items-center text-gray-500 py-1 px-2 text-xs bg-white border border-gray-500 hover:bg-gray-100\">";
            echo "$i";
            echo "</a>";
          }
        }
        echo "<div class=\"py-1 px-2 text-sm text-gray-500 text-xs border border-gray-500 rounded-r bg-white\">
              Next
              </div>";
        echo "</div>";
        echo "</div>";
      }
      ?>

    </div>
  </div>




  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
</body>

</html>