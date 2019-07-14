<?php
include_once 'core.php';

if (isset($_POST['editJenisBarang'])) {
  $id = $_POST['id'];
  $jenis_barang = $_POST['jenis_barang'];

  $query = mysqli_query($connect, "UPDATE jenis_barang SET nama_jenis_barang = '$jenis_barang' WHERE kode_barang = $id");
  if ($query) {
    $_SESSION['success'] = "Data berhasil diperbaharui";
  }
  else {
    $_SESSION['error'] = "Gagal memperbaharui";
  }
}

 ?>
