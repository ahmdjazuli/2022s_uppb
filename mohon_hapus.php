<?php 
	session_start();
	$idinventori = $_GET['idinventori'];
	unset($_SESSION['keranjang'][$idinventori]);
	?><script> window.location = 'mohon_input.php';</script><?php
?>