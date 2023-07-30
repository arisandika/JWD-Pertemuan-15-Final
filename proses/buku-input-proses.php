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
      header("Location: ../buku-input.php?error=image");
      exit();
    }
  } else {
    $file_foto = "-";
  }

  $sql = "INSERT INTO tbbuku (id_buku, judul_buku, penulis, tahun_terbit, penerbit, kategori, foto) 
  VALUES ('$id_buku', '$judul_buku', '$penulis', '$tahun_terbit', '$penerbit', '$kategori', '$file_foto')";
  $query = mysqli_query($db, $sql);
  header("Location: ../index.php?p=buku");
}
?>