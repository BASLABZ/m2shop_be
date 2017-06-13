<div class="page-header parallax" style="background-image:url(images/page_header3.jpg);">
    	<div class="container">
        	<h1 class="page-title">Listing results</h1>
       	</div>
    </div>
     <div class="utility-bar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 col-sm-6 col-xs-8">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Daftar Produk</li>
                    </ol>
            	</div>
                <div class="col-md-4 col-sm-6 col-xs-4">
                </div>
            </div>
      	</div>
    </div>
     <!-- Actions bar -->
    <div class="actions-bar tsticky">
     	<div class="container">
        	<div class="row">
            	<div class="col-md-3 col-sm-3 search-actions">
                	
                </div>
                <div class="col-md-9 col-sm-9">
                    <div class="btn-group pull-right results-sorter">
                        <button type="button" class="btn btn-default listing-sort-btn">Sort by</button>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                          	<li><a href="#">Price (High to Low)</a></li>
                          	<li><a href="#">Price (Low to High)</a></li>
                          	<li><a href="#">Mileage (Low to High)</a></li>
                          	<li><a href="#">Mileage (High to Low)</a></li>
                        </ul>
                  	</div>
                    
                    <div class="toggle-view view-count-choice pull-right">
                        <label>Show</label>
                        <div class="btn-group">
                            <a href="#" class="btn btn-default">10</a>
                            <a href="#" class="btn btn-default active">20</a>
                            <a href="#" class="btn btn-default">50</a>
                        </div>
                    </div>
                    
                    <div class="toggle-view view-format-choice pull-right">
                        <label>View</label>
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
                            <h3>Refine Search</h3>
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
                                                <a href="#"><?php echo $row_kat['kat_nm']; ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <!-- Filter by Price -->
                                <div class="accordion-group">
                                    <div class="accordion-heading togglize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#" href="#collapseEight">Price <i class="fa fa-angle-down"></i> </a> </div>
                                    <div id="collapseEight" class="accordion-body collapse">
                                        <div class="accordion-inner">
                                            <div class="form-inline">
  												<div class="form-group">
                                                    <label>Price Min</label>
                                                    <select name="Min Price" class="form-control selectpicker">
                                                        <option selected>Any</option>
                                                        <option>$10000</option>
                                                        <option>$20000</option>
                                                        <option>$30000</option>
                                                        <option>$40000</option>
                                                        <option>$50000</option>
                                                        <option>$60000</option>
                                                        <option>$70000</option>
                                                        <option>$80000</option>
                                                        <option>$90000</option>
                                                        <option>$100000</option>
                                                    </select>
                                                </div>
                                                <div class="form-group last-child">
                                                    <label>Price Max</label>
                                                    <select name="Max Price" class="form-control selectpicker">
                                                        <option selected>Any</option>
                                                        <option>$10000</option>
                                                        <option>$20000</option>
                                                        <option>$30000</option>
                                                        <option>$40000</option>
                                                        <option>$50000</option>
                                                        <option>$60000</option>
                                                        <option>$70000</option>
                                                        <option>$80000</option>
                                                        <option>$90000</option>
                                                        <option>$100000</option>
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
                        	<div id="results-holder" class="results-list-view">
                            	<?php 
                                $queryproduk = mysql_query("SELECT p.id_produk,p.nama_produk,p.tgl_posting,p.harga,p.deskripsi,p.stok,p.gambar,p.public,k.kat_nm 
                            from produk p INNER JOIN kategori_produk k on p.katpro_id = k.katpro_id where p.stok>0 order by p.id_produk desc");
                                while ($rowproduk = mysql_fetch_array($queryproduk)) {
                                 ?>
                            	<div class="result-item format-standard">
                                	<div class="result-item-image">
                                		<a href="admin/images/<?php echo $rowproduk['gambar']; ?>" data-rel="prettyPhoto" class="media-box"><img src="admin/images/<?php echo $rowproduk['gambar']; ?>" style="width: 285px; height: 233px;"></a>
                                        <span class="label label-success vehicle-age"><?php echo $rowproduk['kat_nm']; ?></span>
                                        <div class="result-item-view-buttons">
                                        	<a href="admin/images/<?php echo $rowproduk['gambar']; ?>" data-rel="prettyPhoto"><i class="fa fa-plus"></i> View details</a>
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
                                                    <a href="#" class="btn btn-default btn-sm"><i class="fa fa-star-o"></i> Save</a>
                                                    <a href="vehicle-details.html" class="btn btn-default btn-sm">Enquire</a><br>
                                                </div>
                                            </div>
                                       	</div>
                                        <div class="result-item-features">
                                            <ul class="inline">
                                                <li><?php echo $rowproduk['kat_nm']; ?></li>
                                                <li>Admin</li>
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