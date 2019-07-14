<?php
if (isset($_POST['editUsername'])) {
  $user_id = $_POST['user_id'];
  $username = $_POST['username'];

  $changeUsernameSql = "UPDATE users SET username = '$username' WHERE id_user = $user_id";
  if ($connect->query($changeUsernameSql) === TRUE) {
    $_SESSION['success'] = 'Data berhasil diperbaharui';
    $_SESSION['username'] = $username;
  }
  else {
    $_SESSION['error'] = 'Data tidak berhasil diperbaharui';
  }
}

?>
