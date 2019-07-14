<?php
include_once 'core.php';

$os = '';
if (isset($_POST['os'])) {
	$os = $_POST['os'];
}
$office = '';
if (isset($_POST['office'])) {
	$office = $_POST['office'];
}
$antivirus = '';
if (isset($_POST['antivirus'])) {
	$antivirus = $_POST['antivirus'];
}
$divisi = '';
if (isset($_POST['divisi'])) {
	$divisi = $_POST['divisi'];
}
$pengguna_barang = '';
if (isset($_POST['pengguna_barang'])) {
	$pengguna_barang = $_POST['pengguna_barang'];
}

if (isset($_POST['editBarang'])) {
	$no_inventaris1 = $_POST['no_inventaris1'];
  $jenis_barang = $_POST['jenis_barang'];
	$indoor_outdoor = $_POST['indoor_outdoor'];
	$seri_barang = $_POST['seri_barang'];
	$spesifikasi = $_POST['spesifikasi'];
	$username = $_POST['username'];
	$lokasi = $_POST['lokasi'];
	$keterangan = $_POST['keterangan'];

  $query = mysqli_query($connect, "UPDATE
    barang SET
    no_inventaris = '$no_inventaris1',
		user_edit = '$username',
		id_pengguna = '$pengguna_barang',
		kode_lokasi = '$lokasi',
		kode_barang = '$jenis_barang',
		kode_divisi = '$divisi',
		seri_barang = '$seri_barang',
		spesifikasi = '$spesifikasi',
		os = '$os',
		office = '$office',
		antivirus = '$antivirus',
		outdoor_indoor = '$indoor_outdoor',
		keterangan = '$keterangan'
    WHERE no_inventaris = '$no_inventaris1'") OR DIE(mysqli_error($connect));
  if ($query) {
    $_SESSION['success'] = "Data berhasil diperbaharui";
		header('location: barang.php');
  }
  else {
    $_SESSION['error'] = "Gagal memperbaharui";
  }
}

 ?>
