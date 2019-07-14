<?php
require_once 'php_action/core.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invetory Management System</title>
    <!-- Bootstrap core CSS-->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="assets/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="assets/custom/custom.css" rel="stylesheet">

  </head>
  <body class="fixed-nav sticky-footer bg-dark">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="index.html">Invetory Management System</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="dashboard.php">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Jenis Barang">
            <a class="nav-link" href="jenis_barang.php">
              <i class="fa fa-fw fa-comments"></i>
              <span class="nav-link-text">Jenis Barang</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Barang">
            <a class="nav-link" href="barang.php">
              <i class="fa fa-fw fa-btc"></i>
              <span class="nav-link-text">Barang</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Kerusakan">
            <a class="nav-link" href="kerusakan.php">
              <i class="fa fa-fw fa-facebook"></i>
              <span class="nav-link-text">Kerusakan</span>
            </a>
          </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Produk">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseOrders1" data-parent="#exampleAccordion1">
              <i class="fa fa-fw fa-wrench"></i>
              <span class="nav-link-text">Setting</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseOrders1">
              <li>
                <a href="setting.php"><i class="fa fa-fw fa-edit"></i> Edit Data</a>
              </li>
              <?php
                if ($_SESSION['role_level'] != 'operator') {
                  ?>
                  <li>
                    <a href="tambahOperator.php"><i class="fa fa-plus fa-fw"></i> Tambah Operator</a>
                  </li>
                  <?php
                }
              ?>
            </ul>
          </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-fw fa-sign-out"></i>Logout</a>
          </li>
        </ul>
      </div>
    </nav>
