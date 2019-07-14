<?php

$fetchBrandSql = "SELECT COUNT(kode_barang) FROM jenis_barang";
$resultBrandQuery = $connect->query($fetchBrandSql);

if ($resultBrandQuery->num_rows == 1) {
  if ($rowBrand = $resultBrandQuery->fetch_array()) {
    $jumlahBrand = $rowBrand['0'];
  }
}

$fetchProductSql = "SELECT COUNT(no_inventaris) FROM barang";
$resultProductQuery = $connect->query($fetchProductSql);

if ($resultProductQuery->num_rows == 1) {
  if ($rowProduct = $resultProductQuery->fetch_array()) {
    $jumlahProduct = $rowProduct['0'];
  }
}

$fetchCategorySql = "SELECT COUNT(no_inventaris) FROM barang WHERE status = 99";
$resultCategoryQuery = $connect->query($fetchCategorySql);

if ($resultCategoryQuery->num_rows == 1) {
  if ($rowCategory = $resultCategoryQuery->fetch_array()) {
    $jumlahCategory = $rowCategory['0'];
  }
}

$fetchProductRusakSql = "SELECT COUNT(no_inventaris) FROM barang WHERE status = 0";
$resultProductRusakQuery = $connect->query($fetchProductRusakSql);

if ($resultProductRusakQuery->num_rows == 1) {
  if ($rowProductRusak = $resultProductRusakQuery->fetch_array()) {
    $jumlahProductRusak = $rowProductRusak['0'];
  }
}

 ?>
