   <?php 
   $id = $_GET['idberita'];
   	$query_berita = mysql_query("SELECT b.berita_id,b.berita_judul,b.mdd,b.berita_des,b.gambar,b.publish,k.kat_nm 
                                    from berita b INNER JOIN kategori k on b.kat_id = k.kat_id WHERE b.berita_id = '".$id."'");
   	$rowberita=mysql_fetch_array($query_berita);
    ?>
   <div class="page-header parallax" style="background-image:url(images/page_header3.jpg);">
    	<div class="container">
        	<h1 class="page-title"><?php echo $rowberita['berita_judul']; ?></h1>
       	</div>
    </div>
     <div class="utility-bar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 col-sm-6 col-xs-8">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="blog.html">Berita</a></li>
                        <li class="active"><?php echo $rowberita['berita_judul']; ?></li>
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
        		<div class="row">
          			<div class="col-md-9 single-post">
            			<header class="single-post-header clearfix">
                            <div class="post-actions">
                                <div class="post-date"><?php echo $rowberita['mdd']; ?></div>
                            </div>
              				<h2 class="post-title"><?php echo $rowberita['berita_judul']; ?></h2>
            			</header>
            			<article class="post-content">
              				<div class="featured-image"> <img src="admin/images/<?php echo $rowberita['gambar']; ?>" alt=""> </div>
              				<p align="justify"> <?php echo $rowberita['berita_des']; ?> </p>
              				</blockquote>
              				<div class="post-meta"> <i class="fa fa-tags"></i> <a href="#"><?php echo $rowberita['kat_nm']; ?></a></div>
                            <!-- Pagination -->
                            <ul class="pager">
                                <li class="pull-left"><a href="#">&larr; Prev Post</a></li>
                                <li class="pull-right"><a href="#">Next Post &rarr;</a></li>
                            </ul>
            			</article>
          			</div>
          			<!-- Start Sidebar -->
          			<div class="col-md-3 sidebar">
                        <div class="widget sidebar-widget widget_recent_posts">
                            <h3 class="widgettitle">Recent Posts</h3>
                            <ul>
                              <?php $query_berita_resent = mysql_query("SELECT * FROM berita order by berita_id DESC limit 5");
                              while ($rowresent = mysql_fetch_array($query_berita_resent)) {
                               ?>
                            	 <li>
                                	<a href="index.php?p=detail_berita&idberita=<?php echo $rowresent['berita_id']; ?>"><img src="admin/images/<?php echo $rowresent['gambar']; ?>" alt="" class="img-thumbnail"></a>
                                    <h5><a href="index.php?p=detail_berita&idberita=<?php echo $rowresent['berita_id']; ?>"><?php echo $rowresent['berita_judul']; ?></a></h5>
                                    <div class="post-actions"><div class="post-date"><?php echo $rowresent['mdd']; ?></div></div>
                                </li>
                                <?php } ?>
                            </ul>
                       	</div>
                        <div class="widget sidebar-widget widget_categories">
                            <h3 class="widgettitle">Kategori Berita</h3>
                            <ul>
                                <?php 
                                $querykategoriberita  = mysql_query("SELECT * FROM kategori order by kat_id ASC ");
                                while ($rowkategori  = mysql_fetch_array($querykategoriberita)) {
                             ?>
                                <li>
                                    <a href="index.php?p=daftar_berita&kat_id=<?php echo $rowkategori['kat_id']; ?>"><?php echo $rowkategori['kat_nm']; ?></a>
                                    <?php  
                                    $querytotal_berita = mysql_query("SELECT count(*) as jumlah FROM berita where kat_id = '".$rowkategori['kat_id']."' ");
                                    while ($rowjumlahkategori = mysql_fetch_array($querytotal_berita)) {
                                    ?>
                                    (<?php echo $rowjumlahkategori['jumlah']; ?>)
                                    <?php } ?>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
            		</div>
          		</div>
        	</div>
      	</div>
 	</div>