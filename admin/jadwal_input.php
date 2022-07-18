<?php require('atas.php') ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-primary btn-lg"><a href="jadwal.php" style="color: white; text-decoration: none"> <i class="fa fa-angle-left"></i> Kembali</a></button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tgl" class="form-control" value="<?php echo date('Y-m-d') ?>" required>
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
                            <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-check-square"></i> Simpan</button>
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
    $id       = $_REQUEST['id'];
    $tgl      = $_REQUEST['tgl'];

    $tambah = mysqli_query($kon,"INSERT INTO jadwal(id,tgl) VALUES ('$id','$tgl')");
    if($tambah){
      ?> <script>alert("Berhasil Disimpan");window.location='jadwal.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Disimpan");window.location='jadwal_input.php';</script> <?php
    }
  }
?>