<?php
require_once 'includes/header.php';
include_once 'php_action/tambahOperator.php';
include_once 'php_action/deleteUser.php';

if ($_SESSION['role_level'] != 'admin') {
  echo "<script>alert('Maaf anda bukan admin, anda tidak memiliki hak akses menambah operator'); window.location.replace('http://localhost/gudang/dashboard.php')</script>";
}
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dashboard.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item">Setting</li>
      <li class="breadcrumb-item active">Tambah Operator</li>
    </ol>

    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Data Users</div>
      <div class="card-body">
        <div class="div-action pull pull-right" style="padding-bottom:20px;">
          <button class="btn btn-outline-dark" data-toggle="modal" data-target="#tambahOperator"> <i class="fa fa-plus fa-fw"></i>Tambah Pengguna</button>
        </div> <!-- /div-action -->
        <div class="messages">
          <?php
            if(isset($_SESSION['success'])){
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check fa-fw"></i><strong>Success</strong> <?=$_SESSION['success']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php
              unset($_SESSION['success']);
            }
            if(isset($_SESSION['error'])){
          ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation fa-fw"></i><strong>Error</strong> <?=$_SESSION['error']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php
              unset($_SESSION['error']);
            }
          ?>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered" id="DataTables" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th style="width:5px">No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>E-Mail</th>
                <th>Role</th>
                <th style="width:100px"><i class="fa fa-fw fa-wrench"></i> Setting</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $fetchKategori = $connect->query("SELECT * FROM users");
              if ($fetchKategori->num_rows > 0) {
                $no = 1;
                while ($rowKategori = $fetchKategori->fetch_array()) {
                  ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $rowKategori[1]; ?></td>
                    <td><?= $rowKategori[2]; ?></td>
                    <td><?= $rowKategori[5]; ?></td>
                    <td><?= $rowKategori[4] ?></td>
                    <td>
                      <button data-target="#deleteUser" data-toggle="modal" class="btn btn-sm btn-outline-info" type="button" data-id="<?=$rowKategori[0]?>" data-nama="<?=$rowKategori[1]?>" data-username="<?=$rowKategori[2]?>" onclick="deleteUser(this);" ><i class="fa fa-fw fa-trash"></i> Hapus</button>
                    </td>
                  </tr>
                  <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

</div>

<div class="modal fade" id="tambahOperator" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" action="tambahOperator.php" method="post">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-plus fa-fw"></i>Tambah Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" name="nama" placeholder="Nama Panjang" autocomplete="off" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="cpassword" id="confirm_password" placeholder="Confirm Password" autocomplete="off" required>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="example@email.com" autocomplete="off" required>
          </div>
          <div class="form-group">
            <select class="form-control" name="role" required>
              <option selected disabled value="">Role</option>
              <option value="admin">Admin</option>
              <option value="operator">Operator</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-outline-dark" name="tambahOperator" onclick="return ValidatePassword()">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>
 </div>

  <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form-horizontal" action="tambahOperator.php" id="deleteForm" method="post">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-trash fa-fw"></i>Apakah anda yakin ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5>Apakah anda yakin untuk menghapus User tersebut ?</h5>
            <div class="form-group">
              <input type="hidden" class="form-control" id="id" name="id" autocomplete="off" readonly>
            </div>
            <div class="form-group">
              <label for="nama">Nama User :</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Panjang" readonly>
            </div>
            <div class="form-group">
              <label for="nama">Username :</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" readonly>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-outline-dark" name="deleteUser" autocomplete="off">Yakin</button>
          </div>
        </form>
      </div>
    </div>
   </div>

  <script type="text/javascript">

    function ValidatePassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;
        if (password != confirmPassword) {
            confirm_password.setCustomValidity("Passwords tidak sama");
        }
        else {
          confirm_password.setCustomValidity('');
        }

        password.onchange = ValidatePassword;
        confirm_password.onkeyup = ValidatePassword;
    }

    function deleteUser(item) {
      var id = $(item).data('id');
      var nama = $(item).data('nama');
      var username = $(item).data('username');

      $('#deleteForm .form-group #id').val(id);
      $('#deleteForm .form-group #nama').val(nama);
      $('#deleteForm .form-group #username').val(username);
    }
  </script>
<?php require_once 'includes/footer.php'; ?>
