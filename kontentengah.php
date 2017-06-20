<?php include 'slider.php'; ?>
<div class="main" role="main">
    	<div id="content" class="content full padding-b0">
            <div class="container">
            	<!-- Welcome Content and Services overview -->
            	<div class="row">
                	<div class="col-md-6">
                    	<h1 class="uppercase strong">M2SHOP<br>Online Shop</h1>
                        <p class="lead">M2SHOP is the world's leading portal for<br>easy and quick <span class="accent-color">car buying and selling</span></p>
                    </div>
                    <div class="col-md-6">
                    	<p>Terinspirasi oleh trend fashion yang semakin berkembang pesat, maka kami siap memberikan solusi untuk gaya fashion anda dengan berbagai produk yang up to date dan pasti dengan harga terjangkau.</p>
                        <p>Terinspirasi oleh trend fashion yang semakin berkembang pesat, maka kami siap memberikan solusi untuk gaya fashion anda dengan berbagai produk yang up to date dan pasti dengan harga terjangkau.</p>
                    </div>
                </div>
                <div class="spacer-75"></div>
                <!-- Recently Listed Vehicles -->
                <section class="listing-block recent-vehicles ">
                	<!-- <div class="listing-header">
                    	<h3>Daftar Produk</h3>
                    </div> -->
<div class="listing-container ">
    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">
                    <!-- Search Filters -->
                    
                    <!-- Listing Results -->
                    <div class="col-md-12 results-container">
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
                            from produk p INNER JOIN kategori_produk k on p.katpro_id = k.katpro_id where p.stok>=0  order by p.id_produk desc");
                                while ($rowproduk = mysql_fetch_array($queryproduk)) {
                                 ?>
                                <div class="result-item format-standard">
                                    <div class="result-item-image">
                                        <a href="admin/images/<?php echo $rowproduk['gambar']; ?>" data-rel="prettyPhoto" class="media-box"><img src="admin/images/<?php echo $rowproduk['gambar']; ?>" style="width: 285px; height: 233px;"></a>
                                        <span class="label label-success vehicle-age"><?php echo $rowproduk['kat_nm']; ?></span>
                                         <?php if ($rowproduk['status']=='new') { ?>
                                        <span class="label label-info premium-listing"><li class="fa fa-tags"></li> Baru</span>
                                        <?php } ?>
                                        <div class="result-item-view-buttons">
                                            <a href="index.php?p=detail_produk&id=<?php echo $rowproduk['id_produk']; ?>"><i class="fa fa-eye"></i> View Detail</a> 
                                            <?php 
                                                if ($rowproduk['stok'] < 1) {
                                             ?>
                                            <a href="index.php" onclick="return confirm('Mohon Maaf Stok Item : <?php echo $rowproduk['nama_produk']; ?> Ini Tidak Tersedia?')"><i class="fa fa-shopping-cart"></i> Beli</a>
                                            <?php }else if ($rowproduk['stok'] > 0) {?>
                                            <a href="aksi.php?module=keranjang&act=tambah&id=<?php echo $rowproduk['id_produk']; ?>" onclick="return confirm('Mohon Maaf Stok Item : <?php echo $rowproduk['nama_produk']; ?> Ini Tidak Tersedia?')"><i class="fa fa-shopping-cart"></i> Beli</a>
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
                                                    <?php if ($rowproduk['stok'] > 0) { ?>
                                                     <a href="#" class="btn btn-info btn-sm"><i class="fa fa-star-o"></i> Stok Tersedia</a>
                                                     <?php }else{ ?>
                                                     <a href="index.php" class="btn btn-danger btn-sm" onclick="return confirm('Mohon Maaf Stok Item : <?php echo $rowproduk['nama_produk']; ?> Ini Tidak Tersedia?')"><span class="fa fa-times"></span> Stok Habis</a><br>
                                                     <?php } ?>
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
                    </div>
                </section>
                <div class="spacer-60"></div>
             	<div class="row">
                    <!-- Latest News -->
                    <div class="col-md-12">
                        <section class="listing-block latest-news">

                            <div class="listing-header">
                            	<!-- <a href="index.php" class="btn btn-sm btn-default pull-right">Semua Berita</a> -->
                                <h3>Daftar Berita</h3>
                            </div>
                            <div class="listing-container">
                            	<div class="carousel-wrapper">
                                    <div class="row">
                                        <ul class="owl-carousel" id="news-slider" data-columns="2" data-autoplay="" data-pagination="yes" data-arrows="yes" data-single-item="no" data-items-desktop="2" data-items-desktop-small="1" data-items-tablet="2" data-items-mobile="1">
                                            <?php 
                                                $queryBeritaKategori = mysql_query("SELECT b.berita_id,b.berita_judul,b.mdd,b.berita_des,b.gambar,b.publish,k.kat_nm 
                                                    from berita b INNER JOIN kategori k on b.kat_id = k.kat_id   ORDER by b.berita_id DESC");
                                                while ($rowberita = mysql_fetch_array($queryBeritaKategori)) {
                                             ?>
                                            <li class="item">
                                                <div class="post-block format-standard">
                                                    <a href="index.php?p=detail_berita&idberita=<?php echo $rowberita['berita_id']; ?>" class="media-box post-image"><img src="admin/images/<?php echo $rowberita['gambar']; ?>" alt="" style="width: 520px; height: 260px;"></a>
                                                    <div class="post-actions">
                                                        <div class="post-date"><?php echo $rowberita['mdd']; ?></div>
                                                        <div class="comment-count"><a href="index.php?p=detail_berita&idberita=<?php echo $rowberita['berita_id']; ?>"><i class="icon-dialogue-text"></i> 12</a></div>
                                                    </div>
                                                    <h3 class="post-title"><a href="index.php?p=detail_berita&idberita=<?php echo $rowberita['berita_id']; ?>"><?php echo $rowberita['berita_judul']; ?></a></h3>
                                                    <!-- <div class="post-content">
                                                       
                                                    </div> -->
                                                    <div class="post-meta">
                                                        Posted in: <a href="blog-masonry.html">Admin</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                      	</section>
                		<!-- <div class="spacer-40"></div> -->
                        <!-- Latest Testimonials -->
                        <section class="listing-block latest-testimonials ">
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
                            
        </div>
    </div>
    <div class="listing-header">
        <h3>Testimoni</h3>
    </div>
    <div class="listing-container ">
    	<div class="carousel-wrapper">
            <div class="row">
                <ul class="owl-carousel carousel-fw" id="testimonials-slider" data-columns="2" data-autoplay="5000" data-pagination="no" data-arrows="no" data-single-item="no" data-items-desktop="2" data-items-desktop-small="1" data-items-tablet="1" data-items-mobile="1">
                <?php 
                $query_bukutamu = mysql_query("SELECT * FROM bukutamu order by buku_id DESC ");
                while ($row_buku = mysql_fetch_array($query_bukutamu)) {
                 ?>
                    <li class="item" >
                        <div class="testimonial-block" >
                            <blockquote>
                                <p style="font-size:10px; "><?php echo $row_buku['pesan']; ?>.</p>
                            </blockquote>
                            <div class="testimonial-avatar"><img src="images/icon_bukutamu.png" alt="" width="60" height="60"></div>
                            <div class="testimonial-info">
                                <div class="testimonial-info-in">
                                    <strong><?php echo $row_buku['nama']; ?></strong><span><?php echo $row_buku['email']; ?></span>
                                </div>
                            </div>
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
           	</div>
            <div class="spacer-50"></div>
            
        </div>
        
   	</div>
