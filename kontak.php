 <?php 
        if (isset($_POST['simpan'])) {
            $querysimpan = mysql_query("INSERT INTO bukutamu  (nama,email,pesan) VALUES ('".$_POST['nama']."','".$_POST['email']."','".$_POST['pesan']."') ");

            if ($querysimpan) {
                echo "<script> alert(' Testimoni Dan Buku Tamu Telha Disimpan '); location.href='index.php' </script>";exit;
            }
        }
  ?>
 <!-- <div class="page-header parallax">
    	<div id="contact-map" style="width:100%;height:300px"></div>
    </div> -->
    <br>
     <!-- Utiity Bar -->
    <div class="utility-bar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 col-sm-6 col-xs-8">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Contact Us</li>
                        <li class="active">Testimoni</li>
                    </ol>
            	</div>
                <div class="col-md-4 col-sm-6 col-xs-4">
                </div>
            </div>
      	</div>
    </div>
    <!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full">
      		<div class="container">
            	<div class="listing-header margin-40">
                	<h2>Contact Us</h2>
                </div>
            	<div class="row">
                	<div class="col-md-3 col-sm-4">
                    	<i class="fa fa-home"></i></span> <b>M2SHOP Online Shop.</b><br>
							2500 CityWest Blvd.<br>
							Suite 300 Houston, 77042 USA<br><br>
							<i class="fa fa-phone"></i> <b>+6285 743 400 656</b><br>
							<i class="fa fa-fax"></i> <b>+6285 743 400 656</b><br>
							<i class="fa fa-envelope"></i> <a href="mailto:example@info.com">m2shop@gmail.com</a><br><br>
							<i class="fa fa-home"></i> <b>Mon - Fri 9.00 - 18.00</b>
                    </div>
                    <div class="col-md-9 col-sm-8">
                       	<form method="POST" class="contact-form clearfix" >
                        	<div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text"  name="nama"  class="form-control input-lg" placeholder="First name*">
                                    </div>
                                    <div class="form-group">
                                        <input type="email"  name="email"  class="form-control input-lg" placeholder="Email*">
                                    </div>
                        
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <textarea cols="6" rows="8" name="pesan" class="form-control input-lg" placeholder="Message"></textarea>
                                    </div>
                                   <button type="submit" class="btn btn-primary pull-right" name="simpan"><span class="fa fa-save"></span> Simpan</button>
                              	</div>
                           	</div>
                		</form>
                    </div>
              	</div>
        	</div>
      	</div>
 	</div>