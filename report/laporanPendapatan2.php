<?php 
require "../kon.php"; error_reporting(0);
  $bulan = $_REQUEST['bulan'];
  $tahun = $_REQUEST['tahun'];
  if($bulan AND $tahun){
    $result = mysqli_query($kon, "SELECT tgl, DATE(tgl) as hari FROM transaksi WHERE konfirmasi != '' AND MONTH(tgl) = '$bulan' AND YEAR(tgl) = '$tahun' GROUP BY hari ORDER BY tgl ASC");
  }else if($tahun AND empty($bulan)){
    $result = mysqli_query($kon, "SELECT tgl, DATE(tgl) as hari FROM transaksi WHERE konfirmasi != '' AND YEAR(tgl) = '$tahun' GROUP BY hari ORDER BY tgl ASC");
  }
?>
<?php require('atas.php') ?>
<h2 style="text-align: center;">Laporan Laba</h2>
<h4 style="text-align: center;">
  <?php 
    if($bulan AND $tahun){
      echo "Bulan <b>". $namabulan."</b> pada Tahun <b>".$tahun."</b>";
    }else if($tahun AND empty($bulan)){
      echo "Tahun ". $tahun;
    }
  ?>
</h4>
<br>
<div class="container">
  <table class="table table-bordered table-sm" border="1px" style="font-weight: 400;">
    <thead class="text-center">
      <tr>
        <th>No</th>
        <th>Hari</th>
        <th>Penjualan</th>
        <th>Pembelian Bahan Pokok</th>
        <th>Laba Bersih</th>
      </tr>
    </thead>
<?php 
$i = 1;
$total = 0;
while( $data = mysqli_fetch_array($result) ) :
  $hari = $data['hari'];
  $transaksi = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi WHERE DATE(tgl) = '$hari' AND konfirmasi != ''"));
  $inventorimasuk = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM inventorimasuk WHERE DATE(tgl) = '$hari'"));
  $gaji = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM gaji WHERE DATE(tgl) = '$hari'"));
?> 
<tr class="text-center">
  	<td><?= $i++; ?></td>
  	<td><?= tgl_indo($hari) ?></td>
    <td>Rp. <?= number_format($transaksi['total'],0,'.','.') ?></td>
    <td>Rp. <?= number_format($inventorimasuk['total'],0,'.','.') ?></td>
    <td>Rp. <?= number_format($transaksi['total']-($pengeluaran['total']+$inventorimasuk['total']),0,'.','.') ?></td>
</tr>
<?php $total+=$bersih; ?>
<?php endwhile; ?>
  </table>
</div>
<div class="container-fluid">
  <div id="kiri">
  </div>
  <div id="kanan">
    Banjarbaru, <?= tgl_indo(date('Y-m-d')); ?><br>
    Mengetahui,<br>
    <?php QRcode::png('Penanggung Jawab : Budi Waluyo',"LaporanPendapatan.png","M",2,2); ?>
    <img src="laporanPendapatan.png"><br>
    Penanggung Jawab
  </div>
</div>  
<?php require('zzz.php') ?>