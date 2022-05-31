        </div><script src="js/jquery.min.js"></script> <script src="js/bootstrap.min.js"></script> <script src="js/metisMenu.min.js"></script><script src="js/raphael.min.js"></script><script src="../js/Chart.min.js"></script><script src="js/startmin.js"></script>
    </body>
</html>
<?php 
  $grafik = mysqli_query($kon, "SELECT MONTH(tgl) as bulan, SUM(total) as total FROM transaksi GROUP BY bulan");
  $waktu = mysqli_query($kon, "SELECT MONTH(tgl) as bulan1, COUNT(notransaksi) as total1 FROM transaksi GROUP BY bulan1");

  $total = []; $bulan = []; $total1 = []; $bulan1 = [];

  while($baris1=mysqli_fetch_array($waktu)){
    if($baris1['bulan1']==7){$baris1['bulan1'] = 'Juli'; }else if($baris1['bulan1']==8){$baris1['bulan1'] = 'Agustus'; }else if($baris1['bulan1']==6){$baris1['bulan1'] = 'Juni'; }else if($baris1['bulan1']==1){$baris1['bulan1'] = 'Januari'; }else if($baris1['bulan1']==2){$baris1['bulan1'] = 'Februari'; }else if($baris1['bulan1']==3){$baris1['bulan1'] = 'Maret'; }else if($baris1['bulan1']==4){$baris1['bulan1'] = 'April'; }else if($baris1['bulan1']==5){$baris1['bulan1'] = 'Mei'; }else if($baris1['bulan1']==9){$baris1['bulan1'] = 'September'; }else if($baris1['bulan1']==10){$baris1['bulan1'] = 'Oktober'; }else if($baris1['bulan1']==11){$baris1['bulan1'] = 'November'; }else if($baris1['bulan1']==12){$baris1['bulan1'] = 'Desember';
    }
    $total1[] = (float)$baris1['total1']; $bulan1[] = (string)$baris1['bulan1'];
  } 

  while($baris=mysqli_fetch_array($grafik)){
    if($baris['bulan']==7){$baris['bulan'] = 'Juli'; }else if($baris['bulan']==8){$baris['bulan'] = 'Agustus'; }else if($baris['bulan']==6){$baris['bulan'] = 'Juni'; }else if($baris['bulan']==1){$baris['bulan'] = 'Januari'; }else if($baris['bulan']==2){$baris['bulan'] = 'Februari'; }else if($baris['bulan']==3){$baris['bulan'] = 'Maret'; }else if($baris['bulan']==4){$baris['bulan'] = 'April'; }else if($baris['bulan']==5){$baris['bulan'] = 'Mei'; }else if($baris['bulan']==9){$baris['bulan'] = 'September'; }else if($baris['bulan']==10){$baris['bulan'] = 'Oktober'; }else if($baris['bulan']==11){$baris['bulan'] = 'November'; }else if($baris['bulan']==12){$baris['bulan'] = 'Desember';
    }
    $total[] = (float)$baris['total']; $bulan[] = (string)$baris['bulan'];
  } 
?>
<script>
  $(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057', fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $salesChart = $('#statistik')
  var salesChart  = new Chart($salesChart, {
    type   : 'bar',
    data   : {
      labels  : <?php echo json_encode($bulan); ?>,
      datasets: [
        {
          backgroundColor: '#333333', borderColor : '#337ab7',
          data           : <?php echo json_encode($total); ?>
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode, intersect: intersect
      },
      hover              : {
        mode     : mode, intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          gridLines: {
            display : true, lineWidth : '4px', color : 'rgba(0, 0, 0, .2)', zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,
            callback: function (value, index, values) {
              if (value >= 1) {
                value /= 1
              }
              return 'Rp. ' + value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })
})
</script>
<script>
  $(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $salesChart = $('#mostly')
  var salesChart  = new Chart($salesChart, {
    type   : 'bar',
    data   : {
      labels  : <?php echo json_encode($bulan1); ?>,
      datasets: [
        {
          backgroundColor: '#337ab7', borderColor : '#333333',
          data           : <?php echo json_encode($total1); ?>
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode, intersect: intersect
      },
      hover              : {
        mode     : mode, intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{ display: false, gridLines: { 
          display : false, lineWidth : '4px', color : 'rgba(0, 0, 0, .2)', zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,
            callback: function (value, index, values) {
              if (value >= 1) {
                value /= 1
              }
              return value + 'x'
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })
})
</script>
