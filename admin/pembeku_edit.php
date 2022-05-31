<?php require('atas.php'); $notransaksi = $_GET['notransaksi'];
  $query = mysqli_query($kon, "SELECT * FROM transaksi INNER JOIN user ON transaksi.id = user.id WHERE notransaksi = '$notransaksi'");
  $data = mysqli_fetch_array($query);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-primary btn-lg"><a href="pembeku.php" style="color: white; text-decoration: none"> <i class="fa fa-angle-left"></i> Kembali</a></button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label>No. Transaksi - Pelanggan</label>
                                <input class="form-control" type="text" value="<?= $data['notransaksi'].' - '.$data['nama'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Catatan</label>
                                <textarea class="form-control" name="catatan" style="height: 105px;"><?= $data['catatan'] ?></textarea>
                            </div>
                            <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-check-square"></i> Ubah</button>
                            <button type="reset" class="btn btn-primary"><i class="fa fa-refresh"></i> Ulangi</button>
                        </form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php require('bawah.php') ?>
<?php
  if (isset($_POST['simpan'])) {
    $catatan     = $_REQUEST['catatan'];

    $ubah = mysqli_query($kon,"UPDATE transaksi SET catatan = '$catatan' WHERE notransaksi = '$notransaksi'");
    ?> <script>alert("Berhasil Diubah");window.location='pembeku.php';</script> <?php
  }
?>