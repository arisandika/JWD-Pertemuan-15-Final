<?php
include '../connect.php';

$id_peminjaman = $_POST['id_peminjaman'];
$nama_peminjam = $_POST['nama_peminjam'];
$buku_pinjam = $_POST['buku_pinjam'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_pengembalian = $_POST['tgl_pengembalian'];

if (isset($_POST['simpan'])) {
  $sql = "INSERT INTO tbpinjam (id_peminjaman, nama_peminjam, buku_pinjam, tgl_pinjam, tgl_pengembalian) VALUES ('$id_peminjaman', '$nama_peminjam', '$buku_pinjam', '$tgl_pinjam', '$tgl_pengembalian')";
  $query = mysqli_query($db, $sql);
  header("Location: ../index.php?p=pinjam");
}

?>