<?php

session_start();
include_once 'db_connect.php';

if (empty($_SESSION['id_user'])) {
  echo "<script>alert('Maaf anda belum login, mohon untuk login terlebih dahulu'); window.location.replace('http://localhost/gudang/index.php')</script>";
}

 ?>
