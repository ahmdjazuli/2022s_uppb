<?php require('atas.php') ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-primary btn-lg"><a href="user.php" style="color: white; text-decoration: none"> <i class="fa fa-angle-left"></i> Kembali</a></button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input class="form-control" type="text" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="user" required>
                            </div>
                            <div class="form-group">
                                <label>NIK</label>
                                <input class="form-control" name="nik">
                            </div>
                            <div class="form-group">
                                <label>Telp</label>
                                <input class="form-control" name="telp" placeholder="Contoh : 628975548712">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Level</label><br>
                                <input type="radio" name="level" value="Pelanggan" checked> Pelanggan
                                <input type="radio" name="level" value="Admin"> Admin<br>
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
    $user       = $_REQUEST['user'];
    $nama       = $_REQUEST['nama'];
    $nik        = $_REQUEST['nik'];
    $telp       = $_REQUEST['telp'];
    $alamat     = $_REQUEST['alamat'];
    $level      = $_REQUEST['level'];

    $tambah = mysqli_query($kon,"INSERT INTO user(username,password,nama,nik,telp,alamat,level) VALUES ('$user','$user','$nama','$nik','$telp','$alamat','$level')");
    if($tambah){
      ?> <script>alert("Berhasil Disimpan");window.location='user.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Disimpan");window.location='user_input.php';</script> <?php
    }
  }
?>