<?php
include '../connect.php';

function deletePinjam($id_peminjaman)
{
  global $db;

  $sql = "DELETE FROM tbpinjam WHERE id_peminjaman = '$id_peminjaman'";
  $query = mysqli_query($db, $sql);

  return $query;
}

if (isset($_GET['id'])) {
  $id_peminjaman = $_GET['id'];

  if (isset($_GET['confirm'])) {
    $result = deletePinjam($id_peminjaman);
    if ($result) {
      header("Location: ../index.php?p=pinjam&delete_success=true");
      exit();
    } else {
      header("Location: ../index.php?p=pinjam&delete_error=true");
      exit();
    }
  } else {
    echo '<script>
            if (confirm("Are you sure you want to delete this data?")) {
                window.location.href = "pinjam-hapus.php?id=' . $id_peminjaman . '&confirm=true";
            } else {
                window.location.href = "../index.php?p=pinjam";
            }
        </script>';
    exit();
  }
} else {
  header("Location: ../index.php?p=pinjam");
  exit();
}
?>