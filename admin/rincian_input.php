<?php require('atas.php') ?>
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
                         <form action="" method="POST">
                            <div class="form-group">
                                <label>Nama Pemantauan Daerah Kebun</label>
                                <select name="idmonitoring" class="form-control" required>
                                    <option disabled selected>Pilih</option>
                                  <?php
                                    $bambang = mysqli_query($kon, "SELECT * FROM monitoring ORDER BY tgl DESC");
                                      while($d = mysqli_fetch_array($bambang)) { ?>
                                        <option value='<?= $d['idmonitoring'] ?>'><?= '('.date('d/m/Y H:i',strtotime($d['tgl'])).') '.$d['ket']; ?></option>";
                                      <?php } 
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Pohon</label>
                                <input class="form-control" type="number" name="jumlahpohon" required>
                            </div>
                            <div class="form-group">
                                <label>Usia Pohon</label>
                                <input class="form-control" type="number" name="usiapohon" required>
                            </div>
                            <div class="form-group">
                                <label>Pupuk</label>
                                <input type="text" name="pupuk" list="option" class="form-control" required>
                                  <datalist id="option">
                                    <option value="Urea">Urea</option>
                                    <option value="SP-36">SP-36</option>
                                    <option value="KCI">KCI</option>
                                    <option value="Kieserit/Dolomit">Kieserit/Dolomit</option>
                                  </datalist>
                            </div>
                            <button type="submit" name="simpan" class="btn btn-outline btn-primary"><i class="fa fa-check-square"></i> Simpan</button>
                            <button type="reset" class="btn btn-outline btn-default"><i class="fa fa-refresh"></i> Ulangi</button>
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
    $idmonitoring = $_REQUEST['idmonitoring'];
    $pupuk        = $_REQUEST['pupuk'];
    $usiapohon    = $_REQUEST['usiapohon'];
        
    $hasil = mysqli_query($kon,"INSERT INTO rincian (jumlahpohon,idmonitoring,pupuk,usiapohon) VALUES ('$jumlahpohon','$idmonitoring','$pupuk','$usiapohon')");

    if($hasil){
      ?> <script>alert('Berhasil Disimpan!'); window.location = 'rincian.php';</script><?php
    }else{
      ?> <script>alert('Gagal, cek kembali!.'); window.location = 'rincian_input.php';</script><?php
    }
  }
?>