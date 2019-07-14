<div class="modal fade" id="tambahBarang" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" action="barang.php" method="post">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fa fa-plus fa-fw"></i>Tambah Brang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" name="no_inventaris" placeholder="Nomor Invetaris" autocomplete="off" required>
          </div>
          <div class="form-group">
            <select class="custom-select" id="jenis_barang" onchange="cekTambahan(this);" name="jenis_barang" required>
              <option value="" selected disabled>- Pilih Jenis Barang -</option>
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
          </div>
          <div class="row" id="data_tambahan" style="display:none;">
            <div class="col-md-5">
              <p>Operating System :</p>
              <div class="d-block my-3">
                <div class="custom-control custom-radio">
                  <input id="os_ya" name="os" type="radio" class="custom-control-input" value="1" >
                  <label class="custom-control-label" for="os_ya">Ya</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="os_tidak" name="os" type="radio" class="custom-control-input" value="0" >
                  <label class="custom-control-label" for="os_tidak">Tidak</label>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <p>Office :</p>
              <div class="d-block my-3">
                <div class="custom-control custom-radio">
                  <input id="office_ya" name="office" type="radio" class="custom-control-input" value="1" >
                  <label class="custom-control-label" for="office_ya">Ya</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="office_tidak" name="office" type="radio" class="custom-control-input" value="0" >
                  <label class="custom-control-label" for="office_tidak">Tidak</label>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <p>Antivirus :</p>
              <div class="d-block my-3">
                <div class="custom-control custom-radio">
                  <input id="antivirus_ya" name="antivirus" type="radio" class="custom-control-input" value="1" >
                  <label class="custom-control-label" for="antivirus_ya">Ya</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="antivirus_tidak" name="antivirus" type="radio" class="custom-control-input" value="0" >
                  <label class="custom-control-label" for="antivirus_tidak">Tidak</label>
                </div>
              </div>
            </div>
          </div>
          <p>Indoor atau Outdoor :</p>
          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input id="indoor_outdoor_ya" name="indoor_outdoor" type="radio" class="custom-control-input" value="1" >
              <label class="custom-control-label" for="indoor_outdoor_ya">Indoor</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="indoor_outdoor_tidak" name="indoor_outdoor" type="radio" class="custom-control-input" value="0" >
              <label class="custom-control-label" for="indoor_outdoor_tidak">Outdoor</label>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="seri_barang" placeholder="Seri Barang" autocomplete="off" required>
          </div>
          <div class="form-group">
            <textarea name="spesifikasi" class="form-control" placeholder="Spesifikasi" rows="8" required cols="80"></textarea>
          </div>
          <div class="form-group">
            <select class="custom-select" name="lokasi" required>
              <option value="" selected disabled>- Pilih Lokasi -</option>
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
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control" name="username" placeholder="Nama Pengguna" value="<?php echo $_SESSION['username']; ?>">
          </div>
          <div class="form-group" id="data_tambahan_pengguna" style="display:none;">
            <select class="custom-select" name="pengguna_barang">
              <option value="" selected disabled>Pengguna Barang</option>
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
          </div>
          <div class="form-group" id="data_tambahan_divisi" style="display:none;">
            <select class="custom-select" name="divisi">
              <option value="" selected disabled>- Pilih Divisi -</option>
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
          </div>
          <div class="form-group">
            <textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="8" required cols="80"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-outline-dark" name="tambahBarang" autocomplete="off">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>
 </div>
