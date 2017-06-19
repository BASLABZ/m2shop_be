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
                	<div class="listing-header">
                    	<h3>Daftar Produk</h3>
                    </div>
                    <div class="listing-container ">
                        <div class="carousel-wrapper ">
                            <div class="row ">
                                <ul class="owl-carousel carousel-fw" id="vehicle-slider" data-columns="4" data-autoplay="" data-pagination="yes" data-arrows="no" data-single-item="no" data-items-desktop="4" data-items-desktop-small="3" data-items-tablet="2" data-items-mobile="1">
                                    <?php 
                                       $queryProduk = mysql_query("SELECT p.id_produk,p.nama_produk,p.tgl_posting,p.harga,p.deskripsi,p.stok,
                                        p.gambar,p.public,k.kat_nm from produk p INNER JOIN kategori_produk k on p.katpro_id = k.katpro_id order by p.id_produk desc limit 9");
                                        while ($rowProduk = mysql_fetch_array($queryProduk)) {
                                     ?>
                                    <li class="item">
                                        <div class="vehicle-block format-standard">
                                            <a href="#" class="media-box">
                                            <img src="admin/images/<?php echo $rowProduk['gambar']; ?>" style="width: 245px; height: 243px;"></a>
                                            <div class="vehicle-block-content">
                                                <span class="label label-success premium-listing">
                                                    <?php echo $rowProduk['kat_nm']; ?>
                                                </span>
                                                <h5 class="vehicle-title"><a href="vehicle-details.html">
                                                    <?php echo $rowProduk['nama_produk']; ?>
                                                </a></h5>
                                                <a href="results-list.html" title="View all Sedans" class="vehicle-body-type"><span class="fa fa-shopping-cart"></span></a>
                                                <span class="vehicle-cost">Rp. <?php echo rupiah($rowProduk['harga']); ?></span>
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                    
                                </ul>
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
                                <h3>Testimonials</h3>
                            </div>
                            <div class="listing-container ">
                            	<div class="carousel-wrapper">
                                    <div class="row">
                                        <ul class="owl-carousel carousel-fw" id="testimonials-slider" data-columns="2" data-autoplay="5000" data-pagination="no" data-arrows="no" data-single-item="no" data-items-desktop="2" data-items-desktop-small="1" data-items-tablet="1" data-items-mobile="1">
                                            <li class="item" >
                                                <div class="testimonial-block" >
                                                    <blockquote>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                                    </blockquote>
                                                    <div class="testimonial-avatar"><img src="assets/images/user1.jpg" alt="" width="60" height="60"></div>
                                                    <div class="testimonial-info">
                                                        <div class="testimonial-info-in">
                                                            <strong>Arthur Henry</strong><span>Carsales Inc</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="item">
                                                <div class="testimonial-block">
                                                    <blockquote>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                                    </blockquote>
                                                    <div class="testimonial-avatar"><img src="assets/images/user1.jpg" alt="" width="60" height="60"></div>
                                                    <div class="testimonial-info">
                                                        <div class="testimonial-info-in">
                                                            <strong>Lori Bailey</strong><span>My car Experts</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                          
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
