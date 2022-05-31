<?php require('atas.php'); error_reporting(0); $notransaksi = $_GET['notransaksi'];
  $detail = mysqli_query($kon, "SELECT * FROM detail WHERE notransaksi = '$notransaksi' ORDER BY namainvenny ASC");
  $ongkir = mysqli_query($kon, "SELECT * FROM transaksi INNER JOIN user ON transaksi.id = user.id WHERE notransaksi = '$notransaksi'");
  $row    = mysqli_fetch_array($ongkir);  ?>
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Detail Penerima Bantuan Pembeku</h1>
            <h4>
                <p style="float: left;">Nama Petani : <?= $row['nama'] ?></p>
                <p style="float: right;">Tanggal : <?= date('d/m/Y',strtotime($row['tgl'])) ?></p>
            </h4><br><br>
                <button class="btn btn-danger" onclick="history.back()">Kembali</button>
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
                                            </tr>
                                    <?php } ?>
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
