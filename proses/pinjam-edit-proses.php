<?php
include '../connect.php';

if (isset($_POST['simpan'])) {
  $id_peminjaman = $_POST['id_peminjaman'];
  $nama_peminjam = $_POST['nama_peminjam'];
  $buku_pinjam = $_POST['buku_pinjam'];
  $tgl_pinjam = $_POST['tgl_pinjam'];
  $tgl_pengembalian = $_POST['tgl_pengembalian'];

  $sql = "UPDATE tbpinjam SET nama_peminjam='$nama_peminjam', buku_pinjam='$buku_pinjam', tgl_pinjam='$tgl_pinjam', tgl_pengembalian='$tgl_pengembalian' WHERE id_peminjaman='$id_peminjaman'";

  $query = mysqli_query($db, $sql);

  if ($query) {
    header("Location: ../index.php?p=pinjam");
    exit();
  } else {
    $error_message = "Error updating data: " . mysqli_error($db);
    echo $error_message;
    exit();
  }
}
?>
