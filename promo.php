<?php require('header.php') ?>
	</div>
  <div class="collection_text">PROMO</div>
    <div class="layout_padding collection_section">
    	<div class="container">
           <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover " id="dataTables-example">
                            <thead class="success table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Waktu (WITA)</th>
                                    <th>Jenis Laundry</th>
                                    <th>Sub Jenis</th>
                                    <th>Event</th>
                                    <th>Harga Awal</th>
                                    <th>Harga Promo</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php $no=1; $query = mysqli_query($kon, "SELECT * FROM promo INNER JOIN jenis ON promo.idjenis = jenis.idjenis ORDER BY waktu1 ASC");
                                        while($data = mysqli_fetch_array($query)){ ?>
                                            <tr class="odd gradeX" style="color:black">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= date('d/m/Y,H:i',strtotime($data['waktu1'])).' <br>'.date('d/m/Y,H:i',strtotime($data['waktu2'])) ?></td>
                                                    <td><?= $data['jenis'] ?></td>
                                                    <td><?= $data['subjenis'] ?></td>
                                                    <td><?= $data['event'] ?></td>
                                                    <td>Rp. <?= number_format($data['hargaawal'],0,'.','.') ?></td>
                                                    <td>Rp. <?= number_format($data['hargapromo'],0,'.','.') ?></td>
                                                </tr>
                                        <?php } ?>
                                          
                                </tbody>
                        </table>
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
