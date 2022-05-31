<?php 
	session_start();
	$idjenis = $_GET['idjenis'];
	unset($_SESSION['keranjang'][$idjenis]);

	?><script>alert('Jenis Laundry dihapus dari Daftar Pesanan!');
	window.location = 'transaksi_input.php';</script><?php
?>