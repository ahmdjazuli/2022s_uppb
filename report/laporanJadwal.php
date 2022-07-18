<?php 
require "../kon.php";
	$bulan = $_REQUEST['bulan'];
	$tahun = $_REQUEST['tahun'];
	if($bulan AND $tahun){
		$result = mysqli_query($kon, "SELECT * FROM jadwal INNER JOIN user ON jadwal.id = user.id WHERE MONTH(tgl) = '$bulan' AND YEAR(tgl) = '$tahun' ORDER BY tgl ASC");
	}else if($tahun AND empty($bulan)){
		$result = mysqli_query($kon, "SELECT * FROM jadwal INNER JOIN user ON jadwal.id = user.id WHERE YEAR(tgl) = '$tahun' ORDER BY tgl ASC");
	}
?>
<?php require('atas.php') ?>
<h2 style="text-align: center;">Laporan Jadwal Petani</h2>
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
        <th>Tanggal</th>
        <th>NIK</th>
        <th>Nama Petani</th>
        <th>Luas Lahan</th>
        <th>Kelompok Tani</th>
      </tr>
    </thead>
<?php 
$i = 1;
while( $data = mysqli_fetch_array($result) ) :
 ?> 
<tr class="text-center">
		<td><?= $i++; ?></td>
		<td><?= date('d/m/Y',strtotime($data['tgl'])) ?></td>
    <td><?= $data['nik'] ?></td>
    <td><?= $data['nama'] ?></td>
    <td><?= $data['luaslahan'] ?></td>
    <td><?= $data['kelompok'] ?></td>
</tr>
<?php endwhile; ?>
  </table>
</div>
<div class="container-fluid">
	<div id="kiri">
	</div>
	<div id="kanan">
		Banjarbaru, <?= tgl_indo(date('Y-m-d')); ?><br>
    Mengetahui,<br>
		<?php QRcode::png('Penanggung Jawab : Budi Waluyo',"LaporanJadwal.png","M",2,2); ?>
    <img src="laporanJadwal.png"><br>
		Penanggung Jawab
	</div>
</div>	
<?php require('zzz.php') ?>