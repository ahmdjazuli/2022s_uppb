<?php require('atas.php'); error_reporting(0); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Tambah Data Bantuan Pembeku</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Petunjuk
                    </div>
                    <div class="panel-body">
                        <p>Pilih Barang yang diberikan untuk Penerima Bantuan Pembeku, kemudian klik tombol <button class="btn btn-primary">Tambah</button> untuk memasukkan ke daftar.</p>
                        <p>Jika sudah selesai, klik tombol <button class="btn btn-primary"><i class="fa fa-check-square"></i> Simpan</button> </p>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="form-group">
                            <label>Nama Barang</label>
                                <select name="idinventori" class="form-control" onchange='ubah(this.value)' required>
                                    <option>Pilih</option>
                                  <?php
                                    $rendi = mysqli_query($kon, "SELECT * FROM inventori ORDER BY namainven ASC");
                                    $b    = "var idinventori = new Array();\n;";
                                    $c   = "var stok = new Array();\n;";
                                      while($haikal = mysqli_fetch_array($rendi)) {
                                        echo "<option value='$haikal[idinventori]'>$haikal[namainven]</option>";
                                        $b .= "idinventori['" . $haikal['idinventori'] . "'] = {idinventori:'" . addslashes($haikal['idinventori'])."'};\n";
                                        $c .= "stok['" . $haikal['idinventori'] . "'] = {stok:'" . addslashes($haikal['stok'])."'};\n";
                                      } 
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" name="jumlahku" id="stok" class="form-control" required>
                            </div>
                            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                            <button type="button" class="btn btn-default"><a href="pembeku_bersih.php" style="color: black; text-decoration: none">Bersihkan Daftar</a></button>
                        </form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead class="success">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Berat/Satuan</th>
                                            <th>Jumlah</th>
                                            <th><i class="fa fa-toggle-on"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; $totalbelanja = 0; foreach ($_SESSION['keranjang'] as $idinventori => $jumlah) :
                                            $jenis = mysqli_query($kon, "SELECT * FROM inventori WHERE idinventori = '$idinventori'"); 
                                            $data = mysqli_fetch_assoc($jenis);?>
                                            <tr class="odd gradeX">
                                                <td><?= $no++; ?></td>
                                                <td><?= $data['namainven'] ?></td>
                                                <td><?= $data['satuan'] ?></td>
                                                <td><?= $jumlah ?></td>
                                                <td> <a href="pembeku_hapus.php?idinventori=<?php echo $data['idinventori'] ?>" class="btn btn-danger btn-sm">hapus</a> </td>
                                            </tr>
                                        <?php endforeach ?>  
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="datetime-local" class="form-control" value="<?php echo date('Y-m-d\TH:i') ?>" name="tgl">
                            </div>
                            <div class="form-group">
                                <label>Nama Petani</label>
                                <select name="id" class="form-control" required>
                                    <option value="">Pilih</option>
                                  <?php
                                    $rendi = mysqli_query($kon, "SELECT * FROM user WHERE level = 'Petani' ORDER BY nama ASC");
                                      while($haikal = mysqli_fetch_array($rendi)) {
                                        echo "<option value='$haikal[id]'>$haikal[nama]</option>";
                                      } 
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Catatan</label>
                                <textarea class="form-control" name="catatan" required></textarea>
                            </div>
                            <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-check-square"></i> Simpan</button>
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
    date_default_timezone_set('Asia/Kuala_Lumpur');
    if (isset($_POST['tambah'])) {
        $idinventori  = $_REQUEST['idinventori'];
        $jumlahku = $_REQUEST['jumlahku'];
        $harga    = $_REQUEST['harga'];
        if (isset($_SESSION['keranjang'][$idinventori])) {
          $_SESSION['keranjang'][$idinventori] += $jumlahku;
        }else{
          $_SESSION['keranjang'][$idinventori] = $jumlahku;
        }

        echo "<script>window.location = 'pembeku_input.php';</script>";
    }

    if (isset($_POST['simpan'])) {
        $id          = $_REQUEST['id'];
        $tgl         = $_REQUEST['tgl'];
        $catatan     = $_REQUEST['catatan'];
        $notransaksi = date('Ymds');

        $hasil = mysqli_query($kon,"INSERT INTO transaksi (notransaksi,id,total,tgl,catatan) VALUES ('$notransaksi','$id','$totalbelanja','$tgl','$catatan')");

        foreach ($_SESSION['keranjang'] as $idinventori => $jumlah) {
            $query       = mysqli_query($kon, "SELECT * FROM inventori WHERE idinventori = '$idinventori'");
            $ambil       = mysqli_fetch_array($query);
            $namainvenny = $ambil['namainven'];
            $satuanny    = $ambil['satuan'];

            $detail = mysqli_query($kon,"INSERT INTO detail (idinventori, notransaksi, namainvenny, satuanny, jumlah, hargany, subharga) VALUES ('$idinventori','$notransaksi','$namainvenny','$satuanny','$jumlah','0','0')");
        }

        if($detail){
            ?> <script>alert('Berhasil Disimpan'); window.location = 'pembeku.php';</script><?php
            unset($_SESSION['keranjang']);
        }else{
            ?> <script>alert('Gagal, cek kembali!.'); window.location = 'pembeku_input.php';</script><?php
        }
    }
?>

<script>   
  <?php echo $b; echo $c; ?>
  function ubah(id){  
    document.getElementById('stok').max = stok[id].stok; 
  };   
</script> 