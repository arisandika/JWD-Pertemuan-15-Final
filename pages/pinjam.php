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
    <div class="text-lg font-bold mb-4 border-b pb-3">Transaksi Peminjaman</div>
    <div class="grid grid-cols-1 md:grid-cols-2 justify-between">
      <div class="mb-4">
        <!-- Modal toggle -->
        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
          class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm py-2 px-5 focus:outline-none"
          type="button">
          Tambah
        </button>

        <!-- Main modal -->
        <div id="authentication-modal" tabindex="-1" aria-hidden="true"
          class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
          <div class="relative w-full max-w-lg max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
              <div class="px-6 pt-5">
                <div class="text-lg font-bold mb-4">Input Data Peminjam</div>
                <table class="table-fixed w-full text-sm text-gray-500">
                  <tbody>
                    <form action="proses/pinjam-input-proses.php" method="post" enctype="multipart/form-data">
                      <tr>
                        <td class="w-16">
                          ID Peminjaman
                        </td>
                        <td class="py-2">
                          <input type="text" name="id_peminjaman" id="small-input" placeholder="ID Peminjaman" required
                            class="block w-full p-2 text-xs border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                        </td>
                      </tr>
                      <tr>
                        <td class="w-16">
                          Nama Peminjam
                        </td>
                        <td class="py-2">
                          <select name="nama_peminjam"
                            class="block w-full p-2 text-xs border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                            <option selected disabled>Nama Peminjam</option>
                            <?php while ($row_anggota = mysqli_fetch_assoc($result_anggota)): ?>
                              <option value="<?php echo $row_anggota['nama']; ?>"><?php echo $row_anggota['nama']; ?>
                              </option>
                            <?php endwhile; ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="w-16">
                          Judul Buku
                        </td>
                        <td class="py-2">
                          <select name="buku_pinjam"
                            class="block w-full p-2 text-xs border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                            <option selected disabled>Pilih Judul Buku</option>
                            <?php while ($row_buku = mysqli_fetch_assoc($result_buku)): ?>
                              <option value="<?php echo $row_buku['judul_buku']; ?>"><?php echo $row_buku['judul_buku']; ?>
                              </option>
                            <?php endwhile; ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="w-16">
                          Tanggal Peminjaman
                        </td>
                        <td class="py-2">
                          <input type="date" name="tgl_pinjam" id="small-input" placeholder="Tanggal Peminjaman"
                            required
                            class="block w-full p-2 text-xs border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                        </td>
                      </tr>
                      <tr>
                        <td class="w-16">
                          Tanggal Pengembalian
                        </td>
                        <td class="py-2">
                          <input type="date" name="tgl_pengembalian" id="small-input" placeholder="Tanggal Pengembalian"
                            required
                            class="block w-full p-2 text-xs border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                        </td>
                      </tr>
                      <tr>
                        <td class="w-16">
                        </td>
                        <td class="flex justify-end py-4">
                          <button type="submit" name="simpan" value="simpan"
                            class="px-5 py-2 text-sm font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300">Simpan</button>
                          <button type="button"
                            class="px-5 py-2 ml-2 text-sm font-medium text-center text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300"
                            data-modal-hide="authentication-modal">Close
                          </button>
                        </td>
                      </tr>
                    </form>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
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
              placeholder="Search for loan">
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
          <th id="label-opsi" class="py-3 px-2">
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
          $sql = "SELECT * FROM tbpinjam WHERE nama_peminjam LIKE '%$pencarian%' OR id_peminjaman LIKE '%$pencarian%' OR buku_pinjam LIKE '%$pencarian%' OR tgl_pinjam LIKE '%$pencarian%' OR tgl_pengembalian LIKE '%$pencarian%'";
          $query = $sql;
          $queryJml = $sql;
        } else {
          $sql = "SELECT * FROM tbpinjam";
          $query = "SELECT * FROM tbpinjam LIMIT $posisi, $batas";
          $queryJml = "SELECT * FROM tbpinjam";
          $no = $posisi * 1;
        }
      } else {
        $sql = "SELECT * FROM tbpinjam";
        $query = "SELECT * FROM tbpinjam LIMIT $posisi, $batas";
        $queryJml = "SELECT * FROM tbpinjam";
        $no = $posisi * 1;
      }

      $q_tampil_pinjam = mysqli_query($db, $query);
      if (mysqli_num_rows($q_tampil_pinjam) > 0) {
        while ($r_tampil_pinjam = mysqli_fetch_array($q_tampil_pinjam)) { ?>
          <tbody>
            <tr class="bg-white border-b">
              <td class="py-2">
                <?php echo $nomor; ?>
              </td>
              <td class="py-2">
                <?php echo $r_tampil_pinjam['id_peminjaman']; ?>
              </td>
              <td class="py-2 text-left">
                <?php echo $r_tampil_pinjam['nama_peminjam']; ?>
              </td>
              <td class="py-2">
                <?php echo $r_tampil_pinjam['buku_pinjam']; ?>
              </td>
              <td class="py-2">
                <?php echo $r_tampil_pinjam['tgl_pinjam']; ?>
              </td>
              <td class="py-2">
                <?php echo $r_tampil_pinjam['tgl_pengembalian']; ?>
              </td>
              <td class="px-2 py-2 justify-center text-xs items-center">
                <div class="flex justify-center items-center">
                  <a href="index.php?p=pinjam-edit&id=<?php echo $r_tampil_pinjam['id_peminjaman']; ?>"
                    class="text-green-600 hover:text-white hover:bg-green-800 border px-2 py-1 border-green-600 rounded">EDIT</a>
                  <a href="proses/pinjam-hapus.php?id=<?php echo $r_tampil_pinjam['id_peminjaman']; ?>"
                    class="mx-2 text-red-600 hover:text-white hover:bg-red-800 border px-2 py-1 border-red-600 rounded"
                    onclick="return confirm('Are you sure want to delete this data?')">HAPUS</a>
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

          echo "<a href=\"?p=pinjam\" class=\"py-1 px-4 text-sm text-gray-500 text-xs border border-gray-500 bg-white rounded hover:bg-gray-100\">";
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
            echo "<a href=\"?p=pinjam&hal=$i\" class=\"flex items-center text-gray-500 py-1 px-2 text-xs bg-white border border-gray-500 hover:bg-gray-100\">";
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