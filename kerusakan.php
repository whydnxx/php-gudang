<?php require_once 'includes/header.php';
include_once 'php_action/tambahKerusakan.php';
include_once 'php_action/finishKerusakan.php';
include_once 'php_action/editKerusakan.php';
include_once 'php_action/deleteKerusakan.php';
?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="dashboard.php">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Kerusakan</li>
    </ol>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Data Kerusakan</div>
      <div class="card-body">
        <div class="pull pull-right" style="padding-bottom:20px;">
          <?php
            if ($_SESSION['role_level'] != 'admin') {
              ?>
              <button class="btn btn-outline-dark" data-toggle="modal" data-target="#tambahKerusakan"> <i class="fa fa-plus fa-fw"></i>Tambah Data</button>
              <?php
            }
          ?>
          <a class="btn btn-outline-info" href="printListKerusakan.php"> <i class="fa fa-print fa-fw"></i>Print List</a>
        </div>
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
                <th>No Kerusakan</th>
                <th>No Inventaris</th>
                <th>Tanggal Kerusakan</th>
                <th>Seri Barang</th>
                <th>Status</th>
                <th style="width:100px"><i class="fa fa-fw fa-wrench"></i> Setting</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $fetchKerusakanSql = "SELECT kerusakan.no_kerusakan, barang.no_inventaris, kerusakan.tgl_kerusakan, barang.seri_barang, kerusakan.status, kerusakan.keterangan, kerusakan.tgl_perbaikan, kerusakan.harga_perbaikan
              FROM kerusakan INNER JOIN barang ON kerusakan.no_inventaris = barang.no_inventaris ORDER BY no_kerusakan DESC";
              $fetchKerusakan = $connect->query($fetchKerusakanSql);
              if ($fetchKerusakan->num_rows > 0) {
                $no = 1;
                while ($rowKerusakan = $fetchKerusakan->fetch_array()) {
                  $tanggal_a = date('d F Y', strtotime($rowKerusakan[2]));
                  if ($rowKerusakan[6] == null) {
                    $tanggal_b = "-";
                  }
                  else {
                    $tanggal_b = date('d F Y', strtotime($rowKerusakan[6]));
                  }
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?= $rowKerusakan[0]; ?></td>
                    <td><?= $rowKerusakan[1]; ?></td>
                    <td><?= date('d F Y', strtotime($rowKerusakan[2])); ?></td>
                    <td><?= $rowKerusakan[3]; ?></td>
                    <td><?php
                    if ($rowKerusakan[4] == 1) {
                      echo "<span class='badge badge-success'>Selesai Perbaikan</span>";
                    }
                    else {
                      echo "<span class='badge badge-danger'>Dalam Perbaikan</span>";
                    } ?></td>
                    <?php
                      if ($_SESSION['role_level'] != 'admin') {
                        ?>
                        <td>
                         <?php
                         if ($rowKerusakan[4] == 0) {
                           ?>
                           <div class="btn-group">
                             <button class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#viewKerusakan" data-a="<?=$rowKerusakan[0]?>" data-b="<?=$rowKerusakan[1]?>" data-c="<?=$tanggal_a?>" data-d="<?=$rowKerusakan[3]?>" data-e="<?=$rowKerusakan[4]?>" data-f="<?=$rowKerusakan[5]?>" data-g="<?=$tanggal_b?>" data-h="<?=$rowKerusakan[7]?>" onclick="viewKerusakan(this)"> <i class="fa fa-fw fa-eye"></i></button>
                             <button data-target="#finishKerusakan" data-toggle="modal" class="btn btn-outline-dark btn-sm" type="button" data-id="<?=$rowKerusakan[0]?>" data-no_inventaris="<?=$rowKerusakan[1]?>" onclick="finishKerusakan(this);" ><i class="fa fa-fw fa-check"></i></button>
                             <button class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#editKerusakan" data-a="<?=$rowKerusakan[0]?>" data-b="<?=$rowKerusakan[1]?>" data-c="<?=$rowKerusakan[2]?>" data-d="<?=$rowKerusakan[3]?>" data-e="<?=$rowKerusakan[4]?>" data-f="<?=$rowKerusakan[5]?>" data-g="<?=$rowKerusakan[6]?>" data-h="<?=$rowKerusakan[7]?>" onclick="editKerusakan(this)"> <i class="fa fa-fw fa-edit"></i></button>
                           </div>
                           <?php
                         }
                         else {
                           ?>
                           <div class="btn-group">
                             <button class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#viewKerusakan" data-a="<?=$rowKerusakan[0]?>" data-b="<?=$rowKerusakan[1]?>" data-c="<?=$tanggal_a?>" data-d="<?=$rowKerusakan[3]?>" data-e="<?=$rowKerusakan[4]?>" data-f="<?=$rowKerusakan[5]?>" data-g="<?=$tanggal_b?>" data-h="<?=$rowKerusakan[7]?>" onclick="viewKerusakan(this)"> <i class="fa fa-fw fa-eye"></i></button>
                             <button class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#editKerusakan" data-a="<?=$rowKerusakan[0]?>" data-b="<?=$rowKerusakan[1]?>" data-c="<?=$rowKerusakan[2]?>" data-d="<?=$rowKerusakan[3]?>" data-e="<?=$rowKerusakan[4]?>" data-f="<?=$rowKerusakan[5]?>" data-g="<?=$rowKerusakan[6]?>" data-h="<?=$rowKerusakan[7]?>" onclick="editKerusakan(this)"> <i class="fa fa-fw fa-edit"></i></button>
                           </div>
                           <?php
                         }
                           ?>
                        </td>
                        <?php
                      }
                      else {
                        ?>
                        <td>
                          <div class="btn-group">
                            <button data-target="#deleteKerusakan" data-toggle="modal" class="btn btn-outline-dark btn-sm" type="button" data-id="<?=$rowKerusakan[0]?>" data-no_inventaris="<?=$rowKerusakan[1]?>" onclick="deleteKerusakan(this);" ><i class="fa fa-fw fa-trash"></i></button>
                            <button class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#viewKerusakan" data-a="<?=$rowKerusakan[0]?>" data-b="<?=$rowKerusakan[1]?>" data-c="<?=$tanggal_a?>" data-d="<?=$rowKerusakan[3]?>" data-e="<?=$rowKerusakan[4]?>" data-f="<?=$rowKerusakan[5]?>" data-g="<?=$tanggal_b?>" data-h="<?=$rowKerusakan[7]?>" onclick="viewKerusakan(this)"> <i class="fa fa-fw fa-eye"></i></button>
                          </div>
                        </td>
                        <?php
                      }
                    ?>
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

<div class="modal fade" id="tambahKerusakan" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" action="kerusakan.php" method="post">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-plus fa-fw"></i>Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <select class="form-control" name="no_inventaris" required>
              <option selected disabled value="">Nomor Inventaris</option>
              <?php
              $fetchBarang = mysqli_query($connect, "SELECT * FROM barang WHERE status = 99");
              if ($fetchBarang->num_rows > 0) {
                while ($row = mysqli_fetch_array($fetchBarang)) {
                  ?>
                  <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
                  <?php
                }
              }
               ?>
            </select>
          </div>
          <div class="form-group">
            <div class="input-group">
              <input type="date" class="form-control" data-date-format="yyyy-mm-dd" name="tanggal_kerusakan" autocomplete="off" required>
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-calendar fa-fw"></i> Tanggal Rusak</div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="keterangan" placeholder="Keterangan" rows="8" cols="80"></textarea>
          </div>
          <div class="form-group">
            <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-outline-dark" name="tambahData" autocomplete="off">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>
 </div>

 <div class="modal fade" id="editKerusakan" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <form class="form-horizontal" action="kerusakan.php" id="editForm" method="post">
         <div class="modal-header">
           <h5 class="modal-title"><i class="fa fa-edit fa-fw"></i>Edit Data</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           <div class="form-group">
             <input type="text" class="form-control" id="no_inventaris" name="no_inventaris" readonly>
           </div>
           <div class="form-group">
             <div class="input-group">
               <input type="date" class="form-control" id="tgl_kerusakan" data-date-format="yyyy-mm-dd" name="tanggal_rusak" autocomplete="off" required>
               <div class="input-group-prepend">
                 <div class="input-group-text"><i class="fa fa-calendar fa-fw"></i> Tanggal Di perbaiki</div>
               </div>
             </div>
           </div>
           <div class="form-group">
             <div class="input-group">
               <input type="date" class="form-control" id="tgl_perbaikan" data-date-format="yyyy-mm-dd" name="tanggal_diperbarui" autocomplete="off" required>
               <div class="input-group-prepend">
                 <div class="input-group-text"><i class="fa fa-calendar fa-fw"></i> Tanggal Di perbaiki</div>
               </div>
             </div>
           </div>
           <div class="form-group">
             <select class="form-control" id="status" name="status">
               <option readonly value="0">Dalam Perbaikan</option>
               <option readonly value="1">Selesai Perbaikan</option>
             </select>
           </div>
           <div class="form-group">
             <div class="input-group">
               <div class="input-group-prepend">
                 <div class="input-group-text">IDR</div>
               </div>
               <input class="form-control" type="text" id="harga_perbaikan" name="harga" placeholder="Harga Perbaikan" required>
             </div>
           </div>
           <div class="form-group">
             <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" rows="8" cols="80"></textarea>
           </div>
           <div class="form-group">
             <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
             <input  type="hidden" id="no_kerusakan" name="no_kerusakan" >
           </div>
         </div>

         <div class="modal-footer">
           <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
           <button type="submit" class="btn btn-outline-dark" name="editKerusakan" autocomplete="off">Simpan Data</button>
         </div>
       </form>
     </div>
   </div>
  </div>

  <div class="modal fade" id="viewKerusakan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form-horizontal" id="viewForm" method="post">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-eye fa-fw"></i>View Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input type="text" class="form-control" id="no_inventaris" name="no_inventaris" readonly disabled>
            </div>
            <div class="form-group">
              <div class="input-group">
                <input type="text" class="form-control" id="tgl_kerusakan" data-date-format="yyyy-mm-dd" name="tanggal_rusak" autocomplete="off" readonly disabled required>
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-calendar fa-fw"></i> Tanggal Di perbaiki</div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <input type="text" class="form-control" id="tgl_perbaikan" data-date-format="yyyy-mm-dd" name="tanggal_diperbarui" autocomplete="off" readonly disabled required>
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-calendar fa-fw"></i> Tanggal Di perbaiki</div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <select class="form-control" id="status" readonly disabled name="status">
                <option readonly value="0">Dalam Perbaikan</option>
                <option readonly value="1">Selesai Perbaikan</option>
              </select>
            </div>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">IDR</div>
                </div>
                <input class="form-control" type="text" id="harga_perbaikan" name="harga" placeholder="Harga Perbaikan" readonly disabled required>
              </div>
            </div>
            <div class="form-group">
              <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" rows="8" cols="80" readonly disabled></textarea>
            </div>
            <div class="form-group">
              <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
              <input  type="hidden" id="no_kerusakan" name="no_kerusakan" >
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-outline-dark" name="viewKerusakan" autocomplete="off">Simpan Data</button>
          </div>
        </form>
      </div>
    </div>
   </div>

 <div class="modal fade" id="finishKerusakan" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <form class="form-horizontal" action="kerusakan.php" id="finishForm" method="post">
         <div class="modal-header">
           <h5 class="modal-title"><i class="fa fa-trash fa-fw"></i>Barang telah selesai ?</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           <h5>Apakah barang tersebut sudah selesai ?</h5>
           <div class="form-group">
             <label for="nama">Nomor Kerusakan :</label>
             <input type="hidden" class="form-control" id="no_kerusakan" name="no_kerusakan" autocomplete="off" readonly>
           </div>
           <div class="form-group">
             <label for="nama">Nomor Invetaris :</label>
             <input type="text" class="form-control" name="no_inventaris" id="no_inventaris" placeholder="No Inventaris" readonly>
           </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tidak</button>
           <button type="submit" class="btn btn-outline-dark" name="finishKerusakan" autocomplete="off">Ya</button>
         </div>
       </form>
     </div>
   </div>
  </div>

  <div class="modal fade" id="deleteKerusakan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form-horizontal" action="kerusakan.php" id="deleteForm" method="post">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-trash fa-fw"></i>Apakah anda yakin ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5>Apakah anda yakin untuk menghapus data tersebut ?</h5>
            <div class="form-group">
              <label for="nama">Nomor Kerusakan :</label>
              <input type="text" class="form-control" id="no_kerusakan" name="no_kerusakan" autocomplete="off" readonly>
            </div>
            <div class="form-group">
              <label for="nama">Nomor Invetaris :</label>
              <input type="text" class="form-control" name="no_inventaris" id="no_inventaris" placeholder="No Inventaris" readonly>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-outline-dark" name="deleteKerusakan" autocomplete="off">Yakin</button>
          </div>
        </form>
      </div>
    </div>
   </div>

  <script type="text/javascript">
    function finishKerusakan(item) {
      var id = $(item).data('id');
      var no_inventaris = $(item).data('no_inventaris');

      $('#finishForm .form-group #no_kerusakan').val(id);
      $('#finishForm .form-group #no_inventaris').val(no_inventaris);
    }

    function deleteKerusakan(item) {
      var id = $(item).data('id');
      var no_inventaris = $(item).data('no_inventaris');

      $('#deleteForm .form-group #no_kerusakan').val(id);
      $('#deleteForm .form-group #no_inventaris').val(no_inventaris);
    }

    function editKerusakan(item) {
      var a = $(item).data('a');
      var b = $(item).data('b');
      var c = $(item).data('c');
      var d = $(item).data('d');
      var e = $(item).data('e');
      var f = $(item).data('f');
      var g = $(item).data('g');
      var h = $(item).data('h');

      $('#editForm .form-group #no_kerusakan').val(a);
      $('#editForm .form-group #no_inventaris').val(b);
      $('#editForm .form-group #tgl_kerusakan').val(c);
      $('#editForm .form-group #seri_barang').val(d);
      $('#editForm .form-group #status').val(e);
      $('#editForm .form-group #keterangan').val(f);
      $('#editForm .form-group #tgl_perbaikan').val(g);
      $('#editForm .form-group #harga_perbaikan').val(h);

    }

    function viewKerusakan(item){
      var a = $(item).data('a');
      var b = $(item).data('b');
      var c = $(item).data('c');
      var d = $(item).data('d');
      var e = $(item).data('e');
      var f = $(item).data('f');
      var g = $(item).data('g');
      var h = $(item).data('h');

      $('#viewForm .form-group #no_kerusakan').val(a);
      $('#viewForm .form-group #no_inventaris').val(b);
      $('#viewForm .form-group #tgl_kerusakan').val(c);
      $('#viewForm .form-group #seri_barang').val(d);
      $('#viewForm .form-group #status').val(e);
      $('#viewForm .form-group #keterangan').val(f);
      $('#viewForm .form-group #tgl_perbaikan').val(g);
      $('#viewForm .form-group #harga_perbaikan').val(h);

    }

  </script>

<?php require_once 'includes/footer.php'; ?>
