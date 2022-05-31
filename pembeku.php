<?php require('header.php');?>
	</div>
  <div class="collection_text">Data Riwayat Bantuan Pembeku Anda</div>
    <div class="layout_padding collection_section">
    	<div class="container">
           <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover " id="dataTables-example">
                            <thead class="success table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Petani</th>
                                    <th>Catatan</th>
                                </tr>
                            </thead>
                            <tbody class="table-light">
                                    <?php $no=1; 
                                    $query = mysqli_query($kon, "SELECT * FROM transaksi INNER JOIN user ON transaksi.id = user.id WHERE konfirmasi = '' AND username = '$memori[username]' ORDER BY tgl DESC");
                                        while($data = mysqli_fetch_array($query)){ ?>
                                            <tr class="odd gradeX" style="color:black">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= date('d/m/Y,H:i',strtotime($data['tgl'])) ?></td>
                                                    <td>
                                                        <a style="color:blue" href="pembeku_detail.php?notransaksi=<?= $data['notransaksi'] ?>"><?= $data['nama'] ?></a>
                                                    </td>
                                                    <td><?= $data['catatan'] ?></td>
                                                </tr>
                                        <?php } ?> 
                                    <?php if(mysqli_num_rows($query)<=0){
                                        ?>
                                            <tr class="odd gradeX" style="color:black">
                                                <td colspan="9"><h1 class="text-center">Tidak/Belum Pernah Menerima Bantuan Pembeku</h1></td>
                                            </tr>
                                        <?php
                                    } ?>
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
