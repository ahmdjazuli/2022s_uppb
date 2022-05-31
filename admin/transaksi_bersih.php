<?php 
	session_start();
	unset($_SESSION['keranjang']);
	?><script>window.location = 'transaksi_input.php';</script><?php
?>