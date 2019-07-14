<?php require_once 'includes/header.php'; ?>
<?php
include_once 'php_action/tambahBarang.php';
$no_inventaris = $_GET['id'];
$fetchBarangSql = "SELECT barang.no_inventaris, barang.no_inventaris_lama, jenis_barang.nama_jenis_barang, barang.seri_barang, barang.os, barang.office, barang.antivirus, barang.outdoor_indoor, barang.spesifikasi, barang.keterangan
FROM jenis_barang JOIN barang ON jenis_barang.kode_barang=barang.kode_barang WHERE barang.no_inventaris = '$no_inventaris'";
$fetchBarang = mysqli_query($connect, $fetchBarangSql);
$row = mysqli_fetch_array($fetchBarang)
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
        <i class="fa fa-eye"></i> Data Barang</div>
      <div class="card-body">
        <div class="container">
          <div class="pull pull-right" style="padding-bottom:20px;">
            <a class="btn btn-outline-info" href="php_action/printProduct.php"> <i class="fa fa-print fa-fw"></i>Print Data</a>
            <a href="barang.php" class="btn btn-outline-danger"></i>Kembali</a>
          </div>
          <h2>Keterangan Barang</h2>
          <hr class="garis">
          <table class="table table-hover">
            <tr>
              <td style="width: 30rem;">No Inventaris</td>
              <td><?php echo $row['no_inventaris'] ?></td>
            </tr>
            <tr>
              <td>No Inventaris Lama </td>
    					<td><?php echo $row['no_inventaris_lama'] ?></td>
            </tr>
            <tr>
              <td>Jenis Barang</td>
              <td><?php echo $row['nama_jenis_barang'] ?></td>
            </tr>
            <tr>
              <td>Seri Barang</td>
              <td><?php echo $row['seri_barang'] ?></td>
            </tr>
            <?php
            if ($row['nama_jenis_barang'] == "PC") {
              ?>
              <div>
                <tr>
                  <td>OS</td>
                  <td><?php
                    if ($row['os'] == 1) {
                      echo "<span class='badge badge-success'>Tersedia</span>";
                    }
                    else {
                      echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                    }?>
                  </td>
                </tr>
                <tr>
                  <td>Office </td>
                  <td><?php
                    if ($row['office'] == 1) {
                      echo "<span class='badge badge-success'>Tersedia</span>";
                    }
                    else {
                      echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                    }?>
                  </td>
                </tr>
                <tr>
                  <td>Antivirus</td>
                  <td><?php
                    if ($row['antivirus'] == 1) {
                      echo "<span class='badge badge-success'>Tersedia</span>";
                    }
                    else {
                      echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                    }?>
                  </td>
                </tr>
              </div>
              <?php
            }
            if ($row['nama_jenis_barang'] == "Notebook") {
              ?>
              <div>
                <tr>
                  <td>OS</td>
                  <td><?php
                    if ($row['os'] == 1) {
                      echo "<span class='badge badge-success'>Tersedia</span>";
                    }
                    else {
                      echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                    }?>
                  </td>
                </tr>
                <tr>
                  <td>Office </td>
                  <td><?php
                    if ($row['office'] == 1) {
                      echo "<span class='badge badge-success'>Tersedia</span>";
                    }
                    else {
                      echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                    }?>
                  </td>
                </tr>
                <tr>
                  <td>Antivirus</td>
                  <td><?php
                    if ($row['antivirus'] == 1) {
                      echo "<span class='badge badge-success'>Tersedia</span>";
                    }
                    else {
                      echo "<span class='badge badge-danger'>Tidak Tersedia</span>";
                    }?>
                  </td>
                </tr>
              </div>
              <?php
            }
            ?>
            <tr>
              <td>Spesifikasi</td>
    					<td><?php echo $row['spesifikasi'] ?></td>
            </tr>
            <tr>
              <td>Keterangan</td>
    					<td><?php echo $row['keterangan'] ?></td>
            </tr>
          </table>

          <h2>Pengguna dan Lokasi Barang</h2>
          <hr class="garis">
          <table class="table table-hover">
            <tr>
              <?php
              $query = "SELECT a.no_inventaris, b.nama_pengguna FROM barang a join pengguna_barang b on a.id_pengguna = b.id_pengguna WHERE a.no_inventaris = '$no_inventaris'";
                $hasil = mysqli_query($connect, $query);
                $row = mysqli_fetch_array($hasil);
              ?>
              <td style="width: 30rem;">Nama Pengguna</td>
              <td><?php echo $row['nama_pengguna'] ?></td>
            </tr>
            <tr>
              <?php
                $query = "SELECT a.no_inventaris, b.nama_divisi FROM barang a join divisi b on a.kode_divisi = b.kode_divisi WHERE a.no_inventaris = '$no_inventaris'";
    						$hasil = mysqli_query($connect, $query);
    						$row = mysqli_fetch_array($hasil);
              ?>
              <td>Divisi </td>
              <td><?php echo $row['nama_divisi'] ?></td>
            </tr>
            <tr>
              <?php
                $query = "SELECT outdoor_indoor FROM barang WHERE barang.no_inventaris = '$no_inventaris'";
                $result = mysqli_query($connect, $query);
                $row = mysqli_fetch_array($result);
              ?>
              <td>Lokasi</td>
              <td><?php
              if ($row['outdoor_indoor'] == 1) {
                echo "Indoor";
              }
              else {
                echo "Outdoor";
              }
              ?></td>
            </tr>
            <tr>
              <?php
                $query = "SELECT a.no_inventaris, b.nama_lokasi FROM barang a join lokasi b on a.kode_lokasi = b.kode_lokasi WHERE a.no_inventaris = '$no_inventaris'";
                $hasil = mysqli_query($connect, $query);
                $row = mysqli_fetch_array($hasil);
              ?>
              <td>Nama Lokasi</td>
              <td><?php echo $row['nama_lokasi'] ?></td>
            </tr>
          </table>

          <h2>History Kerusakan</h2>
          <hr class="garis">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Rusak</th>
                  <th>Tanggal Perbaikan</th>
                  <th>Harga</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $fetchKerusakanSql = "SELECT kerusakan.tgl_kerusakan, kerusakan.tgl_perbaikan, kerusakan.harga_perbaikan, kerusakan.status, kerusakan.keterangan
                FROM kerusakan WHERE no_inventaris = '$no_inventaris'";
                $fetchKerusakan = $connect->query($fetchKerusakanSql);
                if ($fetchKerusakan->num_rows > 0) {
                  while ($row = mysqli_fetch_array($fetchKerusakan)) {
                    ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo date('d F Y', strtotime($row[0] )) ?></td>
                      <td>
                        <?php
                        if ($row[1] == null) {
                          echo "";
                        }
                        else {
                          echo date('d F Y', strtotime($row[1] ));
                        } ?>
                      </td>
                      <td>Rp. <?php echo $row[2] ?></td>
                      <td><?php
                        if ($row[3] == 1) {
                          ?>
                          <span class="badge badge-success">Sudah Terbaiki</span>
                          <?php
                        }
                        else {
                          ?>
                          <span class="badge badge-danger">Dalam Perbaikan</span>
                          <?php
                        }
                      ?>
                      </td>
                      <td><?php echo $row[4] ?></td>
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

</div>
<?php require_once 'includes/footer.php'; ?>
