<?php
include_once 'core.php';

if (isset($_POST['deleteKerusakan'])) {
  $no_kerusakan = $_POST['no_kerusakan'];
  $no_inventaris = $_POST['no_inventaris'];

  $query = mysqli_query($connect, "DELETE FROM kerusakan WHERE no_kerusakan = $no_kerusakan");
  if ($query) {
    $_SESSION['success'] = "Data berhasil dihapus";
  }
  else {
    $_SESSION['error'] = "Gagal menghapus";
  }
}

 ?>
