<?php
include_once 'core.php';

if (isset($_POST['finishKerusakan'])) {
  $id = $_POST['id'];
  $no_inventaris = $_POST['no_inventaris'];

  $setQuery = mysqli_query($connect, "UPDATE barang SET status = 1 WHERE no_inventaris = '$no_inventaris'");
  if ($setQuery) {
    $query = mysqli_query($connect, "UPDATE kerusakan SET status = 1 WHERE no_kerusakan = $id");
    if ($query) {
      $_SESSION['success'] = "Data berhasil diperbaharui";
    }
    else {
      $_SESSION['error'] = "Gagal memperbaharui";
    }// code...
  }
}

 ?>
