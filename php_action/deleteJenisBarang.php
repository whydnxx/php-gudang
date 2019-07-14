<?php
include_once 'core.php';

if (isset($_POST['deleteJenisBarang'])) {
  $id = $_POST['id'];

  $query = mysqli_query($connect, "DELETE FROM jenis_barang WHERE kode_barang = $id");
  if ($query) {
    $_SESSION['success'] = "Data berhasil dihapus";
  }
  else {
    $_SESSION['error'] = "Gagal menghapus";
  }
}

 ?>
