<?php 
require "../kon.php"; error_reporting(0);
	$result = mysqli_query($kon, "SELECT * FROM user WHERE level ='Petani' ORDER BY nama ASC");
?>
<?php require('atas.php') ?>
<h2 style="text-align: center;">Laporan Data Petani</h2>
<h5 class="text-center">Dicetak pada tanggal : <?= tgl_indo(date('Y-m-d')); ?></h5>
<br>
<div class="container">
  <table class="table table-bordered table-sm" border="1px" style="font-weight: 400;">
    <thead class="text-center">
      <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>NIK</th>
        <th>Username</th>
        <th>Telp</th>
        <th>Alamat</th>
      </tr>
    </thead>
<?php 
$i = 1;
while( $data = mysqli_fetch_array($result) ) :
 ?> 
<tr class="text-center">
		<td><?= $i++; ?></td>
		<td><?= $data['nama'] ?></td>
    <td><?= $data['nik'] ?></td>
    <td><?= $data['username'] ?></td>
    <td><?= $data['telp'] ?></td>
    <td><?= $data['alamat'] ?></td>
</tr>
<?php endwhile; ?>
  </table>
</div>	
<div class="container-fluid">
  <div id="kiri">
  </div>
  <div id="kanan">
    Mengetahui,<br>
    <?php QRcode::png($kode,"LaporanPetani.png","M",2,2); ?>
    <img src="laporanPetani.png"><br>
    Penanggung Jawab
  </div>
</div>  
<?php require('zzz.php') ?>