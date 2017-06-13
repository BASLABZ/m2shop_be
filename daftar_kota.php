<!-- Start Page header -->
    <div class="page-header prosite-header parallax" style="background-image:url(images/header_dealer.jpg);"></div>
    <!-- Start Body Content -->
  	<div class="main" role="main">
    	<div id="content" class="content full dealer-prosite">
          	<header class="dealer-info">
        		<div class="container">
                	<div class="row">
                    	<div class="col-md-3 col-sm-4 col-xs-6">
                            <ul class="social-icons social-icons-colored inversed rounded">
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-4">
                        	<div class="dealer-avatar"><img src="images/logo.jpg" class="img-circle"></div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-6">
                            <div class="dealer-block-add">
                                <span><strong>Simulasi </strong> Ongkir </span>
                                <!-- <span><img src="images/peng.jpg" style="width: 40%;"></span> -->
                            </div>
                        </div>
                    </div>
           		</div>
         	</header>
            <div class="container">
                <div id="contact-page" class="container">
        <div class="bg" style="margin-top: 25px; margin-bottom: 25px;">
            <div class="row  bas-shadow">   
                <div class="col-sm-12">
                    <div class="contact-form">
                        <h3 class="title text-center" style="color: #1ab394;">Simulasi Ongkos Kirim [POS,JNE,TIKI]</h3>
                        <div class="status alert alert-success" style="display: none"></div>
                        
                    </div>
                </div>
                
            </div> 
            <div class="row  bas-shadow">   
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
            </div>
           
        </div>
   	</div>
    <div class="lgray-bg make-slider">
                <div class="container">
                    <!-- Search by make -->
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <h3>Jalur Pengiriman </h3>
                            <a href="#" class="btn btn-default btn-lg">All make &amp; Sampel Ongkir</a>
                        </div>
                        <div class="col-md-9 col-sm-8">
                            <div class="row">
                                <ul class="owl-carousel" id="make-carousel" data-columns="5" data-autoplay="6000" data-pagination="no" data-arrows="no" data-single-item="no" data-items-desktop="5" data-items-desktop-small="4" data-items-tablet="3" data-items-mobile="3">
                                    <li class="item"> <a href="results-grid.html"><img src="images/pos.png" alt=""></a></li>
                                    <li class="item"> <a href="results-grid.html"><img src="images/jne.png" alt=""></a></li>
                                    <li class="item"> <a href="results-grid.html"><img src="images/tiki.png" alt=""></a></li>
                                    <li class="item"> <a href="results-grid.html"><img src="images/jt.png" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>