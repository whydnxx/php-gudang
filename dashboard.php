<?php require_once 'includes/header.php'; ?>
<?php
include_once 'php_action/fetchDashboard.php';
 ?>
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
      </li>
    </ol>
    <hr>
    <h1 class="text-center"><span class="badge badge-success">Selamat Datang Kembali <?php echo $_SESSION['user_name']; ?></span></h1>
    <hr>
    <!-- Icon Cards-->
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-btc"></i>
            </div>
            <div class="mr-5"><?php
            if ($jumlahBrand == 0) {
              echo "0";
            }
            else {
              echo $jumlahBrand;
            }
             ?> Total Jenis Barang</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="brands.php">
            <span class="float-left">Lihat Data</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-shopping-cart"></i>
            </div>
            <div class="mr-5"><?php
            if ($jumlahProduct == 0) {
              echo "0";
            }
            else {
              echo $jumlahProduct;
            }
             ?> Total Barang</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="products.php">
            <span class="float-left">Lihat Data</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-warning o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-shopping-cart"></i>
            </div>
            <div class="mr-5"><?php
            if ($jumlahCategory == 0) {
              echo "0";
            }
            else {
              echo $jumlahCategory;
            }
             ?> Total Barang Rusak</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="categories.php">
            <span class="float-left">Lihat Data</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-support"></i>
            </div>
            <div class="mr-5"><?php
            if ($jumlahProductRusak == 0) {
              echo "0";
            }
            else {
              echo $jumlahProductRusak;
            }
             ?> Produk Dalam Perbaikan</div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="products.php">
            <span class="float-left">Lihat Data</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
    </div>
    <!-- Example DataTables Card-->
    
  </div>

<?php require_once 'includes/footer.php'; ?>
