<?php require('header.php') ?>
	</div>
    <div class="container">
        <br><br><br><br><br><br><div class="row">
            <div class="col-lg-12">
                <h2>Tambah Transaksi</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="alert alert-danger">
                    Pilih Barang yang dibeli, kemudian klik tombol <button class="btn btn-outline btn-danger">Tambah</button> untuk memasukkan ke keranjang.
                    <br><br>Jika sudah selesai, klik tombol <button class="btn btn-outline btn-danger">Simpan</button>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                                <label>Nama Barang</label>
                                <select name="idinventori" onchange='ubah(this.value)' class="email-bt" required>
                                    <option>Pilih</option>
                                  <?php
                                    $rendi = mysqli_query($kon, "SELECT * FROM inventori ORDER BY namainven ASC");
                                    $a    = "var harga = new Array();\n;";
                                    $b    = "var idinventori = new Array();\n;";
                                      while($haikal = mysqli_fetch_array($rendi)) {
                                        echo "<option value='$haikal[idinventori]'>$haikal[namainven]</option>";
                                        $a .= "harga['" . $haikal['idinventori'] . "'] = {harga:'" . addslashes($haikal['harga'])."'};\n";
                                        $b .= "idinventori['" . $haikal['idinventori'] . "'] = {idinventori:'" . addslashes($haikal['idinventori'])."'};\n";
                                      } 
                                    ?>
                                </select>
                                <label>Harga</label>
                                <input type="number" class="email-bt form-control" name="harga" id="harga" readonly>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" name="jumlahku" class="email-bt form-control" required>
                            </div>
                            <button type="submit" name="tambah" class="btn btn-outline btn-danger">Tambah</button>
                            <button type="button" class="btn btn-outline btn-default"><a href="mohon_bersih.php" style="color: black; text-decoration: none">Bersihkan Daftar</a></button>
                        </form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <div class="col-lg-8">
                <div class="panel panel-default" style="color: black;">
                    <div class="panel-body">
                         <form role="form" action="" method="POST">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead class="success table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Berat/Satuan</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Sub Harga</th>
                                            <th><i class="fa fa-toggle-on"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; $totalbelanja = 0; foreach ($_SESSION['keranjang'] as $idinventori => $jumlah) :
                                            $jenis = mysqli_query($kon, "SELECT * FROM inventori WHERE idinventori = '$idinventori'"); 
                                            $data = mysqli_fetch_assoc($jenis); 
                                            $subharga = $data['harga']*$jumlah;?>
                                            <tr class="odd gradeX">
                                                <td><?= $no++; ?></td>
                                                <td><?= $data['namainven'] ?></td>
                                                <td><?= $data['satuan'] ?></td>
                                                <td><?= $data['harga'] ?></td>
                                                <td><?= $jumlah ?></td>
                                                <td>Rp. <?= $subharga ?></td>
                                                <td> <a href="mohon_hapus.php?idinventori=<?php echo $data['idinventori'] ?>" class="btn btn-outline btn-danger btn-sm">hapus</a> </td>
                                            </tr>
                                        <?php $totalbelanja+=$subharga; ?>
                                        <?php endforeach ?>  
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th colspan="5">Total yang harus dibayarkan : </th>
                                        <th colspan="2">
                                        <span>Rp. <?= number_format($totalbelanja,0,',','.') ?></span>
                                        </th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <?php $qr = mysqli_query($kon, "SELECT * FROM user WHERE id = '$memori[id]'");
                                $rt = mysqli_fetch_array($qr); ?>
                                <input type="text" class="email-bt form-control" value="<?= $rt['alamat'] ?>" readonly/>
                            </div>
                            <div class="form-group">
                                <label>Catatan</label>
                                <textarea class="email-bt" name="catatan" required style="height: 105px;"></textarea>
                            </div>
                            
                            <button type="submit" name="simpan" class="btn btn-outline btn-danger">Simpan</button>
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

      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <script>   
        <?php echo $a;echo $b; ?>
            function ubah(id){  
            document.getElementById('harga').value = harga[id].harga; 
        }; 
        var hiding = document.querySelectorAll('.nice-select');
        hiding.forEach(function(e){ e.style.display = 'none'; });  
    </script> 
   </body>
</html>
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

        echo "<script>window.location = 'mohon_input.php';</script>";
    }

    if (isset($_POST['simpan'])) {
        $id          = $_REQUEST['id'];
        $tgl         = date('Y-m-d\TH:i');
        $catatan     = $_REQUEST['catatan'];
        $notransaksi = date('Ymds');

        $hasil = mysqli_query($kon,"INSERT INTO transaksi (notransaksi,id,total,tgl,catatan,konfirmasi) VALUES ('$notransaksi','$memori[id]','$totalbelanja','$tgl','$catatan','Menunggu')");

        foreach ($_SESSION['keranjang'] as $idinventori => $jumlah) {
            $query       = mysqli_query($kon, "SELECT * FROM inventori WHERE idinventori = '$idinventori'");
            $ambil       = mysqli_fetch_array($query);
            $namainvenny = $ambil['namainven'];
            $hargany     = $ambil['harga'];
            $satuanny    = $ambil['satuan'];
            $kimiwiw     = $jumlah * $hargany;

            $detail = mysqli_query($kon,"INSERT INTO detail (idinventori, notransaksi, namainvenny, satuanny, jumlah, hargany, subharga) VALUES ('$idinventori','$notransaksi','$namainvenny','$satuanny','$jumlah','$hargany','$kimiwiw')");
        }

        if($detail){
            ?> <script>alert('Transaksi berhasil dikirim, tunggu konfirmasi Admin.'); window.location = 'mohon.php';</script><?php
            unset($_SESSION['keranjang']);
        }else{
            ?> <script>alert('Gagal, cek kembali!.'); window.location = 'mohon_input.php';</script><?php
        }
    }
 ?>