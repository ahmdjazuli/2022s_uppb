<?php require('atas.php') ?>
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
                                <input class="form-control" type="text" placeholder="(Nama - Kualitas) Contoh : Getah Karet Cair - A" name="namainven" required>
                            </div>
                            <div class="form-group">
                                <label>Berat/Satuan</label>
                                <input class="form-control" type="text" placeholder="300/liter" name="satuan" required>
                            </div>
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <input class="form-control" type="number" name="harga" required>
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
    $satuan    = $_REQUEST['satuan'];
    $namainven = $_REQUEST['namainven'];
    $harga     = $_REQUEST['harga'];

    $tambah = mysqli_query($kon,"INSERT INTO inventori(satuan,namainven,stok,harga) VALUES ('$satuan','$namainven',0,'$harga')");
    if($tambah){
      ?> <script>alert("Berhasil Disimpan");window.location='inventori.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Disimpan");window.location='inventori_input.php';</script> <?php
    }
  }
?>