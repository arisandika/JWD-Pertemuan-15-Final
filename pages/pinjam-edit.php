<?php
include './connect.php';

$query_anggota = "SELECT * FROM tbanggota";
$result_anggota = mysqli_query($db, $query_anggota);

$query_buku = "SELECT * FROM tbbuku";
$result_buku = mysqli_query($db, $query_buku);

$id_peminjaman = $_GET['id'];
$q_tampil_pinjam = mysqli_query($db, "SELECT * FROM tbpinjam WHERE id_peminjaman = '$id_peminjaman'");
$r_tampil_pinjam = mysqli_fetch_array($q_tampil_pinjam);

?>

<div class="relative overflow-x-auto bg-white border sm:rounded-lg p-4 mt-4 pb-10">
  <div class="text-lg font-bold mb-3 border-b pb-3">Edit Data Peminjaman</div>
  <!-- Table -->
  <table class="table-fixed w-full text-sm text-gray-500">
    <tbody>
      <form action="proses/pinjam-edit-proses.php" method="post" enctype="multipart/form-data">
        <tr>
          <td class="lg:py-3 px-5 py-2 w-16">
            ID Peminjaman
          </td>
          <td class="lg:py-2 px-5 py-2">
            <input type="text" name="id_peminjaman" value="<?php echo $r_tampil_pinjam['id_peminjaman']; ?>"
              id="small-input" placeholder="ID Peminjaman"
              class="block w-full p-2 text-xs text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
          </td>
        </tr>
        <tr>
          <td class="lg:py-3 px-5 py-2 w-16">
            Nama Peminjam
          </td>
          <td class="lg:py-2 px-5 py-2">
            <select name="nama_peminjam"
              class="block w-full p-2 text-xs border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
              <option selected disabled value="<?php echo $r_tampil_pinjam['nama_peminjam']; ?>"><?php echo $r_tampil_pinjam['nama_peminjam']; ?></option>
              <?php while ($row_anggota = mysqli_fetch_assoc($result_anggota)): ?>
                <option value="<?php echo $row_anggota['nama']; ?>"><?php echo $row_anggota['nama']; ?>
                </option>
              <?php endwhile; ?>
            </select>
          </td>
        </tr>
        <tr>
          <td class="lg:py-3 px-5 py-2 w-16">
            Judul Buku
          </td>
          <td class="lg:py-2 px-5 py-2">
            <select name="buku_pinjam"
              class="block w-full p-2 text-xs border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
              <option selected disabled value="<?php echo $r_tampil_pinjam['buku_pinjam']; ?>"><?php echo $r_tampil_pinjam['buku_pinjam']; ?></option>
              <?php while ($row_buku = mysqli_fetch_assoc($result_buku)): ?>
                <option value="<?php echo $row_buku['judul_buku']; ?>"><?php echo $row_buku['judul_buku']; ?>
                </option>
              <?php endwhile; ?>
            </select>
          </td>
        </tr>
        <tr>
          <td class="lg:py-2 px-5 py-2 w-16">
            Tanggal Peminjaman
          </td>
          <td class="lg:py-2 px-5 py-2">
            <input type="date" name="tgl_pinjam" value="<?php echo $r_tampil_pinjam['tgl_pinjam']; ?>" id="small-input"
              placeholder="Tanggal Peminjaman"
              class="block w-full p-2 text-xs border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
          </td>
        </tr>
        <tr>
          <td class="lg:py-2 px-5 py-2 w-16">
            Tanggal Pengembalian
          </td>
          <td class="lg:py-2 px-5 py-2">
            <input type="date" name="tgl_pengembalian" value="<?php echo $r_tampil_pinjam['tgl_pengembalian']; ?>"
              id="small-input" placeholder="Tanggal Pengembalian"
              class="block w-full p-2 text-xs border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
          </td>
        </tr>
        <tr>
          <td class="lg:py-2 px-5 w-16">
          </td>
          <td class="lg:py-2 mt-8 px-5 flex justify-end">
            <button type="submit" name="simpan" value="simpan"
              class="px-5 py-2 text-sm font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300">Update</button>
            <a href="index.php?p=pinjam"
              class="px-5 py-2 ml-2 text-sm font-medium text-center text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</a>
          </td>
        </tr>
      </form>
    </tbody>
  </table>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>