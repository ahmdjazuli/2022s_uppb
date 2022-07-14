<?php require('atas.php'); error_reporting(0); $notransaksi = $_GET['notransaksi'];
  $detail = mysqli_query($kon, "SELECT * FROM detail WHERE notransaksi = '$notransaksi' ORDER BY namainvenny ASC");
  $ongkir = mysqli_query($kon, "SELECT * FROM transaksi WHERE notransaksi = '$notransaksi'");
  $row    = mysqli_fetch_array($ongkir);  ?>
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Detail/No. Penjualan : <?= $notransaksi ?></h3>
            <button class="btn btn-danger" onclick="history.back()">Kembali</button>
            <button class="btn btn-primary"><a style="color:white; text-decoration: none;" href="../report/cetaknota.php?notransaksi=<?= $notransaksi ?>" target="_blank">Cetak Nota</a></button>
        </div>
    </div><br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTables-example">
                            <thead class="success">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Berat/Satuan</th>
                                    <th>Jumlah</th>
                                    <th>Harga (Rp)</th>
                                    <th>Sub Harga (Rp)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1;;
                                    while($data = mysqli_fetch_array($detail)){ ?>
                                        <tr class="odd gradeX">
                                                <td><?= $no++; ?></td>
                                                <td><?= $data['namainvenny'] ?></td>
                                                <td><?= $data['satuanny'] ?></td>
                                                <td><?= $data['jumlah'] ?></td>
                                                <td><?= number_format($data['hargany'],0,'.','.')  ?></td>
                                                <td><?= number_format($data['subharga'],0,'.','.')  ?></td>
                                            </tr>
                                    <?php } ?>
                                <tr class="bg-primary">
                                    <td colspan="5" class="text-right">Total Pembayaran</td>
                                    <td><?= number_format($row['total'],0,'.','.')  ?></td>
                                </tr>
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
<!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php require('bawah.php') ?>
