<?php
include_once 'core.php';

if (isset($_POST['deleteBarang'])) {
  $id = $_POST['id'];

  $query = mysqli_query($connect, "DELETE FROM barang WHERE no_inventaris = '$id'");
  if ($query) {
    $after = mysqli_query($connect, "DELETE FROM kerusakan WHERE no_inventaris = '$id'");
    if ($after) {
      $_SESSION['success'] = "Data berhasil dihapus";
    }
  }
  else {
    $_SESSION['error'] = "Gagal menghapus";
  }
}

 ?>
