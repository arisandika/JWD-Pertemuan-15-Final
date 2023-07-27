<?php
include "../connect.php";

function deleteBuku($id_buku)
{
  global $db;

  // Perform the delete operation in the database
  $sql = "DELETE FROM tbbuku WHERE id_buku = '$id_buku'";
  $query = mysqli_query($db, $sql);

  return $query;
}

if (isset($_GET['id'])) {
  $id_buku = $_GET['id'];

  if (isset($_GET['confirm'])) {
    // User confirmed the deletion, proceed with deletion
    $result = deleteBuku($id_buku);
    if ($result) {
      // Deletion successful
      header("Location: ../index.php?p=buku&delete_success=true");
      exit();
    } else {
      // Error occurred during deletion
      header("Location: ../index.php?p=buku&delete_error=true");
      exit();
    }
  } else {
    // Display the confirmation dialog
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
  // Redirect back to the member list page if the 'id' parameter is not provided
  header("Location: ../index.php?p=buku");
  exit();
}
?>