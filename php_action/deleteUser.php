<?php
include_once 'core.php';

if (isset($_POST['deleteUser'])) {
  $id = $_POST['id'];

  $query = mysqli_query($connect, "DELETE FROM users WHERE id_user = '$id'");
  if ($query) {
    $_SESSION['success'] = "Data berhasil dihapus";
  }
  else {
    $_SESSION['error'] = "Gagal menghapus";
  }
}

 ?>
