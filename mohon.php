<?php require('header.php') ?>
	</div>
  <div class="collection_text">PENJUALAN</div>
    <div class="layout_padding collection_section">
    	<div class="container">
           <div class="panel panel-default">
                <div class="panel-heading">
                    <button type="button" class="btn btn-danger" onclick="window.location='mohon_input.php'">Tambah</button>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover " id="dataTables-example">
                            <thead class="success table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Waktu (WITA)</th>
                                    <th>No.Penjualan</th>
                                    <th>Catatan</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-light">
                                    <?php $no=1; 
                                    $query = mysqli_query($kon, "SELECT * FROM transaksi INNER JOIN user ON transaksi.id = user.id WHERE username = '$memori[username]' ORDER BY tgl DESC");
                                        while($data = mysqli_fetch_array($query)){ ?>
                                            <tr class="odd gradeX" style="color:black">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= date('d/m/Y, H:i',strtotime($data['tgl'])) ?></td>
                                                    <td>
                                                        <a style="color:blue" href="transaksi_detail.php?notransaksi=<?= $data['notransaksi'] ?>"><?= $data['notransaksi'] ?></a>
                                                    </td>
                                                    <td><?= $data['catatan'] ?></td>
                                                    <td>Rp. <?= number_format($data['total'],0,'.','.') ?></td>
                                                    <td><?php 
                                                      if($data['konfirmasi'] == 'diterima'){
                                                        ?><i class='fas fa-check'></i><?php
                                                      }else if($data['konfirmasi'] == 'Ditolak'){
                                                        echo "<i class='fas fa-times'></i>";
                                                      }else if($data['konfirmasi'] == 'Menunggu'){
                                                        echo "<i class='fas fa-clock'></i>";
                                                      }  ?></td>
                                                </tr>
                                        <?php } ?> 
                                    <?php if(mysqli_num_rows($query)<=0){
                                        ?>
                                            <tr class="odd gradeX" style="color:black">
                                                <td colspan="11"><h1 class="text-center">Tidak Ada Penjualan</h1></td>
                                            </tr>
                                        <?php
                                    } ?>
                                </tbody>
                        </table>
                        <br>
                        <br>
                        <br>
                    </div>
                                
                </div>
                <!-- /.panel-body -->
            </div>
    	</div>
    </div>

      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         
         
$('#myCarousel').carousel({
            interval: false
        });

        //scroll slides on swipe for touch enabled devices

        $("#myCarousel").on("touchstart", function(event){

            var yClick = event.originalEvent.touches[0].pageY;
            $(this).one("touchmove", function(event){

                var yMove = event.originalEvent.touches[0].pageY;
                if( Math.floor(yClick - yMove) > 1 ){
                    $(".carousel").carousel('next');
                }
                else if( Math.floor(yClick - yMove) < -1 ){
                    $(".carousel").carousel('prev');
                }
            });
            $(".carousel").on("touchend", function(){
                $(this).off("touchmove");
            });
        });
      </script> 
   </body>
</html>
