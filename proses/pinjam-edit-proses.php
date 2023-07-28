<?php
include '../connect.php';

if (isset($_POST['simpan'])) {
  // Retrieve the form data and sanitize if needed
  $id_peminjaman = $_POST['id_peminjaman'];
  $nama_peminjam = $_POST['nama_peminjam'];
  $buku_pinjam = $_POST['buku_pinjam'];
  $tgl_pinjam = $_POST['tgl_pinjam'];
  $tgl_pengembalian = $_POST['tgl_pengembalian'];

  // Update the tbpinjam table with the new values
  $sql = "UPDATE tbpinjam SET nama_peminjam='$nama_peminjam', buku_pinjam='$buku_pinjam', tgl_pinjam='$tgl_pinjam', tgl_pengembalian='$tgl_pengembalian' WHERE id_peminjaman='$id_peminjaman'";

  $query = mysqli_query($db, $sql);

  if ($query) {
    // Success: Redirect back to the index.php?p=pinjam
    header("Location: ../index.php?p=pinjam");
    exit();
  } else {
    // Error handling: Display an error message or redirect to an error page
    $error_message = "Error updating data: " . mysqli_error($db);
    // Display the error message to the user or log it for debugging
    // You can also redirect to an error page
    // header("Location: ../error.php?msg=" . urlencode($error_message));
    echo $error_message;
    exit();
  }
}
?>
