<?php require('atas.php'); error_reporting(0); $id = $_GET['id'];
  $user = mysqli_query($kon, "SELECT * FROM user WHERE id = '$id'");
  $data = mysqli_fetch_array($user);  ?>
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Nama Pengguna : <?= $data['nama'] ?></h3>
        </div>
    </div>
    <form role="form" action="" method="POST" enctype="multipart/form-data">
    <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Foto Diri</label><br>
                            <img src="../images/<?= $data['file1'] ?>" width="150px">
                            <div class="form-group input-group">
                                <input class="form-control" type="file" name="file1">
                                <input type="hidden" name="file1Lama" value="<?= $data['file1'] ?>">
                                <span class="input-group-addon"><button type="submit" name="upfile1"><i class="fa fa-check-square"></i> Ubah</button></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Foto KTP</label><br>
                            <img src="../images/<?= $data['file2'] ?>" width="150px">
                            <div class="form-group input-group">
                                <input class="form-control" type="file" name="file2">
                                <input type="hidden" name="file2Lama" value="<?= $data['file2'] ?>">
                                <span class="input-group-addon"><button type="submit" name="upfile2"><i class="fa fa-check-square"></i> Ubah</button></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Foto KK</label><br>
                            <img src="../images/<?= $data['file3'] ?>" width="150px">
                            <div class="form-group input-group">
                                <input class="form-control" type="file" name="file3">
                                <input type="hidden" name="file3Lama" value="<?= $data['file3'] ?>">
                                <span class="input-group-addon"><button type="submit" name="upfile3"><i class="fa fa-check-square"></i> Ubah</button></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Status</label><br>
                            <select name="status" class="form-control" required>
                                <option value="<?= $data['status'] ?>"><?= $data['status'] ?></option>
                                <option value="Aktif">Aktif</option>
                                <option value="Ditolak">Ditolak</option>
                            </select>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary"><i class="fa fa-check-square"></i> Ubah</button>
                        <button class="btn btn-danger"><a href="user.php" style="color: white;">Kembali</a></button>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </form>
</div>
<!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php require('bawah.php') ?>
<?php
  if (isset($_POST['upfile1'])) {
        unlink($_REQUEST['file1Lama']);
        $namafile  = $_FILES['file1']['tmp_name'];
        $namabaru  = rand(100,999).preg_replace("/[^a-zA-Z0-9]/", ".", $_FILES['file1']['name']);  
        move_uploaded_file($namafile, '../images/'.$namabaru);
        $ubah = mysqli_query($kon, "UPDATE user SET file1 = '$namabaru' WHERE id = '$id'");
        if($ubah){
          ?> <script>alert("Berhasil Diubah");window.location='user_detail.php?id=<?= $id ?>';</script> <?php
        }else{
          ?> <script>alert("Gagal Diubah");window.location='user_detail.php?id=<?= $id ?>';</script> <?php
        }
    }

    if (isset($_POST['upfile2'])) {
        unlink($_REQUEST['file2Lama']);
        $namafile  = $_FILES['file2']['tmp_name'];
        $namabaru  = rand(100,999).preg_replace("/[^a-zA-Z0-9]/", ".", $_FILES['file2']['name']);  
        move_uploaded_file($namafile, '../images/'.$namabaru);
        $ubah = mysqli_query($kon, "UPDATE user SET file2 = '$namabaru' WHERE id = '$id'");
        if($ubah){
          ?> <script>alert("Berhasil Diubah");window.location='user_detail.php?id=<?= $id ?>';</script> <?php
        }else{
          ?> <script>alert("Gagal Diubah");window.location='user_detail.php?id=<?= $id ?>';</script> <?php
        }
    }

    if (isset($_POST['upfile3'])) {
        unlink($_REQUEST['file3Lama']);
        $namafile  = $_FILES['file3']['tmp_name'];
        $namabaru  = rand(100,999).preg_replace("/[^a-zA-Z0-9]/", ".", $_FILES['file3']['name']);  
        move_uploaded_file($namafile, '../images/'.$namabaru);
        $ubah = mysqli_query($kon, "UPDATE user SET file3 = '$namabaru' WHERE id = '$id'");
        if($ubah){
          ?> <script>alert("Berhasil Diubah");window.location='user_detail.php?id=<?= $id ?>';</script> <?php
        }else{
          ?> <script>alert("Gagal Diubah");window.location='user_detail.php?id=<?= $id ?>';</script> <?php
        }
    }

    if (isset($_POST['ubah'])) {
    $status   = $_REQUEST['status'];
    $ubah = mysqli_query($kon,"UPDATE user SET status = '$status' WHERE id = '$id'");
    $userbaru = mysqli_query($kon,"SELECT * FROM user WHERE id = '$id'"); $row = mysqli_fetch_array($userbaru);
    if($ubah){
        if($status == 'Aktif'){
            ?><script>alert("Berhasil Diubah");window.open("https://wa.me/?phone=<?= $row['telp'] ?>&text=Halo, <?= $row['nama'] ?>.%20Kami%20dari%20UPPB%20Desa%20Simpang%20Empat%20Kecamatan%20Simpang%20Empat%20memberitahukan%20bahwa%0A%0AAkund%20Anda%20telah%20*AKTIF*.");</script> <?php
        }else if($status == 'Ditolak'){
            ?><script>alert("Berhasil Diubah");window.open("https://wa.me/?phone=<?= $row['telp'] ?>&text=Halo, <?= $row['nama'] ?>.%20Kami%20dari%20UPPB%20Desa%20Simpang%20Empat%20Kecamatan%20Simpang%20Empat%20memberitahukan%20bahwa%0A%0AAkund%20Anda%20telah%20*DITOLAK*.");</script> <?php
        }
    }else{
      ?> <script>alert("Gagal Diubah");window.location='user_detail.php?id=<?= $id ?>';</script> <?php
    }
  }
?>
