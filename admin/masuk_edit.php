<?php require('atas.php'); $idinventorimasuk = $_GET['idinventorimasuk'];
  $query = mysqli_query($kon, "SELECT *,inventorimasuk.harga as harganya FROM inventorimasuk INNER JOIN inventori ON inventorimasuk.idinventori = inventori.idinventori INNER JOIN user ON inventorimasuk.id = user.id WHERE idinventorimasuk = '$idinventorimasuk'");
  $data = mysqli_fetch_array($query);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-primary btn-lg"><a href="masuk.php" style="color: white; text-decoration: none"> <i class="fa fa-angle-left"></i> Kembali</a></button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="datetime-local" name="tgl" class="form-control" value="<?php echo date('Y-m-d\TH:i',strtotime($data['tgl'])) ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input class="form-control" type="text" value="<?= $data['namainven'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Penjual</label>
                                <select name="id" class="form-control" required>
                                    <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
                                  <?php
                                    $bambang = mysqli_query($kon, "SELECT * FROM user WHERE level = 'Petani' ORDER BY nama ASC");
                                      while($kerjadong = mysqli_fetch_array($bambang)) {
                                        echo "<option value='$kerjadong[id]'>$kerjadong[nama]</option>";
                                      } 
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga Satuan</label>
                                <input class="form-control" name="harga" value="<?= $data['harganya'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input class="form-control" type="number" min="0" name="jumlah" value="<?= $data['jumlah'] ?>" required>
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
    $tgl       = $_REQUEST['tgl'];
    $harga     = $_REQUEST['harga'];
    $jumlah    = $_REQUEST['jumlah'];
    $id        = $_REQUEST['id'];
    $total     = $harga * $jumlah;

    $ubah = mysqli_query($kon,"UPDATE inventorimasuk SET id = '$id', harga = '$harga', tgl = '$tgl', jumlah = '$jumlah', total = '$total' WHERE idinventorimasuk = '$idinventorimasuk'");
    ?> <script>alert("Berhasil Diubah");window.location='masuk.php';</script> <?php
  }
?>