<?php require('header.php'); $notransaksi = $_GET['notransaksi'];
  $detail = mysqli_query($kon, "SELECT * FROM detail WHERE notransaksi = '$notransaksi' ORDER BY namainvenny ASC");
  $ongkir = mysqli_query($kon, "SELECT * FROM transaksi WHERE notransaksi = '$notransaksi'");
  $row    = mysqli_fetch_array($ongkir);  ?>
    </div>
  <div class="collection_text">DETAIL BANTUAN</div>
    <div class="layout_padding collection_section">
        <div class="container">
           <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover " id="dataTables-example">
                            <thead class="success table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Berat/Satuan</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php $no=1; 
                                        while($data = mysqli_fetch_array($detail)){ ?>
                                            <tr class="odd gradeX" style="color:black">
                                                <td><?= $no++; ?></td>
                                                <td><?= $data['namainvenny'] ?></td>
                                                <td><?= $data['satuanny'] ?></td>
                                                <td><?= $data['jumlah'] ?></td>
                                                </tr>
                                        <?php } ?>
                                </tbody>
                        </table><br><br>
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
