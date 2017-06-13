<!-- Start Page header -->
    <div class="page-header parallax" style="background-image:url(images/header_dealer.jpg);">
    	<div class="container">
        	<h1 class="page-title">Profil M2SHOP</h1>
       	</div>
    </div>
      <div class="utility-bar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 col-sm-6 col-xs-8">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Profil M2shop</li>
                    </ol>
            	</div>
                <div class="col-md-4 col-sm-6 col-xs-4">
                	<ul class="utility-icons social-icons social-icons-colored">
                    	<li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    	<li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    	<li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    	<li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
      	</div>
    </div>
    <!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full">
      		<div class="container">
            	<div class="row dim_about">
                	<div class="col-md-6">
                    	<center><img src="images/logo.jpg" class="img-circle" style="width: 30%;"></center>
                    </div>
                	<div class="col-md-6">
                    	<h1 class="uppercase strong">M2SHOP<br></h1>
                        <p class="lead"> Online Shop Terpercaya ,<br> Ongkos kirim Murah <span class="accent-color">Berbagai Macam Diskon</span></p>
                    </div>
                    
                </div>
                <hr class="fw">
                <!-- <div class="text-align-center"><h2 class="uppercase">Profil Kami</h2></div> -->
                <div class="spacer-20"></div>
            	<div class="row">
                <ul class="sort-destination gallery-grid" data-sort-id="gallery">
                	<?php 
                		$queryprofil = mysql_query("SELECT * FROM profil order by profil_id ASC");
                		while ($rowprofil = mysql_fetch_array($queryprofil)) {
                	 ?>
                    <li class="col-md-4 col-sm-4 grid-item format-image ">
                        <div class="grid-item-inner dim_about">
                            <a href="admin/images/<?php echo $rowprofil['gambar']; ?>" data-rel="prettyPhoto" class="media-box"> <img src="admin/images/<?php echo $rowprofil['gambar']; ?>" alt=""> </a>
                            <div class="grid-content">
                                <center>
                                	<h3 class="post-title" style="color: white;"><a href="#" style="color: white;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal-<?php echo $rowprofil['profil_id']; ?>">
                                	<span class="fa fa-eye"></span>
                                	<?php echo $rowprofil['profil_nm']; ?></a></h3>
                                     <ul class="social-icons social-icons-colored">
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    </ul>
                                </center>
                               
                            </div>
                        </div>
                    </li>
                    <!-- show deskripsi -->
                    <div id="myModal-<?php echo $rowprofil['profil_id']; ?>" class="modal fade" role="dialog">
					  <div class="modal-dialog">
					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header" style="background-color: #37bc9b;">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title" style="color: white;" ><?php echo $rowprofil['profil_nm']; ?></h4>
					      </div>
					      <div class="modal-body">
					        <p><?php echo $rowprofil['profil_des']; ?></p>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
					      </div>
					    </div>

					  </div>
					</div>
                    <?php } ?>
                </ul>
        	</div>
      	</div>
 	</div>