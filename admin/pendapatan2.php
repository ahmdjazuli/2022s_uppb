<?php require('atas.php'); error_reporting(0); ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-sm" style="margin:0 auto">
           <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Cetak</h4>
            </div>
            <div class="modal-body">
                <form action="../report/laporanPendapatan2.php" target="_blank" method="post">
                <label>Bulan</label>
                <select name="bulan" class="form-control">
                  <option value="">Pilih</option>
                  <?php
                    $ahay = mysqli_query($kon, "SELECT DISTINCT MONTH(tgl) as bulan FROM transaksi WHERE konfirmasi != '' ORDER BY bulan ASC");
                    while($baris = mysqli_fetch_array($ahay)) {
                    $bulan = $baris['bulan']; 
                      if($bulan == 1){ $namabulan = "Januari";
                        }else if($bulan == 2){ $namabulan = "Februari";
                        }else if($bulan == 3){ $namabulan = "Maret";
                        }else if($bulan == 4){ $namabulan = "April";
                        }else if($bulan == 5){ $namabulan = "Mei";
                        }else if($bulan == 6){ $namabulan = "Juni";
                        }else if($bulan == 7){ $namabulan = "Juli";
                        }else if($bulan == 8){ $namabulan = "Agustus";
                        }else if($bulan == 9){ $namabulan = "September";
                        }else if($bulan == 10){ $namabulan = "Oktober";
                        }else if($bulan == 11){ $namabulan = "November";
                        }else if($bulan == 12){ $namabulan = "Desember";
                        } ?><option value="<?= $baris['bulan'] ?>"><?= $namabulan; ?></option> 
                      }
                    <?php } ?>
                </select><br>
                <label>Tahun</label>
                <select name="tahun" class="form-control" required>
                  <?php
                    $ahay = mysqli_query($kon, "SELECT DISTINCT YEAR(tgl) as tahun FROM transaksi WHERE konfirmasi != '' ORDER BY tahun DESC");
                    while($baris = mysqli_fetch_array($ahay)) {
                        ?><option value="<?= $baris['tahun'] ?>"><?= $baris['tahun']; ?></option> 
                    <?php } ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i></button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"> Cetak Data Laba </button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTables-example">
                                <thead class="success">
                                    <tr>
                                        <th>No</th>
                                        <th>Hari</th>
                                        <th>Penjualan</th>
                                        <th>Pembelian Bahan Pokok</th>
                                        <th>Laba Bersih</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php 
                      $no = 1;
                      $query = mysqli_query($kon, "SELECT tgl, DATE(tgl) as hari FROM transaksi WHERE konfirmasi != '' GROUP BY hari ORDER BY hari DESC");
                      while($data = mysqli_fetch_array($query)){
                        $hari = $data['hari'];
                        $transaksi = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi WHERE DATE(tgl) = '$hari' AND konfirmasi != ''"));
                        $inventorimasuk = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM inventorimasuk WHERE DATE(tgl) = '$hari'"));
                        $gaji = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM gaji WHERE DATE(tgl) = '$hari'"));
                        ?>
                          <tr>
                          <td><?= $no++ ?></td> 
                          <td><?= tgl_indo($hari) ?></td>
                          <td>Rp. <?= number_format($transaksi['total'],0,'.','.') ?></td>
                          <td>Rp. <?= number_format($inventorimasuk['total'],0,'.','.') ?></td>
                          <td>Rp. <?= number_format($transaksi['total']-($pengeluaran['total']+$inventorimasuk['total']),0,'.','.') ?></td>
                        <?php 
                      }
                    ?>
                  </tbody>
                            </table>
                        </div>
                                    
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
</div>
<!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php require('bawah.php') ?>
