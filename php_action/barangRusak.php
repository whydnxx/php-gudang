<?php
include_once 'core.php';

if (isset($_POST['barangRusak'])) {
  $id = $_POST['no_inventaris'];

  $query = mysqli_query($connect, "UPDATE barang SET status = 99 WHERE no_inventaris = '$id'");
  if ($query) {
    $_SESSION['success'] = "Barang diubah menjadi rusak";
  }
  else {
    $_SESSION['error'] = "Gagal menghapus";
  }
}

 ?>
