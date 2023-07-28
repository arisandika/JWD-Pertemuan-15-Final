<?php
include '../connect.php';

function deleteBuku($id_buku)
{
  global $db;

  $sql = "DELETE FROM tbbuku WHERE id_buku = '$id_buku'";
  $query = mysqli_query($db, $sql);

  return $query;
}

if (isset($_GET['id'])) {
  $id_buku = $_GET['id'];

  if (isset($_GET['confirm'])) {
    $result = deleteBuku($id_buku);
    if ($result) {
      header("Location: ../index.php?p=buku&delete_success=true");
      exit();
    } else {
      header("Location: ../index.php?p=buku&delete_error=true");
      exit();
    }
  } else {
    echo '<script>
            if (confirm("Are you sure you want to delete this data?")) {
                window.location.href = "buku-hapus.php?id=' . $id_buku . '&confirm=true";
            } else {
                window.location.href = "../index.php?p=buku";
            }
        </script>';
    exit();
  }
} else {
  header("Location: ../index.php?p=buku");
  exit();
}
?>