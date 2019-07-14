<?php require_once 'includes/header.php'; ?>
<?php
$no_inventaris = $_GET['id'];
include_once 'php_action/editBarang.php';
$fetchBarangSql = "SELECT barang.no_inventaris, barang.no_inventaris_lama, jenis_barang.nama_jenis_barang, barang.seri_barang, barang.os, barang.office, barang.antivirus, barang.outdoor_indoor, barang.spesifikasi, barang.keterangan, jenis_barang.kode_barang
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
        <i class="fa fa-eye"></i> Edit Barang</div>
      <div class="card-body">
        <div class="container">
          <div class="pull pull-right" style="padding-bottom:20px;">
            <a href="barang.php" class="btn btn-outline-danger"></i>Kembali</a>
          </div>
          <form action="editBarang.php?id=<?php echo "$no_inventaris"; ?>" method="post">
            <h2>Keterangan Barang</h2>
            <hr class="garis">
            <table class="table table-hover">
              <tr>
                <td style="width: 30rem;">No Inventaris</td>
                <td><input type="text" class="form-control" name="no_inventaris1" value="<?= $row['no_inventaris'] ?>"> </td>
              </tr>
              <tr>
                <td>Jenis Barang</td>
                <td>
                  <select class="custom-select" id="jenis_barang" onchange="cekTambahan(this);" name="jenis_barang" required>
                    <option value="<?= $row['kode_barang'] ?>" selected> <?= $row['nama_jenis_barang'] ?></option>
                    <?php
                    $fetchCategory = mysqli_query($connect, "SELECT * FROM jenis_barang");
                    if ($fetchCategory->num_rows > 0) {
                      while ($Kategori = $fetchCategory->fetch_array()) {
                        ?>
                        <option value="<?php echo $Kategori[0]; ?>"><?php echo $Kategori[1]; ?></option>
                        <?php
                      }
                    }
                     ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Seri Barang</td>
                <td><input type="text" class="form-control" name="seri_barang" value="<?= $row['seri_barang'] ?>"> </td>
              </tr>
              <?php
              if ($row['nama_jenis_barang'] == "PC") {
                ?>
                  <tr id="data_tambahan">
                    <td>OS</td>
                    <td><?php
                      if ($row['os'] == 1) {
                        ?>
                        <div class="row" style="margin: 0;">
                          <div class="custom-control custom-radio" style="padding-right: 10px;">
                            <input id="os_ya" name="os" type="radio" class="custom-control-input" checked value="1" >
                            <label class="custom-control-label" for="os_ya">Ya</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input id="os_tidak" name="os" type="radio" class="custom-control-input" value="0" >
                            <label class="custom-control-label" for="os_tidak">Tidak</label>
                          </div>
                        </div>
                        <?php
                      }
                      else {
                        ?>
                        <div class="row" style="margin: 0;">
                          <div class="custom-control custom-radio" style="padding-right: 10px;">
                            <input id="os_ya" name="os" type="radio" class="custom-control-input" value="1" >
                            <label class="custom-control-label" for="os_ya">Ya</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input id="os_tidak" name="os" type="radio" class="custom-control-input" checked value="0" >
                            <label class="custom-control-label" for="os_tidak">Tidak</label>
                          </div>
                        </div>
                        <?php
                      }?>
                    </td>
                  </tr>
                  <tr id="data_tambahan_office">
                    <td>Office </td>
                    <td><?php
                      if ($row['office'] == 1) {
                        ?>
                        <div class="row" style="margin: 0;">
                          <div class="custom-control custom-radio" style="padding-right: 10px;">
                            <input id="office_ya" name="office" type="radio" class="custom-control-input" checked value="1" >
                            <label class="custom-control-label" for="office_ya">Ya</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input id="office_tidak" name="office" type="radio" class="custom-control-input" value="0" >
                            <label class="custom-control-label" for="office_tidak">Tidak</label>
                          </div>
                        </div>
                        <?php
                      }
                      else {
                        ?>
                        <div class="row" style="margin: 0;">
                          <div class="custom-control custom-radio" style="padding-right: 10px;">
                            <input id="office_ya" name="office" type="radio" class="custom-control-input" value="1" >
                            <label class="custom-control-label" for="office_ya">Ya</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input id="office_tidak" name="office" type="radio" class="custom-control-input" checked value="0" >
                            <label class="custom-control-label" for="office_tidak">Tidak</label>
                          </div>
                        </div>
                        <?php
                      }?>
                    </td>
                  </tr>
                  <tr id="data_tambahan_antivirus">
                    <td>Antivirus</td>
                    <td><?php
                      if ($row['antivirus'] == 1) {
                        ?>
                        <div class="row" style="margin: 0;">
                          <div class="custom-control custom-radio" style="padding-right: 10px;">
                            <input id="antivirus_ya" name="antivirus" type="radio" class="custom-control-input" checked value="1" >
                            <label class="custom-control-label" for="antivirus_ya">Ya</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input id="antivirus_tidak" name="antivirus" type="radio" class="custom-control-input" value="0" >
                            <label class="custom-control-label" for="antivirus_tidak">Tidak</label>
                          </div>
                        </div>
                        <?php
                      }
                      else {
                        ?>
                        <div class="row" style="margin: 0;">
                          <div class="custom-control custom-radio" style="padding-right: 10px;">
                            <input id="antivirus_ya" name="antivirus" type="radio" class="custom-control-input" value="1" >
                            <label class="custom-control-label" for="antivirus_ya">Ya</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input id="antivirus_tidak" name="antivirus" type="radio" class="custom-control-input" checked value="0" >
                            <label class="custom-control-label" for="antivirus_tidak">Tidak</label>
                          </div>
                        </div>
                        <?php
                      }?>
                    </td>
                  </tr>
                <?php
              }
              if ($row['nama_jenis_barang'] == "Notebook") {
                ?>
                <div>
                  <tr id="data_tambahan">
                    <td>OS</td>
                    <td><?php
                      if ($row['os'] == 1) {
                        ?>
                        <div class="row" style="margin: 0;">
                          <div class="custom-control custom-radio" style="padding-right: 10px;">
                            <input id="os_ya" name="os" type="radio" class="custom-control-input" checked value="1" >
                            <label class="custom-control-label" for="os_ya">Ya</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input id="os_tidak" name="os" type="radio" class="custom-control-input" value="0" >
                            <label class="custom-control-label" for="os_tidak">Tidak</label>
                          </div>
                        </div>
                        <?php
                      }
                      else {
                        ?>
                        <div class="row" style="margin: 0;">
                          <div class="custom-control custom-radio" style="padding-right: 10px;">
                            <input id="os_ya" name="os" type="radio" class="custom-control-input" value="1" >
                            <label class="custom-control-label" for="os_ya">Ya</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input id="os_tidak" name="os" type="radio" class="custom-control-input" checked value="0" >
                            <label class="custom-control-label" for="os_tidak">Tidak</label>
                          </div>
                        </div>
                        <?php
                      }?>
                    </td>
                  </tr>
                  <tr id="data_tambahan_office">
                    <td>Office </td>
                    <td><?php
                      if ($row['office'] == 1) {
                        ?>
                        <div class="row" style="margin: 0;">
                          <div class="custom-control custom-radio" style="padding-right: 10px;">
                            <input id="office_ya" name="office" type="radio" class="custom-control-input" checked value="1" >
                            <label class="custom-control-label" for="office_ya">Ya</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input id="office_tidak" name="office" type="radio" class="custom-control-input" value="0" >
                            <label class="custom-control-label" for="office_tidak">Tidak</label>
                          </div>
                        </div>
                        <?php
                      }
                      else {
                        ?>
                        <div class="row" style="margin: 0;">
                          <div class="custom-control custom-radio" style="padding-right: 10px;">
                            <input id="office_ya" name="office" type="radio" class="custom-control-input" value="1" >
                            <label class="custom-control-label" for="office_ya">Ya</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input id="office_tidak" name="office" type="radio" class="custom-control-input" checked value="0" >
                            <label class="custom-control-label" for="office_tidak">Tidak</label>
                          </div>
                        </div>
                        <?php
                      }?>
                    </td>
                  </tr>
                  <tr id="data_tambahan_antivirus">
                    <td>Antivirus</td>
                    <td><?php
                      if ($row['antivirus'] == 1) {
                        ?>
                        <div class="row" style="margin: 0;">
                          <div class="custom-control custom-radio" style="padding-right: 10px;">
                            <input id="antivirus_ya" name="antivirus" type="radio" class="custom-control-input" checked value="1" >
                            <label class="custom-control-label" for="antivirus_ya">Ya</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input id="antivirus_tidak" name="antivirus" type="radio" class="custom-control-input" value="0" >
                            <label class="custom-control-label" for="antivirus_tidak">Tidak</label>
                          </div>
                        </div>
                        <?php
                      }
                      else {
                        ?>
                        <div class="row" style="margin: 0;">
                          <div class="custom-control custom-radio" style="padding-right: 10px;">
                            <input id="antivirus_ya" name="antivirus" type="radio" class="custom-control-input" value="1" >
                            <label class="custom-control-label" for="antivirus_ya">Ya</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input id="antivirus_tidak" name="antivirus" type="radio" class="custom-control-input" checked value="0" >
                            <label class="custom-control-label" for="antivirus_tidak">Tidak</label>
                          </div>
                        </div>
                        <?php
                      }?>
                    </td>
                  </tr>
                </div>
                <?php
              }
              ?>
              <tr>
                <td>Spesifikasi</td>
      					<td><textarea name="spesifikasi" class="form-control" placeholder="Spesifikasi" rows="8" required cols="80"><?=$row['spesifikasi'] ?></textarea></td>
              </tr>
              <tr>
                <td>Keterangan</td>
                <td><textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="8" required cols="80"><?=$row['keterangan'] ?></textarea></td>
              </tr>
            </table>

            <h2>Pengguna dan Lokasi Barang</h2>
            <hr class="garis">
            <table class="table table-hover">
              <tr id="data_tambahan_pengguna">
                <?php
                $query = "SELECT a.no_inventaris, b.id_pengguna, b.nama_pengguna FROM barang a join pengguna_barang b on a.id_pengguna = b.id_pengguna WHERE a.no_inventaris = '$no_inventaris'";
                  $hasil = mysqli_query($connect, $query);
                  $row = mysqli_fetch_array($hasil);
                ?>
                <td style="width: 30rem;">Nama Pengguna</td>
                <td>
                  <select class="custom-select" name="pengguna_barang">
                    <option value="<?=$row['id_pengguna'] ?>" selected><?=$row['nama_pengguna'] ?></option>
                    <?php
                    $fetchPengguna = mysqli_query($connect, "SELECT * FROM pengguna_barang");
                    if ($fetchPengguna->num_rows > 0) {
                      while ($penguna = $fetchPengguna->fetch_array()) {
                        ?>
                        <option value="<?php echo $penguna[0]; ?>"><?php echo $penguna[1]; ?></option>
                        <?php
                      }
                    }
                     ?>
                  </select>
                </td>
              </tr>
              <tr id="data_tambahan_divisi">
                <?php
                  $query = "SELECT a.no_inventaris, b.kode_divisi, b.nama_divisi FROM barang a join divisi b on a.kode_divisi = b.kode_divisi WHERE a.no_inventaris = '$no_inventaris'";
      						$hasil = mysqli_query($connect, $query);
      						$row = mysqli_fetch_array($hasil);
                ?>
                <td>Divisi </td>
                <td>
                  <select class="custom-select" name="divisi">
                    <option value="<?= $row['kode_divisi'] ?>" selected ><?= $row['nama_divisi'] ?></option>
                    <?php
                    $fetchDivisi = mysqli_query($connect, "SELECT * FROM divisi");
                    if ($fetchDivisi->num_rows > 0) {
                      while ($divisi = $fetchDivisi->fetch_array()) {
                        ?>
                        <option value="<?php echo $divisi[0]; ?>"><?php echo $divisi[1]; ?></option>
                        <?php
                      }
                    }
                     ?>
                  </select>
                </td>
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
                  ?>
                  <div class="row" style="margin: 0;">
                    <div class="custom-control custom-radio" style="padding-right: 10px;">
                      <input id="indoor_outdoor_ya" name="outdoor_indoor" type="radio" class="custom-control-input" checked value="1" >
                      <label class="custom-control-label" for="indoor_outdoor_ya">Indoor</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input id="indoor_outdoor_tidak" name="outdoor_indoor" type="radio" class="custom-control-input" value="0" >
                      <label class="custom-control-label" for="indoor_outdoor_tidak">Outdoor</label>
                    </div>
                  </div>
                  <?php
                }
                else {
                  ?>
                  <div class="row" style="margin: 0;">
                    <div class="custom-control custom-radio" style="padding-right: 10px;">
                      <input id="indoor_outdoor_ya" name="outdoor_indoor" type="radio" class="custom-control-input" value="1" >
                      <label class="custom-control-label" for="indoor_outdoor_ya">Indoor</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input id="indoor_outdoor_tidak" name="outdoor_indoor" type="radio" class="custom-control-input" checked value="0" >
                      <label class="custom-control-label" for="indoor_outdoor_tidak">Outdoor</label>
                    </div>
                  </div>
                  <?php
                }
                ?></td>
              </tr>
              <tr>
                <?php
                  $query = "SELECT a.no_inventaris, b.kode_lokasi, b.nama_lokasi FROM barang a join lokasi b on a.kode_lokasi = b.kode_lokasi WHERE a.no_inventaris = '$no_inventaris'";
                  $hasil = mysqli_query($connect, $query);
                  $row = mysqli_fetch_array($hasil);
                ?>
                <td>Nama Lokasi</td>
                <td>
                  <select class="custom-select" name="lokasi" required>
                    <option value="<?=$row['kode_lokasi'] ?>" selected ><?=$row['nama_lokasi'] ?></option>
                    <?php
                    $fetchlokasi = mysqli_query($connect, "SELECT * FROM lokasi");
                    if ($fetchlokasi->num_rows > 0) {
                      while ($lokasi = $fetchlokasi->fetch_array()) {
                        ?>
                        <option value="<?php echo $lokasi[0]; ?>"><?php echo $lokasi[1]; ?></option>
                        <?php
                      }
                    }
                     ?>
                  </select>
                </td>
              </tr>
              <input type="hidden" name="username" value="<?= $_SESSION['username'] ?>" readonly>
            </table>
            <div class="pull pull-right">
              <a href="barang.php" class="btn btn-outline-danger"></i>Kembali</a>
              <input type="submit" class="btn btn-success" name="editBarang" value="Simpan Data">
            </div>
          </form>

        </div>
      </div>
    </div>

  </div>

</div>

<script type="text/javascript">
  function cekTambahan(item) {
    var value = item.value;
    if (value == 1) {
      document.getElementById('data_tambahan').removeAttribute('style');
      document.getElementById('data_tambahan_office').removeAttribute('style');
      document.getElementById('data_tambahan_antivirus').removeAttribute('style');
      document.getElementById('data_tambahan_divisi').removeAttribute('style');
      document.getElementById('data_tambahan_pengguna').removeAttribute('style');
    }
    else if (value == 2) {
      document.getElementById('data_tambahan').removeAttribute('style');
      document.getElementById('data_tambahan_office').removeAttribute('style');
      document.getElementById('data_tambahan_antivirus').removeAttribute('style');
      document.getElementById('data_tambahan_divisi').removeAttribute('style');
      document.getElementById('data_tambahan_pengguna').removeAttribute('style');
    }
    else {
      document.getElementById('data_tambahan').setAttribute('style','display:none;');
      document.getElementById('data_tambahan_office').setAttribute('style','display:none;');
      document.getElementById('data_tambahan_antivirus').setAttribute('style','display:none;');
      document.getElementById('data_tambahan_divisi').setAttribute('style','display:none;');
      document.getElementById('data_tambahan_pengguna').setAttribute('style','display:none;');
    }
  }

</script>

<?php require_once 'includes/footer.php'; ?>
