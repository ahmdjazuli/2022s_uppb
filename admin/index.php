<?php require('atas.php'); 
    $rincian = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM rincian"));
    $masuk = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM inventorimasuk"));
    $petani = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM user WHERE level ='Petani'"));
    $transaksi = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM transaksi WHERE konfirmasi !=''"));
    $pembeku = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM transaksi WHERE konfirmasi =''"));
    $laba  = mysqli_num_rows(mysqli_query($kon, "SELECT tgl, DATE(tgl) as hari FROM transaksi GROUP BY hari ORDER BY hari ASC"));
    $monitoring  = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM monitoring INNER JOIN user ON monitoring.id = user.id"));
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Laporan/Report (8)</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="col-lg-12 col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Grafik Pendapatan
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <canvas id="statistik" height="225"></canvas>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-user-circle"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $petani ?></span>
                    </div>
                    <div class="options">
                        <a href="petani.php" class="btn btn-danger btn-md">Petani</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-shopping-basket"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $masuk ?></span>
                    </div>
                    <div class="options">
                        <a href="masuk.php" class="btn btn-danger btn-md">Barang Masuk</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-search-location"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $monitoring ?></span>
                    </div>
                    <div class="options">
                        <a href="monitoring.php" class="btn btn-danger btn-md">Pemantauan Daerah Kebun</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-search"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $rincian ?></span>
                    </div>
                    <div class="options">
                        <a href="rincian.php" class="btn btn-danger btn-md">Rincian Pemantauan</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-shopping-bag"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $transaksi ?></span>
                    </div>
                    <div class="options">
                        <a href="transaksi.php" class="btn btn-danger btn-md">Transaksi</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-hands-helping"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $pembeku ?></span>
                    </div>
                    <div class="options">
                        <a href="pembeku.php" class="btn btn-danger btn-md">Bantuan Pembeku</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="hero-widget well well-sm">
                    <div class="icon">
                        <i class="fa fa-dollar-sign"></i>
                    </div>
                    <div class="text">
                        <span class="value"><?= $laba ?></span>
                    </div>
                    <div class="options">
                        <a href="pendapatan2.php" class="btn btn-danger btn-md">Laba Kotor Bersih</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<?php require 'data.php'; ?>