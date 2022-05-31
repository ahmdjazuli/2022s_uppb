<?php require('header.php') ?>
	</div>
  <div class="collection_text">DAFTAR BARANG</div>
    <div class="layout_padding collection_section">
    	<div class="container">
           <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover " id="dataTables-example">
                            <thead class="success table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Satuan</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php $no=1; $query = mysqli_query($kon, "SELECT * FROM inventori ORDER BY namainven ASC");
                                        while($data = mysqli_fetch_array($query)){ ?>
                                            <tr class="odd gradeX" style="color: black;">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $data['namainven'] ?></td>
                                                    <td><?= $data['satuan'] ?></td>
                                                    <td><?= $data['stok'] ?></td>
                                                    <td><?= number_format($data['harga'],0,'.','.') ?></td>
                                                </tr>
                                        <?php } ?>
                                          
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
