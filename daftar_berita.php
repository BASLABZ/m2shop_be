 <div class="page-header parallax" style="background-image:url(images/page_header3.jpg);">
        <div class="container">
            <h1 class="page-title">Berita</h1>
        </div>
    </div>
 <div class="utility-bar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 col-sm-6 col-xs-8">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Daftar Berita</li>
                    </ol>
            	</div>
                <div class="col-md-4 col-sm-6 col-xs-4">
                </div>
            </div>
      	</div>
    </div>
        <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 posts-archive">
                        
                        <?php   $kat_id = $_GET['kat_id'];
                                 $sql_beritakat = mysql_query("SELECT b.berita_id,b.berita_judul,b.mdd,b.berita_des,b.gambar,b.publish,k.kat_nm 
                                    from berita b INNER JOIN kategori k on b.kat_id = k.kat_id  WHERE k.kat_id = '".$kat_id."'
                                     order by b.berita_id desc" );
                                    while ($rowberita=mysql_fetch_array($sql_beritakat)) 
                                    {
                                        $gambar=$rowberita['gambar'];
                                    
                         ?>
                        <article class="post format-standard">
                            <div class="row">
                                <div class="col-md-4 col-sm-4"> <a href="index.php?p=detail_berita&idberita=<?php echo $rowberita['berita_id']; ?>"><img src="admin/images/<?php echo $rowberita['gambar']; ?>" alt="" class="img-thumbnail"></a> </div>
                                <div class="col-md-8 col-sm-8">
                                    <div class="post-actions">
                                        <div class="post-date"><?php echo $rowberita['mdd']; ?></div>
                                    </div>
                                    <h3 class="post-title"><a href="index.php?p=detail_berita&idberita=<?php echo $rowberita['berita_id']; ?>">
                                        <?php echo $rowberita['berita_judul']; ?>
                                    </a></h3>
                                    <p><?php 
                                    echo substr($rowberita['berita_des'],0,150) ;
                                     ?> <a href="index.php?p=detail_berita&idberita=<?php echo $rowberita['berita_id']; ?>" class="continue-reading">Baca Selengkap nya <i class="fa fa-long-arrow-right"></i></a></p>
                                    <div class="post-meta">Posted in: <a href="#">admin</a></div>
                                </div>
                            </div>
                        </article>
                       <?php } ?>
                        <ul class="pagination">
                            <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                    <!-- Start Sidebar -->
                    <div class="col-md-3 sidebar">
                        
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