<?php

$host = "localhost";
$username = "root";
$password = "";
$db_name = "gudang";

$connect = new mysqli($host, $username, $password, $db_name);

if ($connect->connect_error) {
  die("Koneksi Gagal : " .$connect->connect_error);
}
else {
  // echo "Koneksi Berhasil";
}

 ?>
