<html>
<head>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body onLoad="window.print();">
<?php
  include_once 'php_action/db_connect.php';
?>
   <style type="text/css">
body {
	font-size:12px;
	font-family:Arial, Helvetica, sans-serif;
}
.style1{
	font-size:12px;
	font-family:Arial, Helvetica, sans-serif;
}
</style>
  <h1 align="center">LAPORAN DATA KERUSAKAN</h1>
  <div class="container">
    <table class="table table-bordered" id="DataTables" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th style="width:5px">No</th>
          <th>No Kerusakan</th>
          <th>No Inventaris</th>
          <th>Tanggal Kerusakan</th>
          <th>Seri Barang</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $fetchBarang = mysqli_query($connect, "SELECT kerusakan.no_kerusakan, barang.no_inventaris, kerusakan.tgl_kerusakan, barang.seri_barang, kerusakan.status, kerusakan.keterangan, kerusakan.tgl_perbaikan, kerusakan.harga_perbaikan
        FROM kerusakan INNER JOIN barang ON kerusakan.no_inventaris = barang.no_inventaris");
        if ($fetchBarang->num_rows > 0) {
          $no = 1;
          while ($rowKerusakan = $fetchBarang->fetch_array()) {
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $rowKerusakan[0]; ?></td>
              <td><?php echo $rowKerusakan[1]; ?></td>
              <td><?php echo date('d F Y', strtotime($rowKerusakan[2]));?></td>
              <td><?php echo $rowKerusakan[3]; ?></td>
              <td><?php
              if ($rowKerusakan[4] == 1) {
                echo "<span class='badge badge-success'>Aktif</span>";
              }
              else {
                echo "<span class='badge badge-danger'>Tidak Aktif</span>";
              } ?></td>
            </tr>
            <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
