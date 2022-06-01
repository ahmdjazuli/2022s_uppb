<?php require('atas.php'); $idrincian = $_GET['idrincian'];
  $query = mysqli_query($kon, "SELECT * FROM rincian INNER JOIN monitoring ON rincian.idmonitoring = monitoring.idmonitoring WHERE idrincian = '$idrincian'");
  $data = mysqli_fetch_array($query);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-primary btn-lg"><a href="rincian.php" style="color: white; text-decoration: none"> <i class="fa fa-angle-left"></i> Kembali</a></button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label>Nama Pemantauan Daerah Kebun</label>
                                <textarea class="form-control" rows="3" readonly><?= '('.date('d/m/Y H:i',strtotime($data['tgl'])).') '.$data['ket']; ?> </textarea>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Pohon</label>
                                <input class="form-control" type="number" value="<?= $data['jumlahpohon'] ?>" name="jumlahpohon" required>
                            </div>
                            <div class="form-group">
                                <label>Usia Pohon</label>
                                <input class="form-control" type="number" value="<?= $data['usiapohon'] ?>" name="usiapohon" required>
                            </div>
                            <div class="form-group">
                                <label>Pupuk</label>
                                <input type="text" name="pupuk" list="option" value="<?= $data['pupuk'] ?>" class="form-control" required>
                                  <datalist id="option">
                                    <option value="Urea">Urea</option>
                                    <option value="SP-36">SP-36</option>
                                    <option value="KCI">KCI</option>
                                    <option value="Kieserit/Dolomit">Kieserit/Dolomit</option>
                                  </datalist>
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
    $jumlahpohon  = $_REQUEST['jumlahpohon'];
    $pupuk        = $_REQUEST['pupuk'];
    $usiapohon    = $_REQUEST['usiapohon'];

    $ubah = mysqli_query($kon,"UPDATE rincian SET jumlahpohon = '$jumlahpohon', pupuk = '$pupuk', usiapohon = '$usiapohon' WHERE idrincian = '$idrincian'");
    ?> <script>alert("Berhasil Diubah");window.location='rincian.php';</script> <?php
  }
?>