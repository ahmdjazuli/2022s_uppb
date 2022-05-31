<?php require('../kon.php'); require('../tgl_indo.php'); session_start(); 
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
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" href="../images/logo.png">
        <title>UPPB</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="css/dataTables/dataTables.responsive.css" rel="stylesheet">
        <link href="css/metisMenu.min.css" rel="stylesheet">
        <link href="css/timeline.css" rel="stylesheet">
        <link href="css/startmin.css" rel="stylesheet">
        <link href="css/morris.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/fontawesome-free/css/all.min.css">
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><img src="../images/logo.png" style="width: 40px; position: relative; bottom: 10px; float: left; margin-right: 7px;"></a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="../index.php" target="_blank"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> admin <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="profil.php"><i class="fa fa-user fa-fw"></i> Profil</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="keluar.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

<div class="navbar-default sidebar" role="navigation" style="overflow-y: scroll; height: 600px;">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="index.php"><i class="fa fa-home fa-fw"></i> Halaman Utama</a>
            </li>
            <li>
                <a href="user.php"><i class="fa fa-user fa-fw"></i> Data Pengguna</a>
            </li>
            <li>
                <a href="petani.php"><i class="fa fa-user-circle fa-fw"></i> Data Petani</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-tasks fa-fw"></i> Data Barang<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="inventori.php"><i class="fa fa-box-open fa-fw"></i> Stok Barang</a>
                    </li>
                    <li>
                        <a href="masuk.php"><i class="fa fa-shopping-basket fa-fw"></i> Barang Masuk</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="monitoring.php"><i class="fa fa-search-location fa-fw"></i> Pemantauan Daerah Kebun</a>
            </li>
            <li>
                <a href="transaksi.php"><i class="fa fa-shopping-bag fa-fw"></i> Transaksi</a>
            </li>
            <li>
                <a href="pembeku.php"><i class="fa fa-hands-helping fa-fw"></i> Bantuan Pembeku</a>
            </li>
            <li>
                <a href="pendapatan2.php"><i class="fa fa-dollar-sign fa-fw"></i> Laba Kotor Bersih</a>
            </li>
            <li>
                <a href="data_backup.php" onclick="return confirm('Yakin ingin Backup?');"><i class="fa fa-database fa-fw"></i> Backup Database</a>
            </li>
            <li>
                <a href="data_restore.php"><i class="fa fa-sync-alt fa-fw"></i> Restore Database</a>
            </li>
        </ul>
    </div>
</div>
</nav>