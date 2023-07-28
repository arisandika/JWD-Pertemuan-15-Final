<?php
require './connect.php';

$query_anggota = "SELECT * FROM tbanggota";
$result_anggota = mysqli_query($db, $query_anggota);

$query_buku = "SELECT * FROM tbbuku";
$result_buku = mysqli_query($db, $query_buku);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="relative overflow-x-auto bg-white border rounded-lg p-4 mt-4">
    <div class="text-lg font-bold mb-4 border-b pb-3">Laporan Transaksi</div>
    <div class="grid grid-cols-1 md:grid-cols-2 justify-between">
      <div class="flex gap-2 mb-4">
        <button type="button" data-tooltip-target="tooltip-print" data-tooltip-placement="left"
          class="flex items-center text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm py-2 px-4 focus:outline-none">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path d="M5 20h10a1 1 0 0 0 1-1v-5H4v5a1 1 0 0 0 1 1Z" />
            <path
              d="M18 7H2a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2v-3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-1-2V2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3h14Z" />
          </svg>
          <span class="ml-2">Print</span>
        </button>
      </div>
      <div class="relative mb-4">
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
              placeholder="Search for transaction">
          </form>
        </div>
      </div>
    </div>

    <!-- Table -->
    <table class="table-fixed w-full text-sm text-center text-gray-500 bg-gray-100">
      <thead class="text-xs text-gray-700 uppercase">
        <tr>
          <th class="py-3 px-2">
            NO
          </th>
          <th class="py-3 px-2">
            ID Peminjaman
          </th>
          <th class="py-3 px-2">
            Nama Peminjam
          </th>
          <th class="py-3 px-2">
            Judul Buku
          </th>
          <th class="py-3 px-2">
            Tanggal Peminjaman
          </th>
          <th class="py-3 px-2">
            Tanggal Pengembalian
          </th>
        </tr>
      </thead>
      <?php
      $batas = 10;
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
          $sql = "SELECT * FROM tbpinjam_history WHERE nama_peminjam LIKE '%$pencarian%' OR id_peminjaman LIKE '%$pencarian%' OR buku_pinjam LIKE '%$pencarian%' OR tgl_pinjam LIKE '%$pencarian%' OR tgl_pengembalian LIKE '%$pencarian%'";
          $query = $sql;
          $queryJml = $sql;
        } else {
          $sql = "SELECT * FROM tbpinjam_history";
          $query = "SELECT * FROM tbpinjam_history LIMIT $posisi, $batas";
          $queryJml = "SELECT * FROM tbpinjam_history";
          $no = $posisi * 1;
        }
      } else {
        $sql = "SELECT * FROM tbpinjam_history";
        $query = "SELECT * FROM tbpinjam_history LIMIT $posisi, $batas";
        $queryJml = "SELECT * FROM tbpinjam_history";
        $no = $posisi * 1;
      }

      $q_tampil_pinjam_history = mysqli_query($db, $query);
      if (mysqli_num_rows($q_tampil_pinjam_history) > 0) {
        while ($r_tampil_pinjam_history = mysqli_fetch_array($q_tampil_pinjam_history)) { ?>
          <tbody>
            <tr class="bg-white border-b">
              <td class="py-2">
                <?php echo $nomor; ?>
              </td>
              <td class="py-2">
                <?php echo $r_tampil_pinjam_history['id_peminjaman']; ?>
              </td>
              <td class="py-2 text-left">
                <?php echo $r_tampil_pinjam_history['nama_peminjam']; ?>
              </td>
              <td class="py-2">
                <?php echo $r_tampil_pinjam_history['buku_pinjam']; ?>
              </td>
              <td class="py-2">
                <?php echo $r_tampil_pinjam_history['tgl_pinjam']; ?>
              </td>
              <td class="py-2">
                <?php echo $r_tampil_pinjam_history['deleted_at']; ?>
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

          echo "<a href=\"?p=laporan\" class=\"py-1 px-4 text-sm text-gray-500 text-xs border border-gray-500 bg-white rounded hover:bg-gray-100\">";
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
            echo "<a href=\"?p=laporan&hal=$i\" class=\"flex items-center text-gray-500 py-1 px-2 text-xs bg-white border border-gray-500 hover:bg-gray-100\">";
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