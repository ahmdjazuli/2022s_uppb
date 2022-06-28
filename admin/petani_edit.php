<?php require('atas.php'); $id = $_GET['id'];
  $query = mysqli_query($kon, "SELECT * FROM user WHERE id = '$id'");
  $data = mysqli_fetch_array($query);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-primary btn-lg"><a href="petani.php" style="color: white; text-decoration: none"> <i class="fa fa-angle-left"></i> Kembali</a></button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input class="form-control" type="text" name="nama" value="<?= $data['nama'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>NIK</label>
                                <input class="form-control" name="nik" value="<?= $data['nik'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Telp</label>
                                <input class="form-control" name="telp" value="<?= $data['telp'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Kelompok Tani</label>
                                <select class="form-control" name="kelompok" required>
                                    <option value="<?= $data['kelompok'] ?>"><?= $data['kelompok'] ?></option>
                                    <option value="Permata">Permata</option>
                                    <option value="Harapan Bersama">Harapan Bersama</option>
                                    <option value="Suka Makmur">Suka Makmur</option>
                                    <option value="Langsat Membangun">Langsat Membangun</option>
                                    <option value="Riam Pinang">Riam Pinang</option>
                                    <option value="Suka Maju">Suka Maju</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Luas Lahan</label>
                                <input class="form-control" name="luaslahan" value="<?= $data['luaslahan'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" required><?= $data['alamat'] ?></textarea>
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
    $luaslahan   = $_REQUEST['luaslahan'];
    $nama   = $_REQUEST['nama'];
    $telp   = $_REQUEST['telp'];
    $alamat = $_REQUEST['alamat'];
    $nik    = $_REQUEST['nik'];
    $kelompok    = $_REQUEST['kelompok'];

    $ubah = mysqli_query($kon,"UPDATE user SET kelompok = '$kelompok', luaslahan = '$luaslahan', nama = '$nama', telp = '$telp', alamat = '$alamat', nik = '$nik' WHERE id = '$id'");
    if($ubah){
      ?> <script>alert("Berhasil Diubah");window.location='petani.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Diubah");window.location='petani.php';</script> <?php
    }
  }
?>