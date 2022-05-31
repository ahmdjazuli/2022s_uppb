<?php 
	session_start();
	$idinventori = $_GET['idinventori'];
	unset($_SESSION['keranjang'][$idinventori]);
	?><script> window.location = 'pembeku_input.php';</script><?php
?>