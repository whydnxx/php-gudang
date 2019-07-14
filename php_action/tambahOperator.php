<?php

require_once 'core.php';

if (isset($_POST['tambahOperator'])) {
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = $_POST['cpassword'];
  $email = $_POST['email'];
  $role = $_POST['role'];

  $cek = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username'");
  if (mysqli_num_rows($cek) > 0) {
    $_SESSION['error'] = 'Maaf username tersebut sudah digunakan, mohon coba lagi.';
  }
  else {
    $query = mysqli_query($connect, "INSERT INTO users(user_name, username, password, email, role) VALUES('$nama', '$username', '$password', '$email', '$role')");
    if ($query) {
      $_SESSION['success'] = 'Data berhasil ditambahkan';
    }
    else {
      $_SESSION['error'] = 'Gagal';
    }
  }
}

 ?>
