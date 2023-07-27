<?php
include '../connect.php';

$id_anggota = $_POST['id_anggota'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$status = "Tidak Meminjam";

if (isset($_POST['simpan'])) {
  extract($_POST);
  $nama_file = $_FILES['foto']['name'];

  if (!empty($nama_file)) {
    $lokasi_file = $_FILES['foto']['tmp_name'];
    $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
    $file_foto = $id_anggota . "." . $tipe_file;

    $folder = "../images/$file_foto";
    move_uploaded_file($lokasi_file, $folder);

    $image = imagecreatefromstring(file_get_contents($folder));
    $width = imagesx($image);
    $height = imagesy($image);
    $target_size = 300;
    $crop_size = min($width, $height);

    $crop_x = ($width - $crop_size) / 2;
    $crop_y = ($height - $crop_size) / 2;

    $new_image = imagecrop($image, ['x' => $crop_x, 'y' => $crop_y, 'width' => $crop_size, 'height' => $crop_size]);
    if ($new_image !== false) {
      $resized_image = imagescale($new_image, $target_size, $target_size);

      imagejpeg($resized_image, $folder);

      imagedestroy($resized_image);
      imagedestroy($new_image);
    }
    imagedestroy($image);
  } else {
    $q_tampil_anggota = mysqli_query($db, "SELECT foto FROM tbanggota WHERE id_anggota = '$id_anggota'");
    $r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota);
    $file_foto = $r_tampil_anggota['foto'];
  }

  $sql = "UPDATE tbanggota SET id_anggota='$id_anggota', nama='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat', foto='$file_foto' WHERE id_anggota='$id_anggota'";

  $query = mysqli_query($db, $sql);
  header("Location: ../index.php?p=anggota");
}
?>
