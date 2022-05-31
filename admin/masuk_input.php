<?php require('atas.php') ?>
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
                         <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="datetime-local" name="tgl" class="form-control" value="<?php echo date('Y-m-d\TH:i') ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <select name="idinventori" class="form-control" required>
                                    <option disabled selected>Pilih</option>
                                  <?php
                                    $rendi = mysqli_query($kon, "SELECT * FROM inventori ORDER BY namainven ASC");
                                      while($haikal = mysqli_fetch_array($rendi)) {
                                        echo "<option value='$haikal[idinventori]'>$haikal[namainven]</option>";
                                      } 
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Penjual</label>
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
                                <label>Jumlah</label>
                                <input class="form-control" type="number" name="jumlah" required>
                            </div>
                            <div class="form-group">
                                <label>Harga Satuan</label>
                                <input class="form-control" type="number" name="harga" required>
                            </div>
                            <div class="form-group">
                                <label>Foto Timbangan</label>
                                <input type="file" name="gambar" class="form-control" required>
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
    $tgl         = $_REQUEST['tgl'];
    $idinventori = $_REQUEST['idinventori'];
    $id          = $_REQUEST['id'];
    $jumlah      = $_REQUEST['jumlah'];
    $harga       = $_REQUEST['harga'];
    $total       = $jumlah * $harga;

    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $namafoto               = $_FILES['gambar']['name'];
    $x                      = explode('.', $namafoto);
    $ekstensi               = strtolower(end($x));
    $ukuran                 = $_FILES['gambar']['size'];
    $file_tmp               = $_FILES['gambar']['tmp_name'];

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 2048000){  
        $namabaru = rand(100,999).preg_replace("/[^a-zA-Z0-9]/", ".", $namafoto);   
        move_uploaded_file($file_tmp, '../images/'.$namabaru);
        
        $hasil = mysqli_query($kon,"INSERT INTO inventorimasuk (tgl,idinventori,id,total,gambar,jumlah,harga) VALUES ('$tgl','$idinventori','$id','$total','$namabaru','$jumlah','$harga')");

        if($hasil){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'masuk.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'masuk_input.php';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 2MB!'); window.location = 'masuk_input.php';</script><?php
      }
    }else{
      ?> <script>alert('Gagal, File yang diupload format jpg, jpeg atau png!'); window.location = 'masuk_input.php';</script><?php
    }
  }
?>