<?php 
	require('../tgl_indo.php');
	if($bulan == 1){ $namabulan = "Januari"; }else if($bulan == 2){ $namabulan = "Februari"; }else if($bulan == 3){ $namabulan = "Maret"; }else if($bulan == 4){ $namabulan = "April"; }else if($bulan == 5){ $namabulan = "Mei"; }else if($bulan == 6){ $namabulan = "Juni"; }else if($bulan == 7){ $namabulan = "Juli"; }else if($bulan == 8){ $namabulan = "Agustus"; }else if($bulan == 9){ $namabulan = "September"; }else if($bulan == 10){ $namabulan = "Oktober"; }else if($bulan == 11){ $namabulan = "November"; }else if($bulan == 12){ $namabulan = "Desember"; 
	};
if(mysqli_num_rows($result)==0){
    $lokasi = htmlspecialchars($_SERVER['HTTP_REFERER']);
    ?> <script>alert('Data Tidak Ditemukan');window.location = '<?= $lokasi ?>';</script> <?php
 }

$kode = 'localhost'.htmlspecialchars($_SERVER['REQUEST_URI']);
require_once('../phpqrcode/qrlib.php');
?>
<!DOCTYPE html>
<html lang="id, in">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../admin/css/bootstrap.min.css">
  	<link rel="icon" type="image/png" href="../images/logo.png">
    <title>UPPB</title>
	<style>
		hr{ border: 2px; border-style: solid; width: 82%; } .wew{ margin-right: 15%; } .wow{ margin-left: 9%; float: left } #kiri{width: 80%; height: 100px; float:left; font-weight: normal; } #kanan{width: 20%; height: 100px; float:right; font-weight: normal; } th{text-align:center;}
	</style>
	<style type="text/css" media="print"> @page { size: landscape; } </style>
</head>
<body>
<div class="container-fluid"><br>
	<img src="../images/logo.png" style="width: 70px;" class="float-left wow">
	<p class="text-center wew"><b>
		<font size="6"><span  style="color:#2c3e50">UPPB "BINA USAHA BERSAMA"</span></font>
		<br>
		<span style="font-weight: 400;">DESA SIMPANG EMPAT KECAMATAN SIMPANG EMPAT KABUPATEN BANJAR</span>
		<br>
	</p>
	<hr>
</div>