<?php
require_once 'core.php';

$success = array();
$errors = array();

$keterangan = '';

if (isset($_POST['keterangan'])) {
	$keterangan = $_POST['keterangan'];
}

if(isset($_POST['tambahData'])) {

	$no_inventaris = $_POST['no_inventaris'];
  $tanggal_kerusakan = $_POST['tanggal_kerusakan'];
	$keterangan = $_POST['keterangan'];
  $username = $_POST['username'];

  $updateBarang = "UPDATE barang SET status = 0 WHERE no_inventaris = '$no_inventaris'";
  if ($connect->query($updateBarang) === TRUE) {
    $sql = "INSERT INTO kerusakan (no_inventaris, user_entry, tgl_kerusakan, status, keterangan)
  	VALUES ('$no_inventaris', '$username', '$tanggal_kerusakan', 0, '$keterangan')";

  	if($connect->query($sql) === TRUE) {
  		$_SESSION['success'] = "Data Berhasil ditambahkan";
  	} else {
  	 	$_SESSION['error'] = "Error while adding the members";
  	}
  }
  else {
    $_SESSION['error'] = "Error while adding the members";
  }

} // /if $_POST
?>
