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
    <div class="text-lg font-bold mb-4 border-b pb-3">Data Anggota</div>
    <div class="grid grid-cols-1 md:grid-cols-2 justify-between">
      <div class="flex gap-2 mb-3">
        <button type="button" data-tooltip-target="tooltip-print" data-tooltip-placement="left"
          class="flex items-center text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm py-2 px-4 mb-2 focus:outline-none">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path d="M5 20h10a1 1 0 0 0 1-1v-5H4v5a1 1 0 0 0 1 1Z" />
            <path
              d="M18 7H2a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2v-3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-1-2V2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v3h14Z" />
          </svg>
          <span class="ml-2">Print</span>
        </button>

        <!-- Modal toggle -->
        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
          class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm py-2 px-5 mb-2 focus:outline-none"
          type="button">
          Tambah
        </button>

        <!-- Main modal -->
        <div id="authentication-modal" tabindex="-1" aria-hidden="true"
          class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
          <div class="relative w-full max-w-lg max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
              <div class="px-6 py-5">
                <div class="text-lg font-bold mb-4">Input Data Anggota</div>
                <table class="table-fixed w-full text-sm text-gray-500">
                  <tbody>
                    <form action="proses/anggota-input-proses.php" method="post" enctype="multipart/form-data">
                      <tr>
                        <td class="py-2 w-16">
                          Foto
                        </td>
                        <td class="py-2">
                          <div class="flex items-center justify-center w-full">
                            <input
                              class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                              id="small_size" type="file" name="foto">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="py-3 w-16">
                          ID Anggota
                        </td>
                        <td class="py-3">
                          <input type="text" name="id_anggota" id="small-input" placeholder="ID Anggota"
                            class="block w-full p-2 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                        </td>
                      </tr>
                      <tr>
                        <td class="py-2 w-16">
                          Nama
                        </td>
                        <td class="py-2">
                          <input type="text" name="nama" id="small-input" placeholder="Nama"
                            class="block w-full p-2 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
                        </td>
                      </tr>
                      <tr>
                        <td class="lg:py-4 py-2 w-16">
                          Jenis Kelamin
                        </td>
                        <td class="lg:py-4 py-3 flex gap-4 px-3">
                          <div class="flex items-center">
                            <input id="default-radio-1" type="radio" value="Pria" name="jenis_kelamin" checked
                              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-0">
                            <label for="default-radio-1"
                              class="ml-2 text-xs font-medium text-gray-600">Pria</label>
                          </div>
                          <div class="flex items-center">
                            <input id="default-radio-2" type="radio" value="Wanita" name="jenis_kelamin"
                              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-0">
                            <label for="default-radio-2"
                              class="ml-2 text-xs font-medium text-gray-600">Wanita</label>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="w-16">
                          Alamat
                        </td>
                        <td class="py-2">
                          <textarea id="message" rows="4" name="alamat"
                            class="block p-2.5 text-xs  w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Input alamat here..."></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td class="w-16">
                        </td>
                        <td class="mt-8 flex justify-end">
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
      <label for=" table-search" class="sr-only">Search</label>
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
              placeholder="Search for users">
            <button type="submit" name="search" value="search"
              class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm py-2 px-5 mb-2">Cari
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
            ID
          </th>
          <th class="lg:px-3 px-2 lg:py-4 py-2">
            Nama
          </th>
          <th class="lg:px-3 px-2 lg:py-4 py-2">
            Foto
          </th>
          <th class="lg:px-3 px-2 lg:py-4 py-2">
            Jenis Kelamin
          </th>
          <th class="lg:px-3 px-2 lg:py-4 py-2">
            Alamat
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

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
        if ($pencarian != "") {
          $sql = "SELECT * FROM tbanggota WHERE nama LIKE '$pencarian' OR id_anggota LIKE '$pencarian' OR jenis_kelamin LIKE '$pencarian' OR alamat LIKE '$pencarian'";
          $query = $sql;
          $queryJml = $sql;
        } else {
          $query = "SELECT * FROM tbanggota LIMIT $posisi, $batas";
          $queryJml = "SELECT * FROM tbanggota";
          $no = $posisi * 1;
        }
      } else {
        $query = "SELECT * FROM tbanggota LIMIT $posisi, $batas";
        $queryJml = "SELECT * FROM tbanggota";
        $no = $posisi * 1;
      }

      $q_tampil_anggota = mysqli_query($db, $query);
      if (mysqli_num_rows($q_tampil_anggota) > 0) {
        while ($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)) {
          if (empty($r_tampil_anggota['foto']) or ($r_tampil_anggota['foto'] == '-'))
            $foto = "admin-no-photo.jpg";
          else
            $foto = $r_tampil_anggota['foto'];
          ?>
          <tbody>
            <tr class="bg-white border-b">
              <td class="lg:px-3 px-2 py-2">
                <?php echo $nomor; ?>
              </td>
              <td class="lg:px-3 px-2 py-2">
                <?php echo $r_tampil_anggota['id_anggota']; ?>
              </td>
              <td class="lg:px-3 px-2 py-2 text-left">
                <?php echo $r_tampil_anggota['nama']; ?>
              </td>
              <td class="py-2 flex justify-center text-xs items-center">
                <img class="rounded-full" src="images/<?php echo $foto ?>" width="40px" height="40px">
              </td>
              <td class="lg:px-3 px-2 py-2">
                <?php echo $r_tampil_anggota['jenis_kelamin']; ?>
              </td>
              <td class="lg:px-3 px-2 py-2 text-left">
                <?php echo $r_tampil_anggota['alamat']; ?>
              </td>
              <td class="px-2 py-2 justify-center text-xs items-center">
                <div class="flex justify-center items-center">
                  <a href="index.php?p=anggota-edit&id=<?php echo $r_tampil_anggota['id_anggota']; ?>"
                    class="text-green-600 hover:text-white hover:bg-green-800 border px-2 py-1 border-green-600 rounded">EDIT</a>
                  <a href="proses/anggota-hapus.php?id=<?php echo $r_tampil_anggota['id_anggota']; ?>"
                    class="mx-2 text-red-600 hover:text-white hover:bg-red-800 border px-2 py-1 border-red-600 rounded"
                    onclick="return_confirmation('Are you sure want to delete this data?')">HAPUS</a>
                  <a href="pages/cetak-kartu.php?id=<?php echo $r_tampil_anggota['id_anggota']; ?>" target="_blank"
                    class="text-blue-600 hover:text-white hover:bg-blue-800 border px-2 py-1 border-blue-600 rounded">PRINT</a>
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

          echo "<a href=\"?p=anggota\" class=\"py-1 px-4 text-sm text-gray-500 text-xs border border-gray-500 bg-white rounded hover:bg-gray-100\">";
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
            echo "<a href=\"?p=anggota&hal=$i\" class=\"flex items-center text-gray-500 py-1 px-2 text-xs bg-white border border-gray-500 hover:bg-gray-100\">";
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