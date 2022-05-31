<?php require('atas.php') ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-primary btn-lg"><a href="monitoring.php" style="color: white; text-decoration: none"> <i class="fa fa-angle-left"></i> Kembali</a></button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form action="" method="POST">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="datetime-local" name="tgl" class="form-control" value="<?php echo date('Y-m-d\TH:i') ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Petani</label>
                                <select name="id" class="form-control" required>
                                    <option disabled selected>Pilih</option>
                                  <?php
                                    $bambang = mysqli_query($kon, "SELECT * FROM user WHERE level = 'Petani' ORDER BY nama ASC");
                                      while($kerjadong = mysqli_fetch_array($bambang)) {
                                        echo "<option value='$kerjadong[id]'>$kerjadong[nama]</option>";
                                      } 
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Lokasi</label>
                                <input class="form-control" type="text" name="lokasi" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input class="form-control" type="text" name="ket" required>
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
    $tgl    = $_REQUEST['tgl'];
    $lokasi = $_REQUEST['lokasi'];
    $id     = $_REQUEST['id'];
    $ket    = $_REQUEST['ket'];
        
    $hasil = mysqli_query($kon,"INSERT INTO monitoring (tgl,lokasi,id,ket) VALUES ('$tgl','$lokasi','$id','$ket')");

    if($hasil){
      ?> <script>alert('Berhasil Disimpan!'); window.location = 'monitoring.php';</script><?php
    }else{
      ?> <script>alert('Gagal, cek kembali!.'); window.location = 'monitoring_input.php';</script><?php
    }
  }
?>