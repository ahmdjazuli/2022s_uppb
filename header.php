<?php require('kon.php');session_start(); error_reporting(0);
    $level  = $_SESSION['level'];
    $username   = $_SESSION['username'];
    $query      = mysqli_query($kon,"SELECT * FROM user WHERE level='$level' AND username = '$username'");
    $memori       = mysqli_fetch_array($query);
    $_SESSION['id'] = $memori['id'];
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>UPPB</title>
      <link rel="icon" type="image/png" href="images/logo.png">
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/responsive.css">
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <link rel="stylesheet" href="css/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <!-- body -->
   <body class="main-layout">
	<!-- header section start -->
	<div class="header_section">
		<div class="container">
			<div class="row">
				<div class="col-sm-1">
					<div class="logo"><a href="index.php"><img src="images/logo.png" width="80px"></a></div>
				</div>
				<div class="col-sm-11">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                           <?php if($memori['level']=='Pelanggan'){ ?>
                              <a class="nav-item nav-link" href="daftar.php">Daftar Barang</a>
                              <a class="nav-item nav-link" href="mohon.php">Transaksi</a>
                              <a class="nav-item nav-link" href="profil.php?id=<?=$memori['id'] ?>">Profil</a>
                              <a class="nav-item nav-link" href="keluar.php">Keluar</a>
                           <?php }else if($memori['level']=='Petani'){ ?>
                              <a class="nav-item nav-link" href="pembeku.php">Riwayat Penerima Bantuan Pembeku</a>
                              <a class="nav-item nav-link" href="profil.php?id=<?=$memori['id'] ?>">Profil</a>
                              <a class="nav-item nav-link" href="keluar.php">Keluar</a>
                           <?php }else{ ?>
                           <a class="nav-item nav-link" href="daftar.php">Daftar Barang</a>
                           <a class="nav-item nav-link" href="lokasi.php">Lokasi</a>
                           <a class="nav-item nav-link" href="masuk.php">Masuk</a>
                           <?php } ?>
                        </div>
                    </div>
                    </nav>
				</div>
			</div>
		</div>