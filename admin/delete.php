<?php
	error_reporting(0);
	require_once("../kon.php");
	?> <script>alert('Berhasil Dihapus');</script> <?php
	// pengguna
	if (isset($_GET['id']) AND $_GET['level'] == 'user') {
		mysqli_query($kon, "DELETE FROM user WHERE id='$_REQUEST[id]'");
		?> <script>window.location='user.php';</script> <?php
	// petani
	}else if (isset($_GET['id']) AND $_GET['level'] == 'petani') {
		mysqli_query($kon, "DELETE FROM user WHERE id='$_REQUEST[id]'");
		?> <script>window.location='petani.php';</script> <?php
	// inventori
	}else if (isset($_GET['idinventori'])) {
		mysqli_query($kon, "DELETE FROM inventori WHERE idinventori='$_REQUEST[idinventori]'");
		?> <script>window.location='inventori.php';</script> <?php
	// masuk
	}else if (isset($_GET['idinventorimasuk'])) {
		mysqli_query($kon, "DELETE FROM inventorimasuk WHERE idinventorimasuk='$_REQUEST[idinventorimasuk]'");
		?> <script>window.location='masuk.php';</script> <?php
	// transaksi
	}else if (isset($_GET['notransaksi']) AND $_GET['level'] == 'transaksi') {
		mysqli_query($kon, "DELETE FROM detail WHERE notransaksi='$_REQUEST[notransaksi]'");
		mysqli_query($kon, "DELETE FROM transaksi WHERE notransaksi='$_REQUEST[notransaksi]'");
		?> <script>window.location='transaksi.php';</script> <?php
	// pembeku
	}else if (isset($_GET['notransaksi']) AND $_GET['level'] == 'pembeku') {
		mysqli_query($kon, "DELETE FROM detail WHERE notransaksi='$_REQUEST[notransaksi]'");
		mysqli_query($kon, "DELETE FROM transaksi WHERE notransaksi='$_REQUEST[notransaksi]'");
		?> <script>window.location='pembeku.php';</script> <?php
	// monitoring
	}else if (isset($_GET['idmonitoring'])) {
		mysqli_query($kon, "DELETE FROM monitoring WHERE idmonitoring='$_REQUEST[idmonitoring]'");
		?> <script>window.location='monitoring.php';</script> <?php
	}
?>