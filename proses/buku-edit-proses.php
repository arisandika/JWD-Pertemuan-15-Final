<?php
include '../connect.php';

$id_buku = $_POST['id_buku'];
$judul_buku = $_POST['judul_buku'];
$penulis = $_POST['penulis'];
$tahun_terbit = $_POST['tahun_terbit'];
$penerbit = $_POST['penerbit'];
$kategori = $_POST['kategori'];

if (isset($_POST['simpan'])) {
  $nama_file = $_FILES['foto']['name'];
  $file_foto = $id_buku . "." . pathinfo($nama_file, PATHINFO_EXTENSION);
  $folder = "../images/" . $file_foto;
  
  if (!empty($nama_file)) {
    $lokasi_file = $_FILES['foto']['tmp_name'];
    $image = imagecreatefromstring(file_get_contents($lokasi_file));

    if ($image !== false) {
      $target_width = 650;
      $target_height = 960;
      $original_width = imagesx($image);
      $original_height = imagesy($image);

      $new_image = imagecreatetruecolor($target_width, $target_height);
      imagecopyresampled($new_image, $image, 0, 0, 0, 0, $target_width, $target_height, $original_width, $original_height);

      imagejpeg($new_image, $folder);
      imagedestroy($new_image);
      imagedestroy($image);
    } else {
      header("Location: ../buku-edit.php?id=$id_buku&error=image");
      exit();
    }
  } else {
    $q_tampil_buku = mysqli_query($db, "SELECT foto FROM tbbuku WHERE id_buku = '$id_buku'");
    $r_tampil_buku = mysqli_fetch_array($q_tampil_buku);
    $file_foto = $r_tampil_buku['foto'];
  }

  $sql = "UPDATE tbbuku SET judul_buku='$judul_buku', penulis='$penulis', tahun_terbit='$tahun_terbit', penerbit='$penerbit', kategori='$kategori', foto='$file_foto' WHERE id_buku='$id_buku'";

  $query = mysqli_query($db, $sql);
  header("Location: ../index.php?p=buku");
}
?>
