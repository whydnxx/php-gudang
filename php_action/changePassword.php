<?php

require_once 'core.php';

if (isset($_POST['changePassword'])) {
  $user_id = $_SESSION['id_user'];
  $password = $_POST['password'];
  $npassword = $_POST['npassword'];
  $cpassword = $_POST['cpassword'];

  $sql = mysqli_query($connect, "SELECT * FROM users WHERE id_user = $user_id");
  $result = mysqli_fetch_assoc($sql);
  if (MD5($password) == $result['password']) {
    if ($npassword == $cpassword) {
      $update = mysqli_query($connect, "UPDATE users SET password = MD5('$cpassword') WHERE id_user = $user_id");
      if ($update) {
        $_SESSION['success'] = 'Data berhasil diperbaharui';
      }
      else {
        $_SESSION['error'] = 'Gagal';
      }
    }
    else {
      $_SESSION['error'] = 'New Password dan Confirm password tidak sama, mohon untuk dicek kembali';
    }
  }
  else {
    $_SESSION['error'] = 'Current Password salah, mohon untuk dicek kembali';
  }

}

 ?>
