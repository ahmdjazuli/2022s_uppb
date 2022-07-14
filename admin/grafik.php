<?php require('atas.php'); ?>

<div id="page-wrapper">
    <div class="container-fluid">
        <br>
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
    </div>
    <!-- /.container-fluid -->
</div>
<?php require 'data.php'; ?>
<script>window.print();</script>