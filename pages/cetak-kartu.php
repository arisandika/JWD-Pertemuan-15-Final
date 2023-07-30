<?php
include '../connect.php';

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

$id_anggota = $_GET['id'];
$q_tampil_anggota = mysqli_query($db, "SELECT * FROM tbanggota WHERE id_anggota = '$id_anggota'");
$r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota);

if (empty($r_tampil_anggota['foto']) || $r_tampil_anggota['foto'] == '-') {
  $foto = "../images/admin-no-photo.jpg";
} else {
  $foto = "../images/" . $r_tampil_anggota['foto'];
}
?>

<section class="flex justify-center items-center bg-gray-200 h-screen p-4">
  <div style="width: 380px;">
    <div class="bg-white border border-gray-500 pt-4 pb-10 rounded-lg px-6">
      <div class="flex items-center justify-between border-b border-gray-500 pb-4">
        <img src="https://seeklogo.com/images/U/universitas-pamulang-logo-E63E1DF629-seeklogo.com.png" class="w-9 h-9">
        <div class="text-right">
          <div class="text-sm font-bold">Kartu Anggota Perpustakaan</div>
          <div class="text-xs font-semibold">Universitas Pamulang</div>
        </div>
      </div>
      <div class="flex mt-4">
        <img class="w-14 h-14" src="<?php echo $foto; ?>">
        <div class="flex-col items-center px-5 text-xs">
          <div class="grid grid-cols-3 gap-2 mb-1">
            <div class="items-center">
              Nama
            </div>
            <div class="items-center">
              <?php echo $r_tampil_anggota['nama']; ?>
            </div>
          </div>
          <div class="grid grid-cols-3 gap-2 mb-1">
            <div class="items-center">
              ID<br>Anggota
            </div>
            <div class="items-center">
              <?php echo $r_tampil_anggota['id_anggota']; ?>
            </div>
          </div>
          <div class="grid grid-cols-3 gap-2 mb-1">
            <div class="items-center">
              Jenis<br>Kelamin
            </div>
            <div class="items-center">
              <?php echo $r_tampil_anggota['jenis_kelamin']; ?>
            </div>
          </div>
          <div class="grid grid-cols-3 gap-2 mb-1">
            <div class="items-center">
              Alamat
            </div>
            <div class="items-center">
              <?php echo $r_tampil_anggota['alamat']; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>