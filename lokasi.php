<?php require('header.php') ?>
  <div class="collection_text">Lokasi</div>
   <div class="about_main layout_padding">
    <div class="collectipn_section_3 layout_padding">
    	<div class="container">
    		<div class="racing_shoes">
    			<div class="row">
    				<div class="col-md-7">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.6302389249267!2d114.85208431380981!3d-3.4397967974963066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de68102a8a84d71%3A0x881046928d800220!2sJl.%20Budi%20Waluyo%2C%20Komet%2C%20Kec.%20Banjarbaru%20Utara%2C%20Kota%20Banjar%20Baru%2C%20Kalimantan%20Selatan!5e0!3m2!1sid!2sid!4v1627408559501!5m2!1sid!2sid" width="600" height="510" style="border:0; margin-left: 30px" allowfullscreen="" loading="lazy"></iframe>
    				</div>
    				<div class="col-md-5">
    					<div class="sale_text"><strong>DESA SIMPANG EMPAT   <br><span style="color: #0a0506;">KECAMATAN SIMPANG EMPAT</span> <br>KABUPATEN BANJAR </strong><span style="color:black">Kalimantan Selatan</span></div>
    					<div class="number_text"><strong></strong></div>
    					<button class="seemore">WA: 082272526525</button>
                        <button class="seemore">Telp : 082272526525</button>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    </div>
	<!-- new collection section end -->

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
