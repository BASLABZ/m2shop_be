<?php include 'slider.php'; ?>
<div class="main" role="main">
    	<div id="content" class="content full padding-b0">
            <div class="container">
            	<!-- Welcome Content and Services overview -->
            	<div class="row">
                	<div class="col-md-6">
                    	<h1 class="uppercase strong">M2SHOP<br>Online Shop</h1>
                        <p class="lead">AutoStars is the world's leading portal for<br>easy and quick <span class="accent-color">car buying and selling</span></p>
                    </div>
                    <div class="col-md-6">
                    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, <span class="accent-color">consectetur adipiscing</span> elit. Nulla convallis egestas rhoncus.</p>
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
                                            <img src="admin/images/<?php echo $rowProduk['gambar']; ?>" style="width: 245px; height: 243px;" class="dim_about_item"></a>
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
                            	<a href="blog.html" class="btn btn-sm btn-default pull-right">Semua Berita</a>
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
                                </center>
                                <ul class="social-icons social-icons-colored">
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
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
