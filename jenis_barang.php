<?php
require_once 'includes/header.php';
include_once 'php_action/tambahJenisBarang.php';
include_once 'php_action/editJenisBarang.php';
include_once 'php_action/deleteJenisBarang.php';
?>
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dashboard.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Jenis Barang</li>
    </ol>

    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Data Jenis Barang</div>
      <div class="card-body">
        <?php
          if ($_SESSION['role_level'] != 'admin') {
            echo '
            <div class="div-action pull pull-right" style="padding-bottom:20px;">
              <button class="btn btn-outline-dark" data-toggle="modal" data-target="#tambahJenisBarang"> <i class="fa fa-plus fa-fw"></i>Tambah Jenis Barang</button>
            </div> <!-- /div-action -->
            ';
          }
         ?>
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
                <th>Nama Jenis Barang</th>
                <th style="width:100px"><i class="fa fa-fw fa-wrench"></i> Setting</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $fetchKategori = $connect->query("SELECT * FROM jenis_barang");
              if ($fetchKategori->num_rows > 0) {
                $no = 1;
                while ($rowKategori = $fetchKategori->fetch_array()) {
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $rowKategori[1]; ?></td>
                    <td>
                      <div class="dropdown">
                        <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action <span class="caret"></span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <?php
                          if ($_SESSION['role_level'] != 'admin') {
                            ?>
                            <button data-target="#editJenisBarang" data-toggle="modal" class="dropdown-item" type="button" data-id="<?=$rowKategori[0]?>" data-nama="<?=$rowKategori[1]?>" onclick="editJenisBarang(this);" ><i class="fa fa-edit"></i> Edit</button>
                            <?php
                          }
                          else {
                            ?>
                            <button data-target="#deleteJenisBarang" data-toggle="modal" class="dropdown-item" type="button" data-id="<?=$rowKategori[0]?>" data-nama="<?=$rowKategori[1]?>" onclick="deleteJenisBarang(this);" ><i class="fa fa-fw fa-trash"></i> Hapus</button>
                            <?php
                          }
                           ?>
                       </div>
                      </div>
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

<div class="modal fade" id="tambahJenisBarang" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" action="jenis_barang.php" method="post">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-plus fa-fw"></i>Tambah Jenis Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" name="jenis_barang" placeholder="Nama Jenis Barang" autocomplete="off" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-outline-dark" name="tambahJenisBarang" autocomplete="off">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>
 </div>

 <div class="modal fade" id="editJenisBarang" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <form class="form-horizontal" action="jenis_barang.php" id="editForm" method="post">
         <div class="modal-header">
           <h5 class="modal-title"><i class="fa fa-plus fa-fw"></i>Edit Jenis Barang</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           <div class="form-group">
             <input type="hidden" class="form-control" id="id" name="id" placeholder="Nama Jenis Barang" autocomplete="off" readonly>
           </div>
           <div class="form-group">
             <input type="text" class="form-control" id="nama" name="jenis_barang" placeholder="Nama Jenis Barang" autocomplete="off" required>
           </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
           <button type="submit" class="btn btn-outline-dark" name="editJenisBarang" autocomplete="off">Simpan Data</button>
         </div>
       </form>
     </div>
   </div>
  </div>

  <div class="modal fade" id="deleteJenisBarang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form-horizontal" action="jenis_barang.php" id="deleteForm" method="post">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-trash fa-fw"></i>Apakah anda yakin ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5>Apakah anda yakin untuk menghapus data barang tersebut ?</h5>
            <div class="form-group">
              <input type="hidden" class="form-control" id="id" name="id" autocomplete="off" readonly>
            </div>
            <div class="form-group">
              <label for="nama">Nama Jenis Barang :</label>
              <input type="text" class="form-control" name="nama" id="nama" name="jenis_barang" placeholder="Nama Jenis Barang" readonly>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-outline-dark" name="deleteJenisBarang" autocomplete="off">Yakin</button>
          </div>
        </form>
      </div>
    </div>
   </div>


  <script type="text/javascript">
    function editJenisBarang(item){
      var id = $(item).data('id');
      var nama = $(item).data('nama');

      $('#editForm .form-group #id').val(id);
      $('#editForm .form-group #nama').val(nama);
    }

    function deleteJenisBarang(item) {
      var id = $(item).data('id');
      var nama = $(item).data('nama');

      $('#deleteForm .form-group #id').val(id);
      $('#deleteForm .form-group #nama').val(nama);
    }
  </script>
<?php require_once 'includes/footer.php'; ?>
