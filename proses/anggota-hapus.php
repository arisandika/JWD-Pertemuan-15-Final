<?php
include '../connect.php';

function deleteAnggota($id_anggota)
{
  global $db;

  $sql = "DELETE FROM tbanggota WHERE id_anggota = '$id_anggota'";
  $query = mysqli_query($db, $sql);

  return $query;
}

if (isset($_GET['id'])) {
  $id_anggota = $_GET['id'];

  if (isset($_GET['confirm'])) {
    $result = deleteAnggota($id_anggota);
    if ($result) {
      header("Location: ../index.php?p=anggota&delete_success=true");
      exit();
    } else {
      header("Location: ../index.php?p=anggota&delete_error=true");
      exit();
    }
  } else {
    echo '<script>
            if (confirm("Are you sure you want to delete this data?")) {
                window.location.href = "anggota-hapus.php?id=' . $id_anggota . '&confirm=true";
            } else {
                window.location.href = "../index.php?p=anggota";
            }
        </script>';
    exit();
  }
} else {
  header("Location: ../index.php?p=anggota");
  exit();
}
?>