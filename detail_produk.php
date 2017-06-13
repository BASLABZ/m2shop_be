<?php 
$id = $_GET['id'];

        $queryproduk = mysql_query("SELECT p.id_produk,p.nama_produk,p.tgl_posting,p.harga,p.deskripsi,p.stok,p.gambar,p.public,k.kat_nm 
    from produk p INNER JOIN kategori_produk k on p.katpro_id = k.katpro_id where p.stok>0 and p.id_produk='".$id."'");

        $row_detail = mysql_fetch_array($queryproduk);
 ?>
<div class="page-header parallax" style="background-image:url(images/page_header2.jpg);">
    	<div class="container">
        	<h1 class="page-title">Vehicle Details</h1>
       	</div>
    </div>
    <!-- Utiity Bar -->
    <div class="utility-bar" style="background-color: #e96c4c;">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 col-sm-6 col-xs-8">
                    <ol class="breadcrumb">
                        <li><a href="index.php" style=" color: white;">Home</a></li>
                        <li class="active" style=" color: white;"><?php echo $row_detail['nama_produk']; ?></li>
                    </ol>
            	</div>
                <div class="col-md-4 col-sm-6 col-xs-4">
                	<span class="share-text" style="color: white;"><i class="icon-share"></i> Share this</span>
                	<ul class="utility-icons social-icons social-icons-colored">
                    	<li class="facebook"><a href="#"><i class="fa fa-facebook" style="color: #37bc9b;"></i></a></li>
                    	<li class="twitter"><a href="#"><i class="fa fa-twitter" style="color: #37bc9b;"></i></a></li>
                    	<li class="googleplus"><a href="#"><i class="fa fa-google-plus" style="color: #37bc9b;"></i></a></li>
                    	<li class="linkedin"><a href="#"><i class="fa fa-linkedin" style="color: #37bc9b;"></i></a></li>
                    	<li class="pinterest"><a href="#"><i class="fa fa-pinterest" style="color: #37bc9b;"></i></a></li>
                    	<li class="delicious"><a href="#"><i class="fa fa-delicious" style="color: #37bc9b;"></i></a></li>
                    </ul>
                </div>
            </div>
      	</div>
    </div>
    <!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
            	<!-- Vehicle Details -->
                <article class="single-vehicle-details">
                    <div class="single-vehicle-title">
                        <span class="badge-premium-listing"><?php echo $row_detail['kat_nm']; ?></span>
                        <h2 class="post-title"><?php echo $row_detail['nama_produk']; ?> | Rp. <?php echo rupiah($row_detail['harga']); ?> <a href="#" class="btn btn-md btn-success" style="color: white;"><span class="fa fa-shopping-cart"></span> Beli Sekarang</a></h2>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="single-listing-images">
                                <div class="featured-image format-image">
                                    <a href="images/car1-b.jpg" data-rel="prettyPhoto[gallery]" class="media-box"><img src="admin/images/<?php echo $row_detail['gambar']; ?>" class="img-rounded"></a>
                                </div>
                            </div>
                      	</div>
                        <br>
                        <div class="col-md-4">
                            <div class="sidebar-widget widget">
                                <h3>Spesifikasi Produk</h3>
                                <ul class="list-group">
                                    <li class="list-group-item"> <span class="badge">Produk </span> <?php echo $row_detail['nama_produk']; ?></li>
                                    <li class="list-group-item"> <span class="badge">Harga</span> Rp. <?php echo rupiah($row_detail['harga']); ?></li>
                                    <li class="list-group-item"> <span class="badge">Stok</span> <?php echo $row_detail['stok']; ?></li>
                                    <li class="list-group-item"> <span class="badge">Kategori</span> <?php echo $row_detail['kat_nm']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="tbsticky filters-sidebar">
                            <h3>Filter Produk</h3>
                            <div class="accordion">
                                
                                <!-- Filter by Body Type -->
                                <div class="accordion-group" style="background-color: #37bc9b; color:white;">
                                    <div class="accordion-heading togglize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#" href="#collapseFour" style=" color:white;">Kategori Produk <i class="fa fa-angle-down"></i> </a> </div>
                                    <div id="collapseFour" class="accordion-body collapse">
                                        <div class="accordion-inner">
                                            <ul class="filter-options-list list-group">
                                            <?php 
                                            $query_kategori = mysql_query("SELECT * FROM kategori_produk order by katpro_id DESC");
                                            while ($row_kat = mysql_fetch_array($query_kategori)) {
                                                
                                             ?>
                                                <li class="list-group-item">
                                                <?php 
                                                    $queryproduk_left = mysql_query("SELECT count(*) as jumlahproduk from produk where katpro_id = '".$row_kat['katpro_id']."' ");
                                                    while ($rojumlah = mysql_fetch_array($queryproduk_left)) {
                                                 ?>
                                                <span class="badge"><?php echo $rojumlah['jumlahproduk']; ?></span>
                                                <?php } ?>
                                                <a href="#"><?php echo $row_kat['kat_nm']; ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <!-- Filter by Price -->
                                <div class="accordion-group">
                                    <div class="accordion-heading togglize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#" href="#collapseEight">Filter Harga <i class="fa fa-angle-down"></i> </a> </div>
                                    <div id="collapseEight" class="accordion-body collapse">
                                        <div class="accordion-inner">
                                            <div class="form-inline">
                                                <div class="form-group">
                                                    <label>Harga Min</label>
                                                    <select name="Min Price" class="form-control selectpicker">
                                                        <option selected>Rp Nominal</option>
                                                        <option>10000</option>
                                                        <option>20000</option>
                                                        <option>30000</option>
                                                        <option>40000</option>
                                                        <option>50000</option>
                                                        <option>60000</option>
                                                        <option>70000</option>
                                                        <option>80000</option>
                                                        <option>90000</option>
                                                        <option>100000</option>
                                                    </select>
                                                </div>
                                                <div class="form-group last-child">
                                                    <label>Harga Max</label>
                                                    <select name="Max Price" class="form-control selectpicker">
                                                        <option selected>Rp Nominal</option>
                                                        <option>10000</option>
                                                        <option>20000</option>
                                                        <option>30000</option>
                                                        <option>40000</option>
                                                        <option>50000</option>
                                                        <option>60000</option>
                                                        <option>70000</option>
                                                        <option>80000</option>
                                                        <option>90000</option>
                                                        <option>100000</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-default btn-sm pull-right">Filter</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                           
                        </div>
                        </div>
                   	</div>
                 	<div class="spacer-50"></div>
                    <div class="row">
                    	<div class="col-md-8">
                            <div class="tabs vehicle-details-tabs">
                                <ul class="nav nav-tabs">
                                    <li  class="active"> <a data-toggle="tab" href="#vehicle-specs">Spesifikasi</a></li>
                                     <li> <a data-toggle="tab" href="#vehicle-overview">Deksripsi</a></li>
                                    <li> <a data-toggle="tab" href="#vehicle-add-features">Simulasi Ongkos Kirim</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="vehicle-overview" class="tab-pane fade in">
                                        <p><?php echo $row_detail['deskripsi']; ?>.</p>
                                    </div>
                                    <div id="vehicle-specs" class="tab-pane fade in active">
                                        <div class="accordion" id="toggleArea">
                                          	<div class="accordion-group panel">
                                            	<div class="accordion-heading togglize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#" href="#collapseOne"> Nama Poduk : <?php echo $row_detail['nama_produk']; ?><i class="fa fa-check"></i> </a> </div>
                                            	<div id="collapseOne" class="accordion-body collapse">
                                            	</div>
                                          	</div>
                                          	<div class="accordion-group panel">
                                            	<div class="accordion-heading togglize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#" href="#collapseTwo"> Harga : <?php echo $row_detail['harga']; ?> <i class="fa fa-check"></i> </a> </div>
                                            	<div id="collapseTwo" class="accordion-body collapse">
                                            	</div>
                                          	</div>
                                          	<div class="accordion-group panel">
                                            	<div class="accordion-heading togglize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#" href="#collapseThird"> stok :  
                                                <?php
                                                 $stok = $row_detail['stok'];
                                                if ($stok < 1) {
                                                        echo "Maaf Stok Habis";                                                    
                                                }else{
                                                echo $stok;
                                                }
                                                ?> <i class="fa fa-check"></i> </a> </div>
                                            	
                                          	</div>
                                          	<div class="accordion-group panel">
                                            	<div class="accordion-heading togglize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#" href="#collapseForth"> Kategori : <?php echo $row_detail['kat_nm']; ?> <i class="fa fa-check"></i> </a> </div>
                                            	
                                          	</div>
                                  		</div>
                                        <!-- End Toggle --> 
                                    </div>
                                    <div id="vehicle-add-features" class="tab-pane fade ">
                                    	<div class="col-sm-12">
                    <div class="contact-form">
                        <div class="status alert alert-success" style="display: none"></div>
                         <div class="row">
                            <div class="role">
                            <br>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="col-md-6" align='right'>Asal Propinsi</label>
                                        <div class="col-md-6">
                                            <select id="oriprovince" class="select2">
                                                <option>Propinsi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-md-3" align='left'>Asal Kota</label>
                                        <div class="col-md-6">
                                        <p align="left">
                                            <select id="oricity" class="select2"><option>Kota</option></select></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- tujuan -->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="col-md-6" align='right'>Tujuan Propinsi</label>
                                        <div class="col-md-6">
                                            <select id="desprovince" class="select2"><option>Provinsi</option></select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-md-3" align='left'>Tujuan Kota</label>
                                        <div class="col-md-6">
                                        <p align="left">
                                            <select id="descity" class="select2"><option>Kota</option></select></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- beerar dan layanan -->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="col-md-6" align='right'>Layanan</label>
                                        <div class="col-md-3">
                                            <select id="service" class="six columns">
                                                <option value="jne">JNE</option>
                                                <option value="pos">POS</option>
                                                <option value="tiki">TIKI</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-md-3" align='left'>Berita / gram</label>
                                        <div class="col-md-4">
                                        <p align="left">
                                            <input type="number" style="width: 100px;" id="berat" ></p>
                                        </div>
                                        <div class="col-md-12">
                                            <button id="btncheck" class="btn btn-primary get" onclick="CekHarga()">
                                            <span class="fa fa-truck fa-2x"></span> CEK HARGA</button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                        <table class="table table-responsive">
                                        <thead>
                                        <th>Aksi</th>
                                        <th>Service</th>
                                        <th>Nama Paket</th>
                                        <th>Lama Kirim</th>
                                        <th>Total Biaya</th>
                                    </thead>    
                                    <tbody id="resultsbox"></tbody>
                                    </table>
                                    </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
                                    </div>
                                   
                                </div>
                    		</div>
                            <div class="spacer-50"></div>
                            <!-- Recently Listed Vehicles -->
                            <section class="listing-block recent-vehicles">
                                <div class="listing-header">
                                    <h3>Rekomendasi Produk</h3>
                                </div>
                                <div class="listing-container">
                                    <div class="carousel-wrapper">
                                        <div class="row">
                                            <ul class="owl-carousel carousel-fw" id="vehicle-slider" data-columns="3" data-autoplay="" data-pagination="yes" data-arrows="no" data-single-item="no" data-items-desktop="3" data-items-desktop-small="3" data-items-tablet="2" data-items-mobile="1">
                                            <?php 
                                                $query_resent_produk = mysql_query("SELECT p.id_produk,p.nama_produk,p.tgl_posting,p.harga,p.deskripsi,p.stok,p.gambar,p.public,k.kat_nm 
                                                    from produk p INNER JOIN kategori_produk k on p.katpro_id = k.katpro_id where p.stok>0 order by p.id_produk desc limit 10");
                                                while ($row_resent_produk  = mysql_fetch_array($query_resent_produk)) {
                                                ?>
                                                <li class="item">
                                                    <div class="vehicle-block format-standard">
                                                        <a href="#" class="media-box"><img src="admin/images/<?php echo $row_resent_produk['gambar']; ?>" style="width: 214px; height: 143px"></a>
                                                        <span class="label label-primary vehicle-age"><?php echo $row_resent_produk['kat_nm']; ?></span>
                                                        <h5 class="vehicle-title"><a href="#"><?php echo $row_resent_produk['nama_produk']; ?></a></h5>
                                                        <a href="#" title="View all Sedans" class="vehicle-body-type">
                                                            <span class="fa fa-shopping-cart"></span>
                                                        </a>
                                                        <span class="vehicle-cost"><?php echo rupiah($row_resent_produk['harga']); ?></span>
                                                    </div>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </section>
                       	</div>
                        
                    </div>
                </article>
                <div class="clearfix"></div>
            </div>
        </div>
   	</div>