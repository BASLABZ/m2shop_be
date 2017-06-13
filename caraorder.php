 <div class="page-header parallax">
    	<!-- <div id="contact-map" style="width:100%;height:300px"></div> -->
    </div>
     <!-- Utiity Bar -->
    <div class="utility-bar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 col-sm-6 col-xs-8">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Cara Order</li>
                        
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
            	
            	<div class="row">
                    <div class="col-md-12 col-sm-8">
                      <?php 
                        $querycaraorder =  mysql_query("SELECT * FROM caraorder order by idcara ASC");
                        while ($row = mysql_fetch_array($querycaraorder)) {
                       ?>
                       <div class="listing-header margin-40">
                       <h3><?php echo $row['judul']; ?></h3>
                       </div>
                       <p align="justify"><?php echo $row['deskripsi']; ?></p>
                       <?php } ?>
                    </div>
              	</div>
        	</div>
      	</div>
 	</div>