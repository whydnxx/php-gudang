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
  <h1 align="center">LAPORAN DATA BARANG</h1>
  <div class="container">
    <table class="table table-bordered" id="DataTables" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th style="width:5px">No</th>
          <th>No Inventaris</th>
          <th>Jenis Barang</th>
          <th>Seri Barang</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $fetchBarang = mysqli_query($connect, "SELECT barang.no_inventaris, jenis_barang.nama_jenis_barang, barang.seri_barang, barang.status
        FROM barang
        INNER JOIN jenis_barang ON barang.kode_barang = jenis_barang.kode_barang");
        if ($fetchBarang->num_rows > 0) {
          $no = 1;
          while ($rowProduct = $fetchBarang->fetch_array()) {
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $rowProduct[0]; ?></td>
              <td><?php echo $rowProduct[1]; ?></td>
              <td><?php echo $rowProduct[2]; ?></td>
              <td><?php
              if ($rowProduct[3] == 1) {
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
