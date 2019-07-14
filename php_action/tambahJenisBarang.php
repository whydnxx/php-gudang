<?php
require_once 'core.php';

if(isset($_POST['tambahJenisBarang'])) {

	$jenis_barang = $_POST['jenis_barang'];

	$checkdata = mysqli_query($connect, "SELECT nama_jenis_barang FROM jenis_barang WHERE nama_jenis_barang='$jenis_barang' ");
  if (mysqli_num_rows($checkdata) > 0) {
		$_SESSION['error'] = 'Jenis barang sudah terdaftar, mohon coba lagi';
  }
	else {
		$sql = "INSERT INTO jenis_barang (nama_jenis_barang) VALUES ('$jenis_barang')";

		if($connect->query($sql) === TRUE) {
			$_SESSION['success'] = 'Jenis Barang berhasil ditambahkan';
		} else {
			$_SESSION['error'] = 'Error while adding the members';
		}
	}

} // /if $_POST
?>
