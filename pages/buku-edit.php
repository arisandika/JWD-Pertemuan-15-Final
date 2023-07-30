<?php
require './connect.php';

$id_buku = $_GET['id'];
$q_tampil_buku = mysqli_query($db, "SELECT * FROM tbbuku WHERE id_buku = '$id_buku'");
$r_tampil_buku = mysqli_fetch_array($q_tampil_buku);

if (empty($r_tampil_buku['foto']) || $r_tampil_buku['foto'] == '-') {
  $foto = "./images/admin-no-photo.jpg";
} else {
  $foto = "./images/" . $r_tampil_buku['foto'];
}
?>

<div class="relative overflow-x-auto bg-white border sm:rounded-lg p-4 mt-4 pb-4">
  <div class="text-lg font-bold mb-3 border-b pb-3">Edit Data Buku</div>
  <!-- Table -->
  <table class="table-fixed w-full text-sm text-gray-500">
    <tbody>
      <form action="proses/buku-edit-proses.php" method="post" enctype="multipart/form-data">
        <tr>
          <td class="w-16">
            Foto
            <img class="w-12 h-12 mt-3" src="<?php echo $foto; ?>">
          </td>
          <td class="py-2">
            <div class="flex items-center justify-center w-full">
              <input
                class="block w-full text-xs border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                id="small_size" type="file" name="foto">
            </div>
          </td>
        </tr>
        <tr>
          <td class="w-16">
            ID Buku
          </td>
          <td class="py-2">
            <input type="text" name="id_buku" value="<?php echo $r_tampil_buku['id_buku']; ?>" id="small-input"
              placeholder="Max length 5" required
              class="block w-full p-2 text-xs border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
          </td>
        </tr>
        <tr>
          <td class="w-16">
            Judul Buku
          </td>
          <td class="py-2">
            <input type="text" name="judul_buku" value="<?php echo $r_tampil_buku['judul_buku']; ?>" id="small-input"
              placeholder="Judul Buku" required
              class="block w-full p-2 text-xs border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
          </td>
        </tr>
        <tr>
          <td class="w-16">
            Penulis
          </td>
          <td class="py-2">
            <input type="text" name="penulis" value="<?php echo $r_tampil_buku['penulis']; ?>" id="small-input"
              placeholder="Ditulis oleh" required
              class="block w-full p-2 text-xs border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
          </td>
        </tr>
        <tr>
          <td class="w-16">
            Tahun Terbit
          </td>
          <td class="py-2">
            <input type="text" name="tahun_terbit" value="<?php echo $r_tampil_buku['tahun_terbit']; ?>"
              id="small-input" placeholder="Tahun Terbit" required
              class="block w-full p-2 text-xs border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
          </td>
        </tr>
        <tr>
          <td class="w-16">
            Penerbit
          </td>
          <td class="py-2">
            <input type="text" name="penerbit" value="<?php echo $r_tampil_buku['penerbit']; ?>" id="small-input"
              placeholder="Penerbit" required
              class="block w-full p-2 text-xs border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
          </td>
        </tr>
        <tr>
          <td class="w-16">
            Kategori
          </td>
          <td class="py-2">
            <select name="kategori" required
              class="block w-full p-2 text-xs border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
              <option selected disabled>Pilih Kategori</option>
              <option selected value="<?php echo $r_tampil_buku['kategori']; ?>"><?php echo $r_tampil_buku['kategori']; ?></option>
              <option value="Fiksi">Fiksi</option>
              <option value="Non-Fiksi">Non-Fiksi</option>
              <option value="Sastra">Sastra</option>
              <option value="Fantasi dan Fiksi Ilmiah">Fantasi dan Fiksi Ilmiah</option>
              <option value="Misteri dan Thriller">Misteri dan Thriller</option>
              <option value="Sejarah">Sejarah</option>
              <option value="Psikologi">Psikologi</option>
              <option value="Teknologi dan Sains">Teknologi dan Sains</option>
              <option value="Politik dan Sosial">Politik dan Sosial</option>
              <option value="Bisnis dan Keuangan">Bisnis dan Keuangan</option>
              <option value="Filsafat">Filsafat</option>
              <option value="Pendidikan">Pendidikan</option>
              <option value="Agama dan Spiritualitas">Agama dan Spiritualitas</option>
              <option value="Kesehatan dan Kebugaran">Kesehatan dan Kebugaran</option>
              <option value="Kuliner">Kuliner</option>
              <option value="Travel">Travel</option>
              <option value="Seni, Musik dan Fotografi">Seni, Musik dan Fotografi</option>
              <option value="Anak-anak dan Remaja">Anak-anak dan Remaja</option>
              <option value="Komik dan Novel">Komik dan Novel</option>
              <option value="Hobi dan Kerajinan Tangan">Hobi dan Kerajinan Tangan</option>
              <option value="Lingkungan dan Alam">Lingkungan dan Alam</option>
            </select>
          </td>
        </tr>
        <tr>
          <td class="w-16">
          </td>
          <td class="flex justify-end py-4">
            <button type="submit" name="simpan" value="simpan"
              class="px-5 py-2 text-sm font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300">Update</button>
            <a href="index.php?p=buku"
              class="px-5 py-2 ml-2 text-sm font-medium text-center text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</a>
          </td>
        </tr>
      </form>
    </tbody>
  </table>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>