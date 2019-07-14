<?php
include_once 'core.php';

if (isset($_POST['editKerusakan'])) {
  $no_inventaris = $_POST['no_inventaris'];
  $no_kerusakan = $_POST['no_kerusakan'];
  $tanggal_rusak = $_POST['tanggal_rusak'];
  $tanggal_diperbarui = $_POST['tanggal_diperbarui'];
  $harga = $_POST['harga'];
  $keterangan = $_POST['keterangan'];
  $username = $_POST['username'];
  $status = $_POST['status'];

  $cek = mysqli_query($connect, "UPDATE barang SET status = 0 WHERE no_inventaris = '$no_inventaris'");
  if ($cek) {
    $query = mysqli_query($connect, "UPDATE kerusakan SET
      tgl_kerusakan = '$tanggal_rusak',
      tgl_perbaikan = '$tanggal_diperbarui',
      harga_perbaikan = '$harga',
      user_edit = '$username',
      keterangan = '$keterangan',
      status = '$status'
      WHERE no_kerusakan = $no_kerusakan");
    if ($query) {
      $_SESSION['success'] = "Data berhasil diperbaharui";
    }
    else {
      $_SESSION['error'] = "Gagal memperbaharui";
    }
  }
  else {
    $_SESSION['error'] = "Gagal memperbaharui";
  }
}

 ?>
