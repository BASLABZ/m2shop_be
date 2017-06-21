<!-- <div class="page-header parallax" style="background-image:url(images/page_header3.jpg); ">
    	<div class="container">
        	<h1 class="page-title">Produk M2SHOP</h1>
       	</div>
    </div> -->
    <br>
     <div class="utility-bar" style="background-color: #e96c4c;">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 col-sm-6 col-xs-8">
                    <ol class="breadcrumb">
                        <li><a href="index.php" style="color: white;">Home</a></li>
                        <li class="active" style="color: white;">Daftar Produk</li>
                    </ol>
            	</div>
                <div class="col-md-4 col-sm-6 col-xs-4">
                </div>
            </div>
      	</div>
    </div>
     <!-- Actions bar -->
    <div class="actions-bar tsticky" style="background-color:#37bc9b; ">
     	<div class="container">
        	<div class="row">
            	<div class="col-md-3 col-sm-3 search-actions">
                	
                    <!-- <img src="images/logo.jpg" class="img-circle img-responsive" style="width: 20%;"> -->
                    <h3 style="color: white;"><span class="fa fa-tasks"></span> Filter Produk</h3>

                </div>
                <div class="col-md-9 col-sm-9">
                    <div class="btn-group pull-right results-sorter">
                        <button type="button" class="btn btn-default listing-sort-btn">Filter</button>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?p=filter_harga_terendah">Harga (Tinggi Ke Rendah)</a></li>
                            <li><a href="index.php?p=daftar_produk">Harga (Rendah Ke Tinggi)</a></li>
                        </ul>
                  	</div>
                    <div class="toggle-view view-format-choice pull-right">
                        <label style="color: white;">View</label>
                        <div class="btn-group">
                            <a href="#" class="btn btn-default active" id="results-list-view"><i class="fa fa-th-list"></i></a>
                            <a href="#" class="btn btn-default" id="results-grid-view"><i class="fa fa-th"></i></a>
                        </div>
                    </div>
                    <!-- Small Screens Filters Toggle Button -->
                    <button class="btn btn-default visible-xs" id="Show-Filters">Search Filters</button> 
                </div>
            </div>
      	</div>
    </div>
    <!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
            	<div class="row">
                    <!-- Search Filters -->
                    <div class="col-md-3 search-filters" id="Search-Filters">
                    	<div class="tbsticky filters-sidebar">
                            <h3>Filter Produk</h3>
                            <div class="accordion" id="toggleArea">
                                <!-- Filter by Body Type -->
                                <div class="accordion-group">
                                    <div class="accordion-heading togglize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#" href="#collapseFour">Kategori Produk <i class="fa fa-angle-down"></i> </a> </div>
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
                                                <a href="index.php?p=filter_kategori_produk&kategori=<?php echo $row_kat['katpro_id']; ?>"><?php echo $row_kat['kat_nm']; ?></a></li>
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
                                            <form class="role" method="POST" action="index.php?p=filter_harga_produk">
                                                <div class="form-inline">
                                                <div class="form-group">
                                                    <label>Harga Min</label>
                                                    <input type="number" class="form-control" placeholder="Min." name="harga_min">
                                                </div>
                                                <div class="form-group">
                                                    <label>Harga Max</label>
                                                    <input type="number" class="form-control" placeholder="Max." name="harga_max">
                                                </div>
                                                <button type="submit" class="btn btn-info btn-block"><span class="fa fa-check"></span> Filter</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                           
                        </div>
                    </div>
                    
                    <!-- Listing Results -->
                    <div class="col-md-9 results-container">
                        <div class="results-container-in">
                        	<div class="waiting" style="display:none;">
                            	<div class="spinner">
                                  	<div class="rect1"></div>
                                  	<div class="rect2"></div>
                                  	<div class="rect3"></div>
                                  	<div class="rect4"></div>
                                  	<div class="rect5"></div>
                                </div>
                            </div>
                        	<div id="results-holder" class="results-grid-view">
                            	<?php 
                                $queryproduk = mysql_query("SELECT p.id_produk,p.nama_produk,p.status,p.tgl_posting,p.harga,p.deskripsi,p.stok,p.gambar,p.public,k.kat_nm 
                            from produk p INNER JOIN kategori_produk k on p.katpro_id = k.katpro_id where p.stok >= 0 order by p.id_produk desc");
                                while ($rowproduk = mysql_fetch_array($queryproduk)) {
                                 ?>
                            	<div class="result-item format-standard">
                                	<div class="result-item-image">
                                		<a href="admin/images/<?php echo $rowproduk['gambar']; ?>" data-rel="prettyPhoto" class="media-box"><img src="admin/images/<?php echo $rowproduk['gambar']; ?>" style="width: 285px; height: 233px;"></a>
                                        <span class="label label-success vehicle-age"><?php echo $rowproduk['kat_nm']; ?></span>
                                        <?php if ($rowproduk['stok'] < 5 && $rowproduk['stok'] != 0) { ?>
                                        <span class="label label-info premium-listing"><li class="fa fa-tags"></li> Limit Stock</span>
                                        <?php }elseif($rowproduk['stok'] == 0){ ?>
                                        <span class="label label-danger premium-listing"><li class="fa fa-tags"></li> Produk Ini Habis</span>
                                        <?php } ?>
                                        <div class="result-item-view-buttons">
                                            <a href="index.php?p=detail_produk&id=<?php echo $rowproduk['id_produk']; ?>"><i class="fa fa-eye"></i> View Detail</a>
                                            <?php if ($rowproduk['stok'] > 0) {  ?>
                                            <a href="aksi.php?module=keranjang&act=tambah&id=<?php echo $rowproduk['id_produk']; ?>"><i class="fa fa-shopping-cart"></i> Beli</a>
                                            <?php }else{ ?>
                                            <a href="index.php?p=daftar_produk" onclick="return confirm('Mohon Maaf Stok Item : <?php echo $rowproduk['nama_produk']; ?> Ini Tidak Tersedia?')"><i class="fa fa-shopping-cart"></i> Beli</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                	<div class="result-item-in">
                                     	<h4 class="result-item-title"><a href="index.php?p=detail_produk&id=<?php echo $rowproduk['id_produk']; ?>">
                                          <?php echo $rowproduk['nama_produk']; ?>  
                                        </a></h4>
                                		<div class="result-item-cont">
                                            <div class="result-item-block col1">
                                                <p><?php echo $rowproduk['deskripsi']; ?></p>
                                            </div>
                                            <div class="result-item-block col2">
                                                <div class="result-item-pricing">
                                                    <div class="price">Rp. <?php echo rupiah($rowproduk['harga']); ?></div>
                                                </div>
                                                <div class="result-item-action-buttons">
                                                <?php if ($rowproduk['stok'] < 1 ) { ?>
                                                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-star-o"></i>Stok Habis</a> <br> <br>
                                                     <?php }elseif($rowproduk['stok'] >= 1){  ?>
                                                    <a href="#" class="btn btn-warning btn-xs"><i class="fa fa-star-o"></i>Tersedia</a>
                                                     <?php } ?>
                                                    <?php if ($rowproduk['status']=='new') { ?>    
                                                    <a href="#" class="btn btn-info btn-xs">
                                                        <span class="fa fa-tags"></span> Baru
                                                    </a>
                                                    <?php } ?>
                                                    <br>

                                                </div>
                                            </div>
                                       	</div>
                                        <div class="result-item-features">
                                            <ul class="inline">
                                                <li>Kategori : <?php echo $rowproduk['kat_nm']; ?></li>
                                                <li>Post by : Admin</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
               	</div>
            </div>
        </div>
   	</div>