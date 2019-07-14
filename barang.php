<?php require_once 'includes/header.php'; ?>
<?php
include_once 'php_action/tambahBarang.php';
include_once 'php_action/barangRusak.php';
include_once 'php_action/deleteBarang.php';

$fetchBarangSql = "SELECT barang.no_inventaris, jenis_barang.nama_jenis_barang, barang.seri_barang, barang.status
FROM barang
INNER JOIN jenis_barang ON barang.kode_barang = jenis_barang.kode_barang";
$fetchBarang = $connect->query($fetchBarangSql);
 ?>
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dashboard.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Barang</li>
    </ol>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Data Barang</div>
      <div class="card-body">
        <div class="pull pull-right" style="padding-bottom:20px;">
          <?php
            if ($_SESSION['role_level'] != 'admin') {
              ?>
              <button class="btn btn-outline-dark" data-toggle="modal" data-target="#tambahBarang"> <i class="fa fa-plus fa-fw"></i>Tambah Barang</button>
              <?php
            }
          ?>
          <a class="btn btn-outline-info" href="printListBarang.php"> <i class="fa fa-print fa-fw"></i>Print List</a>
        </div>
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
        <div class="table-responsive">
          <table class="table table-bordered" id="DataTables" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th style="width:5px">No</th>
                <th>No Inventaris</th>
                <th>Jenis Barang</th>
                <th>Seri Barang</th>
                <th>Status</th>
                <th style="width:100px"><i class="fa fa-fw fa-wrench"></i> Setting</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($fetchBarang->num_rows > 0) {
                $no = 1;
                while ($rowBarang = $fetchBarang->fetch_array()) {
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $rowBarang[0]; ?></td>
                    <td><?php echo $rowBarang[1]; ?></td>
                    <td><?php echo $rowBarang[2]; ?></td>
                    <td><?php
                    if ($rowBarang[3] == 1) {
                      echo "<span class='badge badge-success'>Aktif</span>";
                    }
                    elseif ($rowBarang[3] == 99) {
                      echo "<span class='badge badge-warning'>Rusak</span>";
                    }
                    else {
                      echo "<span class='badge badge-danger'>Dalam Perbaikan</span>";
                    } ?>
                    </td>
                    <td>
                      <?php
                      if ($rowBarang[3] == 1) {
                        ?>
                        <?php
                          if ($_SESSION['role_level'] != 'admin') {
                            ?>
                            <div class="dropdown">
                              <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <button data-target="#barangRusak" data-toggle="modal" class="dropdown-item" type="button" data-id="<?=$rowBarang[0]?>" onclick="barangRusak(this);" ><i class="fa fa-fw fa-close"></i> Barang Rusak</button>
                                <a class="dropdown-item" href="lihatBarang.php?id=<?php echo $rowBarang[0]; ?>"> <i class="fa fa-fw fa-eye"></i> Lihat Barang</a>
                                <a class="dropdown-item" href="editBarang.php?id=<?php echo $rowBarang[0]; ?>"> <i class="fa fa-fw fa-edit"></i> Edit Barang</a>
                             </div>
                            </div>
                            <?php
                          }
                          else {
                            ?>
                            <div class="dropdown">
                              <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="lihatBarang.php?id=<?php echo $rowBarang[0]; ?>"> <i class="fa fa-fw fa-eye"></i> Lihat Barang</a>
                                <button data-target="#deleteBarang" data-toggle="modal" class="dropdown-item" type="button" data-id="<?=$rowBarang[0]?>" onclick="deleteBarang(this);" ><i class="fa fa-fw fa-trash"></i> Hapus Barang</button>
                             </div>
                            </div>
                            <?php
                          }
                      }
                      elseif ($rowBarang[3] == 99) {
                        ?>
                        <?php
                          if ($_SESSION['role_level'] != 'admin') {
                            ?>
                            <div class="dropdown">
                              <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="lihatBarang.php?id=<?php echo $rowBarang[0]; ?>"> <i class="fa fa-fw fa-eye"></i> Lihat Barang</a>
                                <a class="dropdown-item" href="editBarang.php?id=<?php echo $rowBarang[0]; ?>"> <i class="fa fa-fw fa-edit"></i> Edit Barang</a>
                             </div>
                            </div>
                            <?php
                          }
                          else {
                            ?>
                            <div class="dropdown">
                              <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="lihatBarang.php?id=<?php echo $rowBarang[0]; ?>"> <i class="fa fa-fw fa-eye"></i> Lihat Barang</a>
                                <a class="dropdown-item" href="php_action/hapusBarang.php?id=<?php echo $rowBarang[0]; ?>"> <i class="fa fa-fw fa-trash"></i> Hapus Barang</a>
                             </div>
                            </div>
                            <?php
                          }
                      }
                      else {
                        ?>
                        <?php
                          if ($_SESSION['role_level'] != 'admin') {
                            ?>
                            <div class="dropdown">
                              <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="lihatBarang.php?id=<?php echo $rowBarang[0]; ?>"> <i class="fa fa-fw fa-eye"></i> Lihat Barang</a>
                                <a class="dropdown-item" href="editBarang.php?id=<?php echo $rowBarang[0]; ?>"> <i class="fa fa-fw fa-edit"></i> Edit Barang</a>
                             </div>
                            </div>
                            <?php
                          }
                          else {
                            ?>
                            <div class="dropdown">
                              <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action <span class="caret"></span>
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="lihatBarang.php?id=<?php echo $rowBarang[0]; ?>"> <i class="fa fa-fw fa-eye"></i> Lihat Barang</a>
                                <button data-target="#deleteBarang" data-toggle="modal" class="dropdown-item" type="button" data-id="<?=$rowBarang[0]?>" onclick="deleteBarang(this);" ><i class="fa fa-fw fa-trash"></i> Hapus Barang</button>
                             </div>
                            </div>
                            <?php
                          }
                      } ?>
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

<?php include_once 'includes/tambahBarangModal.php'; ?>

 <div class="modal fade" id="barangRusak" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <form class="form-horizontal" action="barang.php" id="barangRusakForm" method="post">
         <div class="modal-header">
           <h5 class="modal-title"><i class="fa fa-wrench fa-fw"></i>Apakah anda yakin ?</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           <h5>Apakah anda yakin untuk mengganti data barang tersebut, menjadi rusak ?</h5>
           <div class="form-group">
             <input type="hidden" class="form-control" id="id" name="no_inventaris" autocomplete="off" readonly>
           </div>
           <div class="form-group">
             <label for="nama">No Invetaris :</label>
             <input type="text" class="form-control" id="no_inventaris" placeholder="Nama Jenis Barang" readonly>
           </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tidak</button>
           <button type="submit" class="btn btn-outline-dark" name="barangRusak" autocomplete="off">Yakin</button>
         </div>
       </form>
     </div>
   </div>
  </div>

  <div class="modal fade" id="deleteBarang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form-horizontal" action="barang.php" id="deleteForm" method="post">
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
              <label for="nama">Nomor Invetaris :</label>
              <input type="text" class="form-control" name="no_inventaris" id="no_inventaris" placeholder="Nama Jenis Barang" readonly>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-outline-dark" name="deleteBarang" autocomplete="off">Yakin</button>
          </div>
        </form>
      </div>
    </div>
   </div>

<script type="text/javascript">
  function cekTambahan(item) {
    var value = item.value;
    if (value == 1) {
      document.getElementById('data_tambahan').removeAttribute('style');
      document.getElementById('data_tambahan_divisi').removeAttribute('style');
      document.getElementById('data_tambahan_pengguna').removeAttribute('style');
    }
    else if (value == 2) {
      document.getElementById('data_tambahan').removeAttribute('style');
      document.getElementById('data_tambahan_divisi').removeAttribute('style');
      document.getElementById('data_tambahan_pengguna').removeAttribute('style');
    }
    else {
      document.getElementById('data_tambahan').setAttribute('style','display:none;');
      document.getElementById('data_tambahan_divisi').setAttribute('style','display:none;');
      document.getElementById('data_tambahan_pengguna').setAttribute('style','display:none;');
    }
  }

  function barangRusak(item) {
    var id = $(item).data('id');

    $('#barangRusakForm .form-group #id').val(id);
    $('#barangRusakForm .form-group #no_inventaris').val(id);
  }

  function deleteBarang(item) {
    var id = $(item).data('id');

    $('#deleteForm .form-group #id').val(id);
    $('#deleteForm .form-group #no_inventaris').val(id);
  }
</script>

<?php require_once 'includes/footer.php'; ?>
