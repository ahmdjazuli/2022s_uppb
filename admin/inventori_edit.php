<?php require('atas.php'); $idinventori = $_GET['idinventori'];
  $query = mysqli_query($kon, "SELECT * FROM inventori WHERE idinventori = '$idinventori'");
  $data = mysqli_fetch_array($query);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-primary btn-lg"><a href="inventori.php" style="color: white; text-decoration: none"> <i class="fa fa-angle-left"></i> Kembali</a></button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input class="form-control" type="text" name="namainven" value="<?= $data['namainven'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <input class="form-control" type="number" name="harga" value="<?= $data['harga'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Berat/Satuan</label>
                                <input class="form-control" name="satuan" value="<?= $data['satuan'] ?>" required>
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
    $namainven = $_REQUEST['namainven'];
    $satuan     = $_REQUEST['satuan'];
    $harga     = $_REQUEST['harga'];

    $ubah = mysqli_query($kon,"UPDATE inventori SET harga = '$harga', satuan = '$satuan', namainven = '$namainven'WHERE idinventori = '$idinventori'");
    if($ubah){
      ?> <script>alert("Berhasil Diubah");window.location='inventori.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Diubah");window.location='inventori.php';</script> <?php
    }
  }
?>