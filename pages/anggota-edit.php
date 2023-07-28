<?php
include './connect.php';

$id_anggota = $_GET['id'];
$q_tampil_anggota = mysqli_query($db, "SELECT * FROM tbanggota WHERE id_anggota = '$id_anggota'");
$r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota);

if (empty($r_tampil_anggota['foto']) || $r_tampil_anggota['foto'] == '-') {
  $foto = "./images/admin-no-photo.jpg";
} else {
  $foto = "./images/" . $r_tampil_anggota['foto'];
}
?>

<div class="relative overflow-x-auto bg-white border sm:rounded-lg p-4 mt-4 pb-4">
  <div class="text-lg font-bold mb-3 border-b pb-3">Edit Data Anggota</div>
  <!-- Table -->
  <table class="table-fixed w-full text-sm text-gray-500">
    <tbody>
      <form action="proses/anggota-edit-proses.php" method="post" enctype="multipart/form-data">
        <tr>
          <td class="w-16">
            Foto
            <img class="w-12 h-12 mt-3" src="<?php echo $foto; ?>">
          </td>
          <td class="py-2">
            <div class="flex items-center justify-center w-full">
              <input
                class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                id="small_size" type="file" name="foto"d>
            </div>
          </td>
        </tr>
        <tr>
          <td class="w-16">
            ID Anggota
          </td>
          <td class="py-2">
            <input type="text" name="id_anggota" value="<?php echo $r_tampil_anggota['id_anggota']; ?>" id="small-input"
              placeholder="ID Anggota" required
              class="block w-full p-2 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
          </td>
        </tr>
        <tr>
          <td class="w-16">
            Nama
          </td>
          <td class="py-2">
            <input type="text" name="nama" value="<?php echo $r_tampil_anggota['nama']; ?>" id="small-input"
              placeholder="Nama" required
              class="block w-full p-2 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
          </td>
        </tr>
        <tr>
          <td class="w-16">
            Jenis Kelamin
          </td>
          <td class="flex gap-4 p-2">
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
            <textarea id="message" rows="4" name="alamat" required
              class="block p-2.5 text-xs  w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
              placeholder="Input alamat here..."><?php echo $r_tampil_anggota['alamat']; ?></textarea>
          </td>
        </tr>
        <tr>
          <td class="w-16">
          </td>
          <td class="flex justify-end py-4">
            <button type="submit" name="simpan" value="simpan"
              class="px-5 py-2 text-sm font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300">Update</button>
            <a href="index.php?p=anggota"
              class="px-5 py-2 ml-2 text-sm font-medium text-center text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</a>
          </td>
        </tr>
      </form>
    </tbody>
  </table>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>