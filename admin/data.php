        </div><script src="js/jquery.min.js"></script> <script src="js/bootstrap.min.js"></script> <script src="js/metisMenu.min.js"></script><script src="js/raphael.min.js"></script><script src="../js/Chart.min.js"></script><script src="js/startmin.js"></script>
    </body>
</html>
<?php 
  $grafik = mysqli_query($kon, "SELECT MONTH(tgl) as bulan, SUM(total) as total FROM transaksi GROUP BY bulan");
  $total = []; $bulan = [];
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
<script src="js/time.js"></script>