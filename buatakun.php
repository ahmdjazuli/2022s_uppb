<?php require('header.php') ?>
</div>
    	<div class="container"><br><br><br><br><br>
            <form action="" method="POST" enctype="multipart/form-data">
    	    <div class="row">
    	    <h1 class="new_text text-center"><strong>Buat Akun</strong></h1>
    	    		<div class="col-md-6">
                        <div class="email_box">
    	    			<div class="input_main">
                           <div class="container">
                            <div class="form-group">
                                <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="nik" placeholder="NIK" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="user" placeholder="Username" required>
                                <span>*Username sama dengan Password ketika awal buat akun.</span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="telp" placeholder="Contoh : 628975548712" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="alamat" placeholder="Alamat" required></textarea>
                            </div>                 
                            </div>                 
                        </div>
                        </div>
    	    		</div>
                    <div class="col-md-6">
                        <div class="email_box">
                        <div class="input_main">
                           <div class="container">
                            <div class="form-group">
                                <label>Foto Diri</label>
                                <input class="form-control" type="file" name="file1" required>
                            </div>
                            <div class="form-group">
                                <label>Foto KTP</label>
                                <input class="form-control" type="file" name="file2" required>
                            </div>
                            <div class="form-group">
                                <label>Foto KK</label>
                                <input class="form-control" type="file" name="file3" required>
                            </div>
                           </div> 
                           <div class="send_btn">
                            <button class="main_bt" name="simpan" type="submit">Daftar</button>
                           </div>                   
                        </div>
                        </div>
                    </div>
    	   </div>
        </form>
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
         
      </script> 
   </body>
</html>
<?php
  if (isset($_POST['simpan'])) {
    $user       = $_REQUEST['user'];
    $nama       = $_REQUEST['nama'];
    $telp       = $_REQUEST['telp'];
    $alamat     = $_REQUEST['alamat'];
    $nik        = $_REQUEST['nik'];

    $temp1 = $_FILES['file1']['tmp_name'];
    $file1 = rand(100,999).preg_replace("/[^a-zA-Z0-9]/", ".", $_FILES['file1']['name']);

    $temp2 = $_FILES['file2']['tmp_name'];
    $file2 = rand(100,999).preg_replace("/[^a-zA-Z0-9]/", ".", $_FILES['file2']['name']);

    $temp3 = $_FILES['file3']['tmp_name'];
    $file3 = rand(100,999).preg_replace("/[^a-zA-Z0-9]/", ".", $_FILES['file3']['name']);

    $tambah = mysqli_query($kon,"INSERT INTO user(nik,file1,file2,file3,username,password,nama,telp,alamat,level,status) VALUES ('$nik','$file1','$file2','$file3','$user','$user','$nama','$telp','$alamat','Pelanggan','Menunggu')");
    if($tambah){
        move_uploaded_file($temp1, 'images/'.$file1);
        move_uploaded_file($temp2, 'images/'.$file2);
        move_uploaded_file($temp3, 'images/'.$file3);
      ?> <script>alert("Berhasil Daftar, Tunggu Konfirmasi melalui Whatsappp!");window.location='masuk.php';</script> <?php
    }else{
      ?> <script>alert("Gagal Daftar");window.location='buatakun.php';</script> <?php
    }
  }
?>