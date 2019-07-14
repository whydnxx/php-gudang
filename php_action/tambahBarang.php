<?php
require_once 'core.php';

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

if(isset($_POST['tambahBarang'])) {

	$no_inventaris = $_POST['no_inventaris'];
  $jenis_barang = $_POST['jenis_barang'];
	$indoor_outdoor = $_POST['indoor_outdoor'];
	$seri_barang = $_POST['seri_barang'];
	$spesifikasi = $_POST['spesifikasi'];
	$username = $_POST['username'];
	$lokasi = $_POST['lokasi'];
	$keterangan = $_POST['keterangan'];

	$checkdata = mysqli_query($connect, "SELECT no_inventaris FROM barang WHERE no_inventaris='$no_inventaris' ");
  if (mysqli_num_rows($checkdata) > 0) {
		$_SESSION['error'] = 'Maaf nomor Invetaris sudah terdaftar';
  }
	else {
		$sql = "INSERT INTO barang (no_inventaris, no_inventaris_lama, user_entry, id_pengguna, kode_lokasi, kode_barang, kode_divisi, seri_barang, spesifikasi, os, office, antivirus, outdoor_indoor, status, keterangan)
		VALUES ('$no_inventaris', '$no_inventaris', '$username', '$pengguna_barang', '$lokasi', '$jenis_barang', '$divisi', '$seri_barang', '$spesifikasi', '$os', '$office', '$antivirus', '$indoor_outdoor', 1, '$keterangan')";

		if($connect->query($sql) === TRUE) {
			$_SESSION['success'] = 'Barang berhasil ditambahkan';
		} else {
		 	$_SESSION['error'] = 'Error';
		}
	}

} // /if $_POST
?>
