<?php
require '../connect.php';

if (isset($_GET['id'])) {
  $id_peminjaman = $_GET['id'];

  // Get the data to be moved from tbpinjam
  $data_query = "SELECT * FROM tbpinjam WHERE id_peminjaman = '$id_peminjaman'";
  $data_result = mysqli_query($db, $data_query);
  $data = mysqli_fetch_assoc($data_result);

  // Get the current date as the deleted_at date
  $deleted_at = date('Y-m-d');

  // Move the data to tbpinjam_history and set the deleted_at date
  $move_to_history_query = "INSERT INTO tbpinjam_history (id_peminjaman, buku_pinjam, nama_peminjam, tgl_pinjam, tgl_pengembalian, deleted_at) SELECT id_peminjaman, buku_pinjam, nama_peminjam, tgl_pinjam, tgl_pengembalian, '$deleted_at' FROM tbpinjam WHERE id_peminjaman = '$id_peminjaman'";
  $move_to_history_result = mysqli_query($db, $move_to_history_query);

  if ($move_to_history_result) {
    // Delete data from tbpinjam
    $delete_query = "DELETE FROM tbpinjam WHERE id_peminjaman = '$id_peminjaman'";
    $delete_result = mysqli_query($db, $delete_query);

    if ($delete_result) {
      // Data successfully deleted, redirect to index.php?p=pinjam
      header("Location: ../index.php?p=pinjam");
      exit();
    } else {
      // Error handling: Display an error message or redirect to an error page
      $error_message = "Error deleting data: " . mysqli_error($db);
      // Display the error message to the user or log it for debugging
      // You can also redirect to an error page
      // header("Location: ../error.php?msg=" . urlencode($error_message));
      echo $error_message;
      exit();
    }
  } else {
    // Error handling: Display an error message or redirect to an error page
    $error_message = "Error moving data to history: " . mysqli_error($db);
    // Display the error message to the user or log it for debugging
    // You can also redirect to an error page
    // header("Location: ../error.php?msg=" . urlencode($error_message));
    echo $error_message;
    exit();
  }
}

?>