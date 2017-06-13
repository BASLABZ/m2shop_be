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
    <div class="utility-bar">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-8 col-sm-6 col-xs-8">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><?php echo $row_detail['nama_produk']; ?></li>
                    </ol>
            	</div>
                <div class="col-md-4 col-sm-6 col-xs-4">
                	<span class="share-text"><i class="icon-share"></i> Share this</span>
                	<ul class="utility-icons social-icons social-icons-colored">
                    	<li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    	<li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    	<li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    	<li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    	<li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    	<li class="delicious"><a href="#"><i class="fa fa-delicious"></i></a></li>
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
                        <h2 class="post-title"><?php echo $row_detail['nama_produk']; ?></h2>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="single-listing-images">
                                <div class="featured-image format-image">
                                    <a href="images/car1-b.jpg" data-rel="prettyPhoto[gallery]" class="media-box"><img src="admin/images/<?php echo $row_detail['gambar']; ?>" alt=""></a>
                                </div>
                                <div class="additional-images">
                                        <ul class="owl-carousel" data-columns="4" data-pagination="no" data-arrows="yes" data-single-item="no" data-items-desktop="4" data-items-desktop-small="4" data-items-tablet="3" data-items-mobile="3">
                                            <li class="item format-video"> <a href="https://www.youtube.com/watch?v=P5mvnA4BV7Y" data-rel="prettyPhoto[gallery]" class="media-box"><img src="images/car2.jpg" alt=""></a></li>
                                            <li class="item format-image"> <a href="images/car1-in.jpg" data-rel="prettyPhoto[gallery]" class="media-box"><img src="images/car1-in.jpg" alt=""></a></li>
                                            <li class="item format-image"> <a href="images/car2-in.jpg" data-rel="prettyPhoto[gallery]" class="media-box"><img src="images/car2-in.jpg" alt=""></a></li>
                                            <li class="item format-image"> <a href="images/car3-in.jpg" data-rel="prettyPhoto[gallery]" class="media-box"><img src="images/car3-in.jpg" alt=""></a></li>
                                            <li class="item format-image"> <a href="images/car4-in.jpg" data-rel="prettyPhoto[gallery]" class="media-box"><img src="images/car4-in.jpg" alt=""></a></li>
                                        </ul>
                                </div>
                            </div>
                      	</div>
                        <div class="col-md-4">
                            <div class="sidebar-widget widget">
                                <ul class="list-group">
                                    <li class="list-group-item"> <span class="badge">Year</span> 2014</li>
                                    <li class="list-group-item"> <span class="badge">Make</span> Nissan</li>
                                    <li class="list-group-item"> <span class="badge">Model</span> Terrano</li>
                                    <li class="list-group-item"> <span class="badge">Body style</span> SUV</li>
                                    <li class="list-group-item"> <span class="badge">Mileage</span> 2000km</li>
                                    <li class="list-group-item"> <span class="badge">Transmission</span> 5 Speed automatic</li>
                                    <li class="list-group-item"> <span class="badge">Condition</span> Slightly used</li>
                                    <li class="list-group-item"> <span class="badge">Fuel Economy</span> 6.8 L/100km</li>
                                    <li class="list-group-item"> <span class="badge">Engine Size</span> 1390 cc</li>
                                    <li class="list-group-item"> <span class="badge">Cylinders</span> 4</li>
                                    <li class="list-group-item"> <span class="badge">Power</span> 168 kW</li>
                                    <li class="list-group-item"> <span class="badge">Fuel type</span> Diesel</li>
                                </ul>
                            </div>
                        </div>
                   	</div>
                 	<div class="spacer-50"></div>
                    <div class="row">
                    	<div class="col-md-8">
                            <div class="tabs vehicle-details-tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"> <a data-toggle="tab" href="#vehicle-overview">Overview</a></li>
                                    <li> <a data-toggle="tab" href="#vehicle-specs">Specifications</a></li>
                                    <li> <a data-toggle="tab" href="#vehicle-add-features">Additional Features</a></li>
                                    <li> <a data-toggle="tab" href="#vehicle-location">Location</a> </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="vehicle-overview" class="tab-pane fade in active">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                                    </div>
                                    <div id="vehicle-specs" class="tab-pane fade">
                                        <div class="accordion" id="toggleArea">
                                          	<div class="accordion-group panel">
                                            	<div class="accordion-heading togglize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#" href="#collapseOne"> Engine <i class="fa fa-plus-circle"></i> <i class="fa fa-minus-circle"></i> </a> </div>
                                            	<div id="collapseOne" class="accordion-body collapse">
                                              		<div class="accordion-inner">
                                                    	<table class="table-specifications table table-striped table-hover">
                                                            <tbody>
                                                            	<tr>
                                                            		<td>Engine type</td>
                                                            		<td>SKYACTIV-G 2.5 L DOHC 16-valve 4-cylinder engine with VVT</td>
                                                            	</tr>
                                                            	<tr>
                                                            		<td>Displacement</td>
                                                            		<td>2,488 cc</td>
                                                            	</tr>
                                                            	<tr>
                                                            		<td>Compression ratio</td>
                                                            		<td>13.0:1</td>
                                                            	</tr>
                                                            	<tr>
                                                            		<td>Horsepower SAE net</td>
                                                            		<td>184 @ 5,700 rpm</td>
                                                            	</tr>
                                                            	<tr>
                                                            		<td>Torque SAE net lb. ft.</td>
                                                            		<td>185 @ 3,250 rpm</td>
                                                            	</tr>
                                                            	<tr>
                                                            		<td>Fuel system</td>
                                                            		<td>Direct injection</td>
                                                            	</tr>
                                                            	<tr>
                                                            		<td>Recommended fuel</td>
                                                            		<td>Regular</td>
                                                            	</tr>
                                                            	<tr>
                                                            		<td>Fuel economy city/highway (L/100 km)*<br />Manual<br />Automatic</td>
                                                            		<td>8.1/5.3<br />7.6/5.1</td>
                                                            	</tr>
                                                            	<tr>
                                                            		<td>Curb weight (kg)<br /> Manual<br />Automatic</td>
                                                            		<td>1,442<br />1,465</td>
                                                            	</tr>
                                                            </tbody>
                                                  		</table>
                                                    </div>
                                            	</div>
                                          	</div>
                                          	<div class="accordion-group panel">
                                            	<div class="accordion-heading togglize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#" href="#collapseTwo"> Exterior <i class="fa fa-plus-circle"></i> <i class="fa fa-minus-circle"></i> </a> </div>
                                            	<div id="collapseTwo" class="accordion-body collapse">
                                              		<div class="accordion-inner">
                                                    	<table class="table-specifications table table-striped table-hover">
                                                            <tbody>
                                                            	<tr>
                                                            		<td>Wheelbase/overall length (mm)</td>
                                                            		<td>2,830/4,895</td>
                                                            	</tr>
                                                            	<tr>
                                                            		<td>Overall width (mm)</td>
                                                            		<td>1,840</td>
                                                            	</tr>
                                                            	<tr>
                                                            		<td>Overall height (mm)</td>
                                                            		<td>1,450</td>
                                                            	</tr>
                                                            	<tr>
                                                            		<td>Track (fr/rr) (mm)<br />17" wheels<br />19" wheels</td>
                                                            		<td>1,585/1,575<br />1,595/1,585</td>
                                                            	</tr>
                                                            	<tr>
                                                            		<td>Turning circle, curb-to-curb (m)</td>
                                                            		<td>11.2</td>
                                                            	</tr>
                                                            </tbody>
                                                       	</table>
                                                    </div>
                                            	</div>
                                          	</div>
                                          	<div class="accordion-group panel">
                                            	<div class="accordion-heading togglize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#" href="#collapseThird"> Interior <i class="fa fa-plus-circle"></i> <i class="fa fa-minus-circle"></i> </a> </div>
                                            	<div id="collapseThird" class="accordion-body collapse">
                                              		<div class="accordion-inner">
                                                    	<table class="table-specifications table table-striped table-hover">
                                                    		<tbody>
                                                                <tr>
                                                                	<td>Headroom (fr/rr) (mm)</td>
                                                                	<td>975/942</td>
                                                                </tr>
                                                                <tr>
                                                                	<td>Headroom (fr/rr) with moonroof (mm)</td>
                                                                	<td>950/942</td>
                                                                </tr>
                                                                <tr>
                                                                	<td>Legroom (fr/rr) (mm)</td>
                                                                	<td>1,073/984</td>
                                                                </tr>
                                                                <tr>
                                                                	<td>Shoulder room (fr/rr) (mm)</td>
                                                                	<td>1,450/1,410</td>
                                                                </tr>
                                                        	</tbody>
                                                      	</table>
                                                    </div>
                                            	</div>
                                          	</div>
                                          	<div class="accordion-group panel">
                                            	<div class="accordion-heading togglize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#" href="#collapseForth"> Capacities <i class="fa fa-plus-circle"></i> <i class="fa fa-minus-circle"></i> </a> </div>
                                            	<div id="collapseForth" class="accordion-body collapse">
                                              		<div class="accordion-inner">
                                                    	<table class="table-specifications table table-striped table-hover">
                                                    		<tbody>
                                                                <tr>
                                                                	<td>Seating</td>
                                                                	<td>5</td>
                                                                </tr>
                                                                <tr>
                                                                	<td>Cargo volume (L)</td>
                                                                	<td>419</td>
                                                                </tr>
                                                                <tr>
                                                                	<td>Passenger volume (L)</td>
                                                                	<td>2,824</td>
                                                                </tr>
                                                                <tr>
                                                                	<td>Total interior volume (L)</td>
                                                                	<td>3,243</td>
                                                                </tr>
                                                                <tr>
                                                                	<td>Fuel tank (L)</td>
                                                                	<td>62</td>
                                                                </tr>
                                                        	</tbody>
                                                       	</table>
                                                    </div>
                                            	</div>
                                          	</div>
                                  		</div>
                                        <!-- End Toggle --> 
                                    </div>
                                    <div id="vehicle-add-features" class="tab-pane fade">
                                    	<ul class="add-features-list">
                                        	<li>6 Speaker Stereo</li>
                                            <li>Driver &amp; Passenger Airbags</li>
                                            <li>Antilock Brakes</li>
                                            <li>Park Assist</li>
                                            <li>Cruise Control</li>
                                            <li>Power Steering</li>
                                            <li>17" Alloy Wheels</li>
                                        </ul>
                                    </div>
                                    <div id="vehicle-location" class="tab-pane fade">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3270.54916947425!2d-81.035158!3d34.942842!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8856891c407522ef%3A0x263fcc9e9260347a!2sWhite+Horse+Restaurant!5e0!3m2!1sen!2sin!4v1424094975250" width="100%" height="450" frameborder="0" style="border:0"></iframe>
                                    </div>
                                </div>
                    		</div>
                            <div class="spacer-50"></div>
                            <!-- Recently Listed Vehicles -->
                            <section class="listing-block recent-vehicles">
                                <div class="listing-header">
                                    <h3>Related Vehicles</h3>
                                </div>
                                <div class="listing-container">
                                    <div class="carousel-wrapper">
                                        <div class="row">
                                            <ul class="owl-carousel carousel-fw" id="vehicle-slider" data-columns="3" data-autoplay="" data-pagination="yes" data-arrows="no" data-single-item="no" data-items-desktop="3" data-items-desktop-small="3" data-items-tablet="2" data-items-mobile="1">
                                                <li class="item">
                                                    <div class="vehicle-block format-standard">
                                                        <a href="#" class="media-box"><img src="images/car1.jpg" alt=""></a>
                                                        <span class="label label-default vehicle-age">2014</span>
                                                        <span class="label label-success premium-listing">Premium Listing</span>
                                                        <h5 class="vehicle-title"><a href="#">Mercedes-benz SL 300</a></h5>
                                                        <span class="vehicle-meta">Mercedes, Grey color, by <abbr class="user-type" title="Listed by an individual user">Individual</abbr></span>
                                                        <a href="#" title="View all Sedans" class="vehicle-body-type"><img src="images/body-types/sedan.png" width="30" alt=""></a>
                                                        <span class="vehicle-cost">$48500</span>
                                                    </div>
                                                </li>
                                                <li class="item">
                                                    <div class="vehicle-block format-standard">
                                                        <a href="#" class="media-box"><img src="images/car2.jpg" alt=""></a>
                                                        <span class="label label-primary vehicle-age">Brand New</span>
                                                        <h5 class="vehicle-title"><a href="#">Nissan Terrano first hand</a></h5>
                                                        <span class="vehicle-meta">Nissan, Brown beige, by <abbr class="user-type" title="Listed by an dealer">Dealer</abbr></span>
                                                        <a href="#" title="View all SUVs" class="vehicle-body-type"><img src="images/body-types/suv.png" width="30" alt=""></a>
                                                        <span class="vehicle-cost">$28000</span>
                                                    </div>
                                                </li>
                                                <li class="item">
                                                    <div class="vehicle-block format-standard">
                                                        <a href="#" class="media-box"><img src="images/car4.jpg" alt=""></a>
                                                        <span class="label label-default vehicle-age">2013</span>
                                                        <h5 class="vehicle-title"><a href="#">Mercedes Benz E Class</a></h5>
                                                        <span class="vehicle-meta">Mercedes, Silver Blue, by <abbr class="user-type" title="Listed by an individual">Individual</abbr></span>
                                                        <a href="#" title="View all convertibles" class="vehicle-body-type"><img src="images/body-types/convertible.png" width="30" alt=""></a>
                                                        <span class="vehicle-cost">$76000</span>
                                                    </div>
                                                </li>
                                                <li class="item">
                                                    <div class="vehicle-block format-standard">
                                                        <a href="#" class="media-box"><img src="images/car3.jpg" alt=""></a>
                                                        <span class="label label-default vehicle-age">2014</span>
                                                        <h5 class="vehicle-title"><a href="#">Newly launched Nissan Sunny</a></h5>
                                                        <span class="vehicle-meta">Nissan, Brown beige, by <abbr class="user-type" title="Listed by Autostars">Autostars</abbr></span>
                                                        <a href="#" title="View all coupes" class="vehicle-body-type"><img src="images/body-types/coupe.png" width="30" alt=""></a>
                                                        <span class="vehicle-cost">$31999</span>
                                                    </div>
                                                </li>
                                                <li class="item">
                                                    <div class="vehicle-block format-standard">
                                                        <a href="#" class="media-box"><img src="images/car1.jpg" alt=""></a>
                                                        <span class="label label-default vehicle-age">2014</span>
                                                        <span class="label label-success premium-listing">Premium Listing</span>
                                                        <h5 class="vehicle-title"><a href="#">Mercedes-benz SL 300</a></h5>
                                                        <span class="vehicle-meta">Mercedes, Grey color, by <abbr class="user-type" title="Listed by an individual user">Individual</abbr></span>
                                                        <a href="#" title="View all Sedans" class="vehicle-body-type"><img src="images/body-types/sedan.png" width="30" alt=""></a>
                                                        <span class="vehicle-cost">$48500</span>
                                                    </div>
                                                </li>
                                                <li class="item">
                                                    <div class="vehicle-block format-standard">
                                                        <a href="#" class="media-box"><img src="images/car2.jpg" alt=""></a>
                                                        <span class="label label-primary vehicle-age">Brand New</span>
                                                        <h5 class="vehicle-title"><a href="#">Nissan Terrano first hand</a></h5>
                                                        <span class="vehicle-meta">Nissan, Brown beige, by <abbr class="user-type" title="Listed by an dealer">Dealer</abbr></span>
                                                        <a href="#" title="View all SUVs" class="vehicle-body-type"><img src="images/body-types/suv.png" width="30" alt=""></a>
                                                        <span class="vehicle-cost">$28000</span>
                                                    </div>
                                                </li>
                                                <li class="item">
                                                    <div class="vehicle-block format-standard">
                                                        <a href="#" class="media-box"><img src="images/car4.jpg" alt=""></a>
                                                        <span class="label label-default vehicle-age">2013</span>
                                                        <h5 class="vehicle-title"><a href="#">Mercedes Benz E Class</a></h5>
                                                        <span class="vehicle-meta">Mercedes, Silver Blue, by <abbr class="user-type" title="Listed by an individual">Individual</abbr></span>
                                                        <a href="#" title="View all convertibles" class="vehicle-body-type"><img src="images/body-types/convertible.png" width="30" alt=""></a>
                                                        <span class="vehicle-cost">$76000</span>
                                                    </div>
                                                </li>
                                                <li class="item">
                                                    <div class="vehicle-block format-standard">
                                                        <a href="#" class="media-box"><img src="images/car3.jpg" alt=""></a>
                                                        <span class="label label-default vehicle-age">2014</span>
                                                        <h5 class="vehicle-title"><a href="#">Newly launched Nissan Sunny</a></h5>
                                                        <span class="vehicle-meta">Nissan, Brown beige, by <abbr class="user-type" title="Listed by Autostars">Autostars</abbr></span>
                                                        <a href="#" title="View all coupes" class="vehicle-body-type"><img src="images/body-types/coupe.png" width="30" alt=""></a>
                                                        <span class="vehicle-cost">$31999</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </section>
                       	</div>
                        <!-- Vehicle Details Sidebar -->
                        <div class="col-md-4 vehicle-details-sidebar sidebar">
                        
                            <!-- Vehicle Enquiry -->
                            <div class="sidebar-widget widget seller-contact-widget">
                              	<h4 class="widgettitle">Send enquiry</h4>
                                <div class="vehicle-enquiry-in">
                                    <form>
                                        <input type="text" placeholder="Name*" class="form-control" required>
                                        <input type="email" placeholder="Email address*" class="form-control" required>
                                        <div class="row">
                                            <div class="col-md-7"><input type="text" placeholder="Phone no.*" class="form-control" required></div>
                                            <div class="col-md-5"><input type="text" placeholder="Zip*" class="form-control" required></div>
                                        </div>
                                        <textarea name="comments" class="form-control" placeholder="Your comments"></textarea>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="inlineCheckbox1" value="option1"> Subscribe To <strong>AutoStars Newsletter</strong>
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="inlineCheckbox2" value="option2"> Remember my details
                                        </label>
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </form>
                                </div>
                                <div class="vehicle-enquiry-foot">
                                    <span class="vehicle-enquiry-foot-ico"><i class="fa fa-phone"></i></span>
                                    <strong>1800 011 2211</strong>Seller: <a href="#">Carcheck Sellers</a>
                                </div>
                            </div>
                            
                            <!-- Financing Calculator -->
                            <div class="sidebar-widget widget calculator-widget">
                                <h4>Loan Estimator</h4>
                                <form>
                                    <div class="loan-calculations">
                                        <input type="text" class="form-control" placeholder="Loan amount">
                                        <div class="form-group">
                                            <label>Loan term in months</label>
                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn btn-info active">
                                                  	<input type="radio" name="Loan Tenure" id="option1" autocomplete="off" checked> 24
                                                </label>
                                                <label class="btn btn-info">
                                                  	<input type="radio" name="Loan Tenure" id="option2" autocomplete="off"> 36
                                                </label>
                                                <label class="btn btn-info">
                                                  	<input type="radio" name="Loan Tenure" id="option3" autocomplete="off"> 48
                                                </label>
                                                <label class="btn btn-info">
                                                  	<input type="radio" name="Loan Tenure" id="option3" autocomplete="off"> 60
                                                </label>
                                           	</div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Down payment">
                                            <input type="text" class="form-control" placeholder="Rate of Interest eg.10%">
                                        </div>
                                    </div>
                                    <div class="calculations-result">
                                    	<span class="meta-data">This is the payment you need to make per month</span>
                                        <span class="loan-amount">$300<small>/month</small></span>
                                    </div>
                                </form>
                         	</div>
                        </div>
                    </div>
                </article>
                <div class="clearfix"></div>
            </div>
        </div>
   	</div>